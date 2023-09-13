
function _open_menu() {
    $('.menu-bar-overall-div').animate({ 'margin-left': '0%' }, 200);
    $('.side-menu-bar').animate({ 'margin-left': '0px' }, 400);
}

function _close_menu() {
    $('.menu-bar-overall-div').animate({ 'margin-left': '-1000%' }, 400);
    $('.side-menu-bar').animate({ 'margin-left': '-250px' }, 200);
}


// Sidebar Responsivenes
// const menuIcon = document.querySelector(".menu-icon");
// const sideBar = document.querySelector(".sidebar");
// const sideBarOverlay = document.querySelector(".sidebar-overlay");

// function toggleSidebar() {
//     sideBar.classList.toggle("open");
//     sideBarOverlay.classList.toggle("open");
// }

// menuIcon.addEventListener("click", toggleSidebar);

// sideBarOverlay.addEventListener("click", toggleSidebar);




$(document).ready(function () {
    $('.menu-toggle').on('click', function () {
        $('.nav').toggleClass('showing')
    });


});







