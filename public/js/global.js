// show medias on trick details page responsive
function showMedias() {
    document.getElementById('show-medias-btn').addEventListener('click', function () {
        let trickMedias = document.getElementById('trick-medias');
        if (trickMedias.classList.contains('hidden')) {
            trickMedias.classList.remove('hidden');
            trickMedias.classList.add('flex');
            this.innerHTML = 'Hide medias';
        } else {
            trickMedias.classList.add('hidden');
            this.innerHTML = 'Show medias';
        }
    });
}

// Load an alert message with animation
function loadAlert() {
    document.getElementById('alert').classList.remove('opacity-0');
    document.getElementById('alert').classList.add('opacity-100');
}

// Remove alert message with animation
function removeAlert() {
    document.getElementById('alert').classList.remove('ease-in');
    document.getElementById('alert').classList.add('ease-out');
    document.getElementById('alert').classList.remove('opacity-100');
    document.getElementById('alert').classList.add('opacity-0');
    setTimeout(hiddeAlert, 1000)
}

// Remove space blank after hidding alert message
function hiddeAlert() {
    document.getElementById('alert').classList.add('hidden')
}

// Run removeAlert after some time
function loadDisappearAlert() {
    setTimeout(removeAlert, 5000);
}

function infiniteScroll() {
    var canLoadMoreTricks = true;

    window.onscroll = function() {

        // @var int totalPageHeight
        var totalPageHeight = document.body.scrollHeight;

        // @var int scrollPoint
        var scrollPoint = window.scrollY + window.innerHeight;

        // check if we hit the bottom of the page
        if(scrollPoint >= totalPageHeight)
        {
            var groupTrick = document.getElementById('group-trick');
            var countTricks = groupTrick.childElementCount;
            var loadMoreTricksButton = document.getElementById('load-more-tricks');

            function addMoreTricks() {
                if (loadMoreTricksButton.classList.contains('hidden') && canLoadMoreTricks) {
                    loadMoreTricksButton.classList.remove('hidden');
                    fetch('/?offset='+countTricks, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => response.json())
                        .then(response => {
                            if (response.tricks.length < 8) {
                                canLoadMoreTricks = false;
                            }
                            response.tricks.forEach(
                                trick => {
                                    var cardTrick =
                                        "<div class='trick-card rounded-lg shadow-lg bg-white max-w-md overflow-hidden my-4'>" +
                                            "<a href='/tricks/details/"+trick.slug+"'>" +
                                                "<img src='/img/tricks/"+trick.picture+"' alt='' class='h-80 w-full'>" +
                                            "</a>" +
                                            "<div class='px-6 py-4 flex'>" +
                                                "<h3 class='font-bold w-full'>"+"<a href='/tricks/details/"+trick.slug+"'>"+trick.title+"</a></h3>";
                                    if (response.connected) {
                                        cardTrick +=
                                                "<div class=\"flex\">" +
                                                    "<a href=\"\"><img src=\"/img/icons/edit-pen.svg.png\" alt=\"edit-icon\" class=\"object-contain h-7\"></a>" +
                                                    "<a href=\"\" class=\"pl-4\"><img src=\"/img/icons/trash.svg.png\" alt=\"delete-icon\" class=\"object-contain h-7\"></a>" +
                                                "</div>";
                                    }
                                    cardTrick +=
                                            "</div>" +
                                        "</div>";

                                    groupTrick.innerHTML += cardTrick;
                                });
                            loadMoreTricksButton.classList.add('hidden');
                        })
                        .catch(error => console.log("Error : " + error));
                }
            }

            setTimeout(addMoreTricks, 900);
        }
    }
}
