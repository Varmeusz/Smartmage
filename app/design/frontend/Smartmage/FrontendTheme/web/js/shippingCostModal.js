define(['jquery'], function($)
{
    let shipping = document.getElementsByClassName("shipping")[0];
    let bigx = document.getElementsByClassName("big-x-button")[0];
    let modal = document.getElementsByClassName("shipping-costs-modal")[0];
    let confirm = document.getElementById("modal-confirm-button");
    let cancel = document.getElementById("modal-cancel-anchor");
    bigx.addEventListener("click", (e) => {
        e.preventDefault();
        modal.style.display = "none";
    })
    shipping.addEventListener("click", () => {
        if(modal.style.display == "none")
            modal.style.display = "block";
        else
            modal.style.display = "none";
    })
    confirm.addEventListener("click", (e)=>{
        e.preventDefault();
        modal.style.display="none";
    })
    cancel.addEventListener("click", (e) => {
        modal.style.display="none";
    })
    return function(config, element)
    {
        // console.log("responsive");
        $(element).style.display = "block";
        // $ = $;
    }
});