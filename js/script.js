$(function() { // console.log("J Query loaded");

    // when the width of the browser is less than
    // 30em = 480px. this code runs when the pages reloads.
    if ($(window).width() <= 480) {
        // console.log( $(window).width() <= 480 );
        // make the div element go on or off
        $("#b_nav").toggle();
    }
    // 
    // 
    // when the browsers width is resized
    $(window).resize(function() {
        console.log($(window).width());
        if ($(window).width() <= 480) {
            // console.log( $(window).width() <= 480 );
            // make the div element go on or off
            $("#b_nav").toggle();
        }
    });


    // toggle the basic
    // $("#menu_btn").click( function() {
    //   $("#nav_mobile").toggle();
    // });



    // when the mobile nav button losses focus, remove the nav menu
    $("#menu_btn").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });
    $(".wrap").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });


});


// applies to registration forms, on index page. toggle thingy
function add() {
    var x = document.getElementById("panel");
    if (window.getComputedStyle(x).display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

// applies to registraton form, on index page. toggle thingy
function add1() {
    var x = document.getElementById("panel1");
    if (window.getComputedStyle(x).display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}