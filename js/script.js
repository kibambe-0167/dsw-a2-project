$(function() { // console.log("J Query loaded");

    // when the width of the browser is less than
    // 30em = 480px. this code runs when the pages reloads.
    if ($(window).width() <= 480) {
        // console.log( $(window).width() <= 480 );
        // make the div element go on or off
        $("#nav_large").toggle();
    }
    // 
    // 
    // when the browsers width is resized
    $(window).resize(function() {
        console.log($(window).width());
        if ($(window).width() <= 480) {
            // console.log( $(window).width() <= 480 );
            // make the div element go on or off
            $("#nav_large").toggle();
        }
        if ($(window).width() > 480) {
            $("#nav_large").toggle();
        }

    });


    // when element that shows feedback after uploading a project
    // has text in it. sleep for some seconds and remove text.
    if ($("#pro_up_msg").html() != "") {
        // remove any text in the elements
        setTimeout(() => { $("#pro_up_msg").html(""); }, 10000);
        // console.log($("#pro_up_msg").html(""));
    }


    // this applies to all div elements that have message class in em.
    if ($("#feedback").html() != "") {
        // console.log($("#feedback").html());
        // sleep for 3 seconds
        // remove any data in html element
        setTimeout(() => { $("#feedback").html(""); }, 3000);
    }


    if ($("#usr_prof_msg").html() != "") {
        setTimeout(() => { $("#usr_prof_msg").html(""); }, 3000);
    }

    if ($("#usr_msg").html() != "") {
        setTimeout(() => { $("#usr_msg").html(""); }, 3000);
    }


    // when the search_btnmobile nav button losses focus, remove the nav menu
    $("#menu_btn").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });
    $(".wrap").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });


    // 
    // when the search remove btn is clicked, delete value in search input field
    // 
    $("#search_remove").click(() => {
        $("#search_pro").val("");
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