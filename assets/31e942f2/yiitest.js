$(document).ready(function(){
    $('.mp').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery : {
            enabled : true
        },
        removalDelay: 300,
        mainClass: 'mfp-fade'
        // other options
    });
    $('li.go a').click(function(){
        var link = $(this).attr("href");
        document.location.href = link;
    });
    $('li.go').click(function(){
        $(this).children('ul').toggle('normal');
        var zn = $(this).find('span').first().text();
        if (zn == '+') $(this).find('span').first().text('-');
        else $(this).find('span').first().text('+');
        return false;
    });
    $("select").change(function(){
        if($(this).val() == 'null') return false;
        if($(this).val() == 'create-parent') $('#name_cat').css('display', 'block');
        if($(this).val() == 'rename') $('#name_cat').css('display', 'block');
        if($(this).val() == 'delete') alert('Внимание данный каталог будет удален!');

    });
});