$(document).ready(function() {
    getMediumCategory();
});

var STATUS_NOT_STARTED = 'not_started';
var STATUS_INPROGRESS = 'inprogress';
var STATUS_COMPLETED = 'completed';
var STATUS_CLEAR = 'clear';
var STATUS_SKIP = 'skip';

var smallStatuses = new Object();
var total = 0;
var totalCompleted  = 0;

function isAjaxCompleted() {
    if (totalCompleted == total) {
        return true;
    }

    return false;
}

function buildRecommend() {
    var maxValue = -1;
    var keySelected = '';

    $.each(smallStatuses, function (key, value) {
        if (value > maxValue) {
            maxValue = value;
            keySelected = key;
        }
    });

    $('.div-recommend').each(function(i, obj) {
        if ($(obj).attr('data-id') == keySelected) {
            $(obj).show();
        } else {
            $(obj).hide();
        }
    });
}

function getMediumCategory() {
    $.ajax({
        url: $('#url-api-medium-category').val() + '/' + $('#medium-category-id').val(),
        type: 'GET',
    })
    .done(function(response){
        if (response != '') {
            var mediumCategory = response.medium_category;
            if (mediumCategory != null && mediumCategory.length > 0) {
                if ($('#only-medium-category').val() == 1) {
                    // step 1
                    var category = mediumCategory[0];
                    $('h1.header__heading').text(category.large_category.name + 'の課題について');
                    $('#medium-category-description').text(category.description);
                    $('a.training-btn').text(category.name + 'の課題に取り組む');
                } else {
                    // step 2

                    // set title header
                    var category = mediumCategory[0];
                    if (typeof category.large_category.name != 'undefined') {
                        $('h1.header__heading').text(category.large_category.name + ' ' + category.name);
                    } else {
                        $('h1.header__heading').text(category.name);
                    }

                    var smallCategories = category.small_categories;
                    total = smallCategories.length;

                    $('.medium-categories').empty();
                    for (var i = 0; i < smallCategories.length; i++) {
                        var status = getSmallCategory(smallCategories[i]['id']);
                        $('.medium-categories').append(renderView(smallCategories[i]));
                    }

                    $('.skillbar').each(function() {
                        $(this).find('.skillbar-bar').animate({
                            width:$(this).attr('data-percent')
                        }, 2000);
                        var percent = $(this).attr('data-percent');
                        if (percent == "0%") {
                            $(this).find('.skillbar-title').css({"color" : "#ababab"});
                        } else if (percent == "100%") {
                            $(this).find('.skill-detail').css({"color" : "#fff"});
                            $(this).find('.skill-bar-percent').css({"color" : "#fff"});
                        }
                    });
                }
            }
        }
    });
}

function renderView(smallCategorySelected) {
    var smallCategory = '';
    smallCategory += '<a href="' + $('#url-web-small-category').val() + '/' + smallCategorySelected['id'] + '">'
    smallCategory += '<div class="progress-part">';
    smallCategory += '<div class="dv dv-6">';
    smallCategory += '<div class="recommend div-recommend" data-id="' + smallCategorySelected['id'] + '" style="display: none;">';
    smallCategory += '<span class=""><i>★</i> オススメ取組み</span>'
    smallCategory += '</div>';
    smallCategory += '<div class="skillbar" data-percent="25%">';
    smallCategory += '<div class="skillbar-title">';
    smallCategory += '<span id="status-icon-' + smallCategorySelected['id'] + '"></span>';
    smallCategory += '<p id="status-name-' + smallCategorySelected['id'] + '"></p>';
    smallCategory += '</div>';
    smallCategory += '<div class="skillbar-bar"></div>';
    smallCategory += '<div class="skill-detail">';
    smallCategory += '<span>' + 'Part ' + smallCategorySelected['name'] + '</span>';
    smallCategory += '</div>';
    smallCategory += '<div class="skill-bar-percent"><span>25</span>%</div>';
    smallCategory += '</div>';
    smallCategory += '</div>';
    smallCategory += '</div>';
    smallCategory += '</a>';
    return smallCategory;
}

function getSmallCategory(smallCategoryId) {
    $.ajax({
        url: $('#url-api-small-category').val() + '/' + smallCategoryId,
        type: 'GET',
    })
    .done(function(response){
        totalCompleted += 1;

        if (response != '') {
            var smallCategory = response.small_category;
            
            var traningStatus = getStatus(smallCategory['traning_elements']);
            var brashupStatus = getStatus(smallCategory['brashup_elements']);

            // set recommend
            var recommend = getRecommend(traningStatus, brashupStatus);
            smallStatuses[smallCategoryId] = recommend;
           
            // set status
            var status = getLearningStatus(traningStatus, brashupStatus);

            var statusIconClass = '';
            var statusName = '';
            switch (status) {
                case STATUS_NOT_STARTED:
                    statusIconClass = 'ti-agenda';
                    statusName = '未着手';
                    break;
                case STATUS_INPROGRESS:
                    statusIconClass = 'ti-pencil';
                    statusName = '取組中';
                    break;
                case STATUS_COMPLETED:
                    statusIconClass = 'ti-check-box';
                    statusName = '完了';
                    break;
                case STATUS_CLEAR:
                    statusName = 'クリア';
                    break;
                default: break;
            }
            if (statusIconClass == '') {
                $('#status-icon-' + smallCategoryId).hide();
            } else {
                $('#status-icon-' + smallCategoryId).show();
                $('#status-icon-' + smallCategoryId).addClass(statusIconClass);
            }
            $('#status-name-' + smallCategoryId).text(statusName);

            if (isAjaxCompleted()) {
                buildRecommend();
            }
        }
    });
}

function getLearningStatus(traningStatus, brashupStatus) {
    if (traningStatus == '') {
        if (brashupStatus == STATUS_SKIP) {
            return STATUS_INPROGRESS;
        }
        return brashupStatus;
    }

    if (brashupStatus == '') {
        if (traningStatus == STATUS_SKIP) {
            return STATUS_INPROGRESS;
        }
        return traningStatus;
    }

    // Status Not start
    if (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_NOT_STARTED) {
        return STATUS_NOT_STARTED;
    }

     // Status complete
    if (traningStatus == STATUS_COMPLETED && brashupStatus == STATUS_COMPLETED) {
        return STATUS_COMPLETED;
    }

    // Status Clear
    if ((traningStatus == STATUS_COMPLETED && (brashupStatus == STATUS_INPROGRESS || brashupStatus == STATUS_SKIP)) ||
        (traningStatus != STATUS_COMPLETED && brashupStatus == STATUS_COMPLETED)) {
        return STATUS_CLEAR;
    }

    // Status Inprogress
    return STATUS_INPROGRESS;
}

function getStatus(englishElements) {
    if (englishElements.length == 0) {
        return '';
    }
    var numNotStarted = 0, numComplete = 0, numSkip = 0;
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

function getRecommend(traningStatus, brashupStatus) {
    if (traningStatus == '' && brashupStatus == STATUS_INPROGRESS) {
        return 3;
    }

    if (traningStatus == STATUS_COMPLETED && brashupStatus == STATUS_NOT_STARTED) {
        return 2;
    }

    if (traningStatus == STATUS_INPROGRESS && brashupStatus == '') {
        return 1;
    }

    if ((traningStatus == STATUS_NOT_STARTED && brashupStatus == '') ||
        (traningStatus == '' && brashupStatus == STATUS_NOT_STARTED) ||
        (traningStatus == STATUS_NOT_STARTED && brashupStatus == STATUS_NOT_STARTED)) {
        return 0;
    }

    return -1;
}