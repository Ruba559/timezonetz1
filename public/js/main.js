
$(function ()
{

$(".product-card-simple").mouseenter(function () {
       var thisa = $(this);
       thisa.addClass('hoverd');
}).mouseleave(function ()
{
    thisa = $(this);
    thisa.removeClass('hoverd');

});

$(".product-card-advanced").mouseenter(function () {
    var thisa = $(this);
    thisa.addClass('hoverd');
}).mouseleave(function ()
{
 thisa = $(this);
 thisa.removeClass('hoverd');

});


});


