$(document).ready(function(){
    const body = document.querySelector("body"),
         modeToggle = body.querySelector(".mode-toggle"),
         sidebar = body.querySelector("nav"),
         sidebarToggle = body.querySelector(".sidebar-toggle");

    let getStatus = localStorage.getItem("status");
    if(getStatus && getStatus === "close"){
        sidebar.classList.toggle("close");
    }

    //Display and hide menu bar
    sidebarToggle.addEventListener("click", function(){
        sidebar.classList.toggle("close");

        if(sidebar.classList.contains("close")){
            localStorage.setItem("status", "close");
        }
        else{
            localStorage.setItem("status", "open");
        }
    });

    //Data table for tbl_cart
    $('#tbl_cart').DataTable( {
        "pageLength": 100,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    //Div clickable
    $('.clickable').click(function(){
        window.location = $(this).find("a").attr("href");
    });
})