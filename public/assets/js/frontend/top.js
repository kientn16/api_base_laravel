$(function() {
    $.ajax({
        'url': '/api/english/medium_categories'
    })
    .done(function(data){
        if (data) {
            var largeNames = [];
            var mediumCategories = data.medium_categories;
            var largeCategories = new Object();
            $.each(mediumCategories, function(index, medium) {
                if (largeCategories[medium.large_category.name]) {
                    largeCategories[medium.large_category.name].medium_categories.push({
                        'id': medium.id,
                        'name': medium.name
                    });
                } else {
                    largeNames.push(medium.large_category.name);
                    largeCategories[medium.large_category.name] = {
                        'id': medium.large_category.id,
                        'name': medium.large_category.name,
                        'medium_categories': [
                            {
                                'id': medium.id,
                                'name': medium.name
                            }
                        ]
                    }
                }
            });

            var largeClass = [
                '.large-top-left',
                '.large-top-right',
                '.large-bt-left',
                '.large-bt-right'
            ];
            var mediumClass = [
                '.medium-top-left',
                '.medium-top-right',
                '.medium-bt-left',
                '.medium-bt-right'
            ];

            var mediumLink = [
                '.link-top-left',
                '.link-top-right',
                '.link-bt-left',
                '.link-bt-right'
            ]

            var randoms = shuffleArray([0, 1, 2, 3]);

            for (var i = 0; i < 4; i++) {
                var random = randoms[i];
                var mediumObject = largeCategories[largeNames[random]];
                $(largeClass[i]).text(mediumObject.name);
                var mediumCategory = mediumObject.medium_categories;
                var mediumCategoryRandom = randomObject(mediumCategory);
                $(mediumClass[i]).text(mediumCategoryRandom.name);
                $(mediumLink[i]).attr("href", "/english/medium_categories/view/" + mediumCategoryRandom.id)
                //debugger;
            }
        }
    });
});

function randomObject (object) {
    return object[Math.floor(Math.random() * object.length)];
}

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}
