var tags = new Bloodhound({
    prefetch: '/jb_site/web/app_dev.php/tags/tags.json',
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
});



$('.tags-input').tagsinput({
    typeaheadjs: [{
        highlights: true,
    }, {
        name: 'tags',
        display: 'name',
        value: 'name',
        source: tags,
    }]
});