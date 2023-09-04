// Searcch Icon Toggle
const mobileBreakpoint = 755;
const searchIcon = document.querySelector(".search-icon");
const headerSearchForm = document.querySelector(".header-search-form");
const searchInput = document.querySelector(".search-input");
const logoWrapper = document.querySelector(".logo-wrapper");

function toggleSearchBar() {
  searchIcon.classList.toggle("hide");
  headerSearchForm.classList.toggle("hide");
  searchInput.focus();
  if (innerWidth <= mobileBreakpoint) {
    logoWrapper.classList.toggle("hide");
  }
}

searchIcon.addEventListener("click", toggleSearchBar);
searchInput.addEventListener("blur", toggleSearchBar);

// Searcch icon toggle
function _open_menu() {
    $('.menu-bar-overall-div').animate({ 'margin-left': '0%' }, 200);
    $('.side-menu-bar').animate({ 'margin-left': '0px' }, 400);
}

function _close_menu() {
    $('.menu-bar-overall-div').animate({ 'margin-left': '-1000%' }, 400);
    $('.side-menu-bar').animate({ 'margin-left': '-250px' }, 200);
}


// Sidebar Responsivenes
const menuIcon = document.querySelector(".menu-icon");
const sideBar = document.querySelector(".sidebar");
const sideBarOverlay = document.querySelector(".sidebar-overlay");

function toggleSidebar() {
    sideBar.classList.toggle("open");
    sideBarOverlay.classList.toggle("open");
}

menuIcon.addEventListener("click", toggleSidebar);

sideBarOverlay.addEventListener("click", toggleSidebar);

//  Featured post script
const changeFeaturedPostBtn = document.querySelector(".change-featured-post");
const inputWrapper = document.querySelector(".input-wrapper");
const titleWrapper = document.querySelector(".title-wrapper");

changeFeaturedPostBtn.addEventListener("click", function () {
    inputWrapper.classList.toggle("hide");
    titleWrapper.classList.toggle("hide");
});


$(document).ready(function () {
    $('.menu-toggle').on('click', function () {
        $('.nav').toggleClass('showing')
    });
});







