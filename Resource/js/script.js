$(document).ready(function(){
    const body = document.querySelector("body"),
         modeToggle = body.querySelector(".mode-toggle"),
         sidebar = body.querySelector("nav"),
         sidebarToggle = body.querySelector(".sidebar-toggle");

    //Switch between dark and light theme
    modeToggle.addEventListener("click", function(){
        body.classList.toggle("dark");
    });

    //Display and hide menu bar
    sidebarToggle.addEventListener("click", function(){
        sidebar.classList.toggle("close");
    });

    //Data table for tbl_cart
    $('#tbl_cart').DataTable( {
        "pageLength": 100,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
})