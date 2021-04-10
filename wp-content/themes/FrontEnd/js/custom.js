"use strict";
$(document).ready(function(){
    //For Menu Hover
    let navlistLi = $('.nav-list li');
    navlistLi.hover(function(){
        $(this).children('ul').slideToggle('slow');
    });
});