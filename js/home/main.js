// let btn = document.querySelector("#btn");
// let sidebar = document.querySelector(".sidebar");
// let searchBtn = document.querySelector(".bx-search");

// btn.onclick = function(){
//     sidebar.classList.toggle("active");
// }
// searchBtn.onclick = function(){
//     sidebar.classList.toggle("active");
// }


  


$(document).ready(function(){
    $("#btn").click(function(){
        $(".sidebar").toggleClass("active");
    });

    $("#email-nav").click(function(){
        $(".dropdown-list-email").slideToggle("fast");
    });
});

// $(document).ready(function() {
//     $(".fa-chevron-down").click(function(){ 
//         $(".sub-menu").toggleClass("collapse");
//     });
// });

// $(function() {

//     // Dropdown toggle
//     $('.dropdown-toggle').click(function() {
//       $(this).next('.dropdown').toggle( 400 );
//     });

//     $(document).click(function(e) {
//       var target = e.target;
//       if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle')) {
//         $('.dropdown').hide() ;
//       }
//     });

// });