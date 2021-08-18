define(['jquery'], function($)
{
    let shipping = document.getElementsByClassName("shipping")[0];
    let bigx = document.getElementsByClassName("big-x-button")[0];
    let modal = document.getElementsByClassName("shipping-costs-modal")[0];
    let confirm = document.getElementById("modal-confirm-button");
    let cancel = document.getElementById("modal-cancel-anchor");
    let body = document.getElementsByTagName("body")[0];
    let modalbg = document.getElementsByClassName("shipping-costs-modal")[0]
    modalbg.addEventListener("click", (e)=>{
        modalbg.style.display="none"; 
        modalbg.style.overflow="visible";
    })
    bigx.addEventListener("click", (e) => {
        e.preventDefault();
        modal.style.display = "none";
        body.style.overflow = "visible";
    })
    shipping.addEventListener("click", () => {
        modal.style.display = "flex";
        body.style.overflow = "hidden";            
    })
    confirm.addEventListener("click", (e)=>{
        e.preventDefault();
        modal.style.display="none";
        body.style.overflow="visible";
    })
    cancel.addEventListener("click", (e) => {
        modal.style.display="none";
        body.style.overflow="visible";
    })
    return function(config, element)
    {
        // console.log("responsive");
        // $(element).style.display = "block";
        // $ = $;
    }
});