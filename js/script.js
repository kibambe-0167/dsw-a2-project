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

    // remove feedback messages.
    if ($("#tech_savvy_log_msg").html() != "") {
        setTimeout(() => {
            $("#tech_savvy_log_msg").html("");
        }, 3000);
    }

    // savvy_msg1
    // remove feedback messages.
    if ($("#savvy_msg1").html() != "") {
        setTimeout(() => {
            $("#savvy_msg1").html("");
        }, 3000);
    }

    // remove feedback messages.
    if ($("#savvy_msg2").html() != "") {
        setTimeout(() => {
            $("#savvy_msg2").html("");
        }, 3000);
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



    // when discard btn is clicked. close the drop down btn
    $("#discard2").click(() => {
        console.log("btn clidkhfkb");
        $("#panel1").toggle();
    });


    // when discard btn is clicked. close the drop down btn
    $("#disard").click(() => {
        console.log("btn clidkhfkb");
        $("#panel").toggle();
    });


    // when the sign in btn for tech savvy is clicked.
    $("#savvy_in_btn").click(() => {
        // toggle the form for student if it open.
        // console.log($("#panel").css("display"));
        if ($("#panel").css("display") === "block") {
            $("#panel").toggle(); // toggle the btn when the other form is open
        }
    });

    // when the sign in btn for student is clicked.
    $("#stud_in_btn").click(() => {
        // toggle the form for savvy if it open.
        // console.log($("#panel").css("display"));
        if ($("#panel1").css("display") === "block") {
            $("#panel1").toggle(); // toggle the btn when the other form is open
        }
    });


    // // when the search input field has data or text, display the cancel btn
    // if ($("#key_word").val() != "") {
    //     console.log($("#key_word").val());
    //     // search_remove
    // }

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