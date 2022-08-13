$(document).ready(function(){
    const body = document.querySelector("body"),
         modeToggle = body.querySelector(".mode-toggle");

    modeToggle.addEventListener("click", function(){
        body.classList.toggle("dark")
    });
})