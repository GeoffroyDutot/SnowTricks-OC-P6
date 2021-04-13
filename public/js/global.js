// show medias on trick details page responsive
function showMedias() {
    document.getElementById("show-medias-btn").addEventListener('click', function () {
        let trickMedias = document.getElementById("trick-medias");
        if (trickMedias.classList.contains("hidden")) {
            trickMedias.classList.remove("hidden");
            trickMedias.classList.add("flex");
            this.innerHTML = "Hide medias";
        } else {
            trickMedias.classList.add("hidden");
            this.innerHTML = "Show medias";
        }
    });
}

// Load an alert message with animation
function loadAlert() {
    document.getElementById('alert').classList.remove("opacity-0");
    document.getElementById('alert').classList.add("opacity-100");
}

// Remove alert message with animation
function removeAlert() {
    document.getElementById('alert').classList.remove("ease-in");
    document.getElementById('alert').classList.add("ease-out");
    document.getElementById('alert').classList.remove("opacity-100");
    document.getElementById('alert').classList.add("opacity-0");
    setTimeout(hiddeAlert, 1000);
}

// Remove space blank after hidding alert message
function hiddeAlert() {
    document.getElementById('alert').classList.add("hidden");
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
            var groupTrick = document.getElementById("group-trick");
            var countTricks = groupTrick.childElementCount; 
            var loadMoreTricksButton = document.getElementById('load-more-tricks');
            var groupDeleteModal = document.getElementById('group-delete-trick-modals');

            function addMoreTricks() {
                if (loadMoreTricksButton.classList.contains("hidden") && canLoadMoreTricks) {
                    loadMoreTricksButton.classList.remove("hidden");
                    fetch("/?offset="+countTricks, {
                        method: "GET",
                        headers: {
                            'X-Requested-With': "XMLHttpRequest"
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
                                        var deleteTrickModal =
                                            "            <div class=\"delete-modal\">\n" +
                                            "                <div class=\"hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center\" id=\"delete-trick-" + trick.id + "\">\n" +
                                            "                    <div class=\"relative w-full sm:w-1/2 my-6 mx-auto max-w-3xl\">\n" +
                                            "                        <!--content-->\n" +
                                            "                        <div class=\"border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none\">\n" +
                                            "                            <!--header-->\n" +
                                            "                            <div class=\"flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t\">\n" +
                                            "                                <h3 class=\"text-3xl font-semibold\">\n" +
                                            "                                    Are you sure to delete that trick ?\n" +
                                            "                                </h3>\n" +
                                            "                                <button class=\"p-1 ml-auto bg-transparent border-0 text-black opacity-25 float-right text-3xl leading-none font-semibold outline-none focus:outline-none\" type=\"button\" onclick=\"toggleModal('delete-trick-" + trick.id + "')\">\n" +
                                            "                                    x\n" +
                                            "                                </button>\n" +
                                            "                            </div>\n" +
                                            "                            <!--body-->\n" +
                                            "                            <p class=\"relative p-6 flex-auto w-full\">This action is irreversible.</p>\n" +
                                            "                            <!--footer-->\n" +
                                            "                            <div class=\"flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b\">\n" +
                                            "                                <a href=\"/tricks/delete/" + trick.slug + "\" class=\"text-white bg-red-500 rounded-md shadow-2xl font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1\" style=\"transition: all .15s ease\">\n" +
                                            "                                    Delete\n" +
                                            "                                </a>\n" +
                                            "                            </div>\n" +
                                            "                        </div>\n" +
                                            "                    </div>\n" +
                                            "                </div>\n" +
                                            "                <div class=\"hidden opacity-25 fixed inset-0 z-40 bg-black\" id=\"delete-trick-" + trick.id + "-backdrop\"></div>\n" +
                                            "            </div>";
                                            groupDeleteModal.innerHTML += deleteTrickModal;

                                        cardTrick +=
                                                "<div class=\"flex\">" +
                                                    "<a href=\"/tricks/edit/"+trick.slug+"\"><img src=\"/img/icons/edit-pen.svg.png\" alt=\"edit-icon\" class=\"object-contain h-7\"></a>" +
                                                    "<button type=\"button\" class=\"pl-4 focus:outline-none\"><img src=\"/img/icons/trash.svg.png\" alt=\"delete-icon\" class=\"object-contain h-7\" onclick=\"toggleModal('delete-trick-"+trick.id+"')\"></button>" +
                                                "</div>";
                                    }
                                    cardTrick +=
                                            "</div>" +
                                        "</div>";

                                    groupTrick.innerHTML += cardTrick;
                                });
                            loadMoreTricksButton.classList.add("hidden");
                        })
                        .catch(error => console.log("Error : " + error));
                }
            }

            setTimeout(addMoreTricks, 900);
        }
    };
}
