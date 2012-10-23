
$(function(){
    $('a.entry-image').lightBox({fixedNavigation:true});
    
    $('.nav a').on('click', function(){
        $('.nav li').removeClass('active');
    });
});