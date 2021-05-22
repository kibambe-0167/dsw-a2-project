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



    // when the search_btnmobile nav button losses focus, remove the nav menu
    $("#menu_btn").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });
    $(".wrap").click(function() {
        $("#nav_mobile").toggle();
        $(".wrap").toggle();
    });




    // when search btn in main page is clicked, and the search field is not empty
    // remove any text or data in the div that shows project at default state.
    $("#search_btn").click(function() {
        console.log("search btn clicked");
        // if the search field value is not empty
        if ($("#search_pro").val() != "") {
            var key_word = $("#search_pro").val();
            // console.log(key_word);

            // send data to server. the url to send data to. the data to send. and the call back function, when the data is send.
            $.post("../views/show_pro.php", {
                "key_word": key_word
            }, (data) => {
                var dataObj = JSON.parse(data);
                if ("search_result" in dataObj) {
                    $("#show_project").html("");
                    $("#show_project").html(dataObj["search_result"]);
                    console.log("From server", dataObj);
                }

            });
        }

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