function addNewFormCollection() {
    jQuery(document).ready(function () {
        jQuery('.add-another-collection-widget').click(function (e) {
            var list = jQuery(jQuery(this).attr('data-list-selector'));
            // Try to find the counter of the list or use the length of the list
            var counter = list.data('widget-counter') || list.children().length;

            // grab the prototype template
            var newWidget = list.attr('data-prototype');
            // replace the "__name__" used in the id and name of the prototype
            // with a number that's unique to your emails
            // end name attribute looks like name="contact[emails][2]"
            newWidget = newWidget.replace(/__name__/g, counter);
            // Increase the counter
            counter++;
            // And store it, the length cannot be used if deleting widgets is allowed
            list.data('widget-counter', counter);

            // create a new list element and add it to the list
            var newElem = jQuery(list.attr('data-widget-tags')).html(newWidget);
            newElem.appendTo(list);
            newElem.find('div')[0].setAttribute('class', 'min-w-full');

            // add a delete link to all of the existing tag form li elements
            newElem.each(function() {
                addTagFormDeleteLink($(this));
            });
        });
    });
}
function addTagFormDeleteLink($tagFormLi) {
    var $removeFormButton = $('<button type="button" class="focus:outline-none"><i class="fas fa-trash fa-lg mt-6"></i></button>');
    $tagFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $tagFormLi.remove();
    });
}
function removeMedia(elementId, elementClickedId) {
    document.getElementById(elementId).parentElement.remove();
    document.getElementById(elementClickedId).parentElement.parentElement.remove();
    document.getElementById(elementClickedId).parentElement.parentElement.remove();

}
addNewFormCollection();
