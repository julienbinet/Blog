// $(document).ready(function() {
//     $('#appbundle_post_tags').tagsInput({
//         width: 'auto',
//         'defaultText':'Ajouter un tag',
//     });
// });
//
// $('form').submit(function() {
//
//     var tags = $('#appbundle_post_tags_tagsinput span.tag span');
//     alert('début!!!');
//
//     $.each( tags, function( key, value ) {
//         var tag = value.innerText;
//         var form ='<div id="appbundle_post_tags_'+key+'">';
//             form += '<input id="appbundle_post_tags_'+key+'_name" name="appbundle_post[tags]['+key+'][name]" maxlength="255" class="form-control" value="'+tag+'" type="text">';
//             form += '</div></div>';
//
//         $('#appbundle_post_tags').append(form);
//     });
//
//     alert('submit !!!');
//     return true; // return false to cancel form action
// });



var $collectionHolder;

// setup an "add a tag" link
var $addTagLink = $('<a href="#" class="add_tag_link">Add a tag</a>');
var $newLinkLi = $('<li></li>').append($addTagLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('#appbundle_post_tags');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });
});

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}