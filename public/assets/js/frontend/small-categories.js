var STATUS_NOT_STARTED = 'not_started';
var STATUS_INPROGRESS = 'inprogress';
var STATUS_COMPLETED = 'completed';
var STATUS_SKIP = 'skip';
var STATUS_UNDEFINED = 'undefined';


function isNotComplete(smallCategory)
{
    var traningStatus, brashupStatus;

    if (smallCategory.training_elements && smallCategory.training_elements.length >= 1) {
        traningStatus = getStatus(smallCategory.training_elements);
    } else {
        traningStatus = STATUS_UNDEFINED;
    }

    if (smallCategory.brashup_elements && smallCategory.brashup_elements.length >= 1) {
        brashupStatus = getStatus(smallCategory.brashup_elements);
    } else {
        brashupStatus = STATUS_UNDEFINED;
    }

    if (traningStatus == STATUS_UNDEFINED && brashupStatus == STATUS_NOT_STARTED) {
        return true;
    }

    if (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_UNDEFINED) {
        return true;
    }

    if (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_NOT_STARTED) {
        return true;
    }

    if (traningStatus == STATUS_INPROGRESS && brashupStatus == STATUS_UNDEFINED) {
        return true;
    }

    if (traningStatus == STATUS_UNDEFINED && brashupStatus == STATUS_INPROGRESS) {
        return true;
    }

    if (traningStatus == STATUS_COMPLETED && brashupStatus == STATUS_NOT_STARTED) {
        return true;
    }

    return false;
}

function getStatus(englishElements) {
    var numNotStarted = 0, numComplete = 0; numSkip = 0;
    $.each(englishElements, function (key, value) {
        switch(value['user_english_learning']['learning_status']) {
            case STATUS_NOT_STARTED:
                numNotStarted++;
                break;
            case STATUS_COMPLETED:
                numComplete++;
                break;
            case STATUS_SKIP:
                numSkip++;
                break;
            default:
                break;
        }
    });

    if (numNotStarted == englishElements.length) {
        return STATUS_NOT_STARTED;
    } else if (numComplete == englishElements.length) {
        return STATUS_COMPLETED;
    } else if (numSkip == englishElements.length) {
        return STATUS_SKIP;
    } else {
        return STATUS_INPROGRESS;
    }
}

$(document).ready(function() {
    var url = "/api/english/small_categories/" + SMALL_CATEGORY_ID;

    $.ajax({
        type: "GET",
        url: url,
    })
    .done(function(response) {
        if (!response) {
            return;
        }
        
        if (typeof response.small_category.name != 'undefined') {
            $('h1.title-header').text('Part' + response.small_category.name);
        }

        $('.large-category-name').text(response.small_category.medium_category.name);
        $('.small-category-name').text('Part' + response.small_category.name);

        //training
        var mediumCategoryId = response.small_category.medium_category.id;
        var responseMediumCategory = getMediumCategoryApi(mediumCategoryId);

        // Show recommend
        getMediumCategoryApi();

        // exits element_type = 'training', show btn 'Trainingを始める' and url
        var link = '<a href="javascript:;" class="training-btn">このレベルからは、BrushUPで学習しましょう。</a>';
        if (response.small_category.traning_elements) {
            $.each(response.small_category.traning_elements, function(id, value) {
                link = '<a href='  + value.url + ' class="training-btn">'
                    + 'Trainingを始める'
                    + '</a>';

            })
        }
        $('.btn-training-show').append(link);

        //brashup
        if (response.small_category.brashup_elements) {
            $.each(response.small_category.brashup_elements, function(id, brashupName) {
                var learningStatus = brashupName.user_english_learning.learning_status;
                var status = '未着手';
                var url = brashupName.url;

                switch(learningStatus) {
                    case 'completed':
                        status = '完了';
                        url = 'javascript:;';
                        break;
                    case 'inprogress':
                        status = '<i class="ti-check"></i>取り組み中';
                        break;
                    case 'skip':
                        status = '<i class="ti-arrow-top-right"></i>スキップ';
                        break;
                }

                var li = '<li>'
                    + '<a href=' + url + ' class="training-btn">'
                    + brashupName.name 
                    + '<span class="note-txt">' + status + '</span>'
                    + '</p>'
                    + '</li>';

                $('.list-elements').append(li);
            });
        }
    })
});

var totalSmall = 0;
var totalCompleted = 0;

var highestSmallId;
var currentSmallNotComplete;

function showRecommend() {
    if (total == totalCompleted) {
        var highestStatus = -1;

        $.each(smallHighestStatus, function(id, status) {
            if (status >= highestStatus)  {
                highestStatus = status;
                highestSmallId = id;
            }
        });

        if (currentSmallNotComplete && highestSmallId == SMALL_CATEGORY_ID) {
            $('.lb-status').show();
        }
    }
}

function getMediumCategoryApi(mediumCategoryId) {
    var url = "/api/english/medium_categories/" + mediumCategoryId;
    $.ajax({
        type: "GET",
        url: url,
    })
    .done(function(response) {
        if (response.medium_category[0].small_categories && response.medium_category[0].small_categories.length >= 1) {
            total = response.medium_category[0].small_categories.length;

            $.each(response.medium_category[0].small_categories, function (index, smallCategory) {
                getSmallCategory(smallCategory.id);
            });
        }
    })
}

function getSmallCategory(smallCategoryId) {
    var url = "/api/english/small_categories/" + smallCategoryId;

    $.ajax({
        type: "GET",
        url: url,
    })
    .done(function(response) {
        totalCompleted += 1;

        if (smallCategoryId == SMALL_CATEGORY_ID) {
            currentSmallNotComplete = isNotComplete(response.small_category);
        }

        if (response.small_category) {
            smallHighestStatus[smallCategoryId] = getHighestStatus(response.small_category);
        }

        showRecommend();
    });
}

var smallHighestStatus = new Object();

function getHighestStatus(smallCategory) {
    var traningStatus, brashupStatus;

    if (smallCategory.training_elements && smallCategory.training_elements.length >= 1) {
        traningStatus = getStatus(smallCategory.training_elements);
    } else {
        traningStatus = STATUS_UNDEFINED;
    }

    if (smallCategory.brashup_elements && smallCategory.brashup_elements.length >= 1) {
        brashupStatus = getStatus(smallCategory.brashup_elements);
    } else {
        brashupStatus = STATUS_UNDEFINED;
    }

    if (traningStatus == STATUS_UNDEFINED && brashupStatus == STATUS_NOT_STARTED) {
        return 0;
    }

    if (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_UNDEFINED) {
        return 0;
    }

    if (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_NOT_STARTED) {
        return 0;
    }

    if (traningStatus == STATUS_INPROGRESS && brashupStatus == STATUS_UNDEFINED) {
        return 1;
    }

    if (traningStatus == STATUS_UNDEFINED && brashupStatus == STATUS_INPROGRESS) {
        return 3;
    }

    if (traningStatus == STATUS_COMPLETED && brashupStatus == STATUS_NOT_STARTED) {
        return 2;
    }

    return -1;
}