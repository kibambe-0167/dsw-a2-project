$(function() { // console.log("J Query loaded");

    // when user logs in, go get all projects
    $.get("../app/get_pro.php", function(project) {
        console.log("data", project["data"]);
        $("#show_project").html(data["data"]);
    });

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
                // console.log(data);
                // var dataObj = JSON.parse(data);
                // if ("search_result" in data) {
                //     $("#show_project").html("");
                //     $("#show_project").html(dataObj["search_result"]);
                //     console.log("From server", dataObj["search_result"]);

                //     // var to hold data
                //     // var search_result = "";
                //     // dataObj["search_result"].forEach(element => {
                //     //     console.log(element);
                //     //     search_result += project_view(element["id"], element["student_id"], element["pro_name"], element["type"], element["pro_desc"], element["pro_ext_link"], "")
                //     // });
                //     // $("#show_project").html(search_result);



                //     // for (const p of dataObj["search_result"]) {
                //     //     // console.log(p);
                //     // }
                // }

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


// thinking of making this function act as a snippet
function project_view(id, owner, name, type, desc, link, img) {
    var view = "<a href='#?proj_id=" + id + "?proj_owner=" + owner + "'  ><div class='container' > <span class='type'  >" + type + "<div class = 'info' > < div id = 'main_img' ><img src='" + img + "'></img>< /div><div id='main_details'><div id='main_contact'>" + name + "</div><div id='main_desc' >" + desc + "</div></div>    <div class= 'comment input-group' ><input class='input-group-text' type='text' name='comment'  placeholder='Type a comment...' id='usr_com'><input class='form-control' type='submit' value='Comment' name='com_btn' id='com_btn'></div></div></div>   </a>";
    return view;
}




// 
// 
// 
// {/* <div class= "container">
//     <span class="type" >
//       type
//     </span>

//     <div class="info">
//       <div id="main_img">
//         <img src="">
//       </div>

//       <div id="main_details">
//         <div id="main_contact"> Contact </div>
//         <div id="main_desc" >Description </div>
//       </div>

//     <div class= 'comment input-group' >
//       <input class='input-group-text' type='text' name='comment'  placeholder='Type a comment...' id='usr_com'>
//       <input class='form-control' type='submit' value='Comment' name='com_btn' id='com_btn'>
//     </div>

//   </div>
// </div>












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