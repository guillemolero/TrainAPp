$(document).ready(function ()
{

    var learnMoreButton = $('#learnmorebutton');

    learnMoreButton.click(function ()
    {
        var posicion = $("#main").offset().top /*- $("#header").height()*/;

        $("html, body").animate({
           
            scrollTop: posicion
        }, 1500);
    });
});