define(['jquery', 'matchMedia'], function($, mediaCheck)
{
    console.log("responsive.js loaded...");
    "use strict";

    mediaCheck({
        media: '(min-width: 1440px)',
        // Switch to Desktop Version
        entry: function () {
            console.log("Switching to Desktop...")
            var containerCols = $('.responsive-column');
            containerCols[1].insertAdjacentElement("beforeend", containerCols[0].children[3]);
            containerCols[1].insertAdjacentElement("beforeend", containerCols[0].children[3]);
            containerCols[1].insertAdjacentElement("beforeend", containerCols[0].children[3]);
            containerCols[3].children[0].insertAdjacentElement("beforeend", containerCols[2].children[0].children[1]);
            // containerCols[3].style.display = "block";

        },
        // Switch to Mobile Version
        exit: function () {
            console.log("Switching to Mobile...")
            var containerCols = $('.responsive-column');
            if(containerCols[1].childNodes.length == 0) return;
            containerCols[0].insertAdjacentElement("beforeend", containerCols[1].children[0]);
            containerCols[0].insertAdjacentElement("beforeend", containerCols[1].children[0]);
            containerCols[0].insertAdjacentElement("beforeend", containerCols[1].children[0]);
            containerCols[2].children[0].insertAdjacentElement("beforeend", containerCols[3].children[0].children[0]);
            // containerCols[3].style.display = "none";
        }
    });
    return function(config, element)
    {
        // console.log("responsive");
        console.log("xd")
        console.log(config);
        console.log(element);
        $(element.children);
        // $ = $;
    }
});