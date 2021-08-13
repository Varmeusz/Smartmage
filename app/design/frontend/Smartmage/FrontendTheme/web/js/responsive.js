define(['jquery', 'responsivePage'], function($)
{
    // console.log("responsive.js loaded...");
    return function(config, element)
    {
        // console.log("responsive");
        // console.log(config);
        // console.log(element);
        // $ = $;
        console.log($("body"));
        $("body");
        $(element).responsivePage(config);
    }
});