<!doctype html>
<html lang="en">

<head>
    <title>
      About us
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../icon.ico" />

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/b369a29969.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/pro_details.css">
    <link rel="stylesheet" href="../css/p_snippet.css">
</head>

<body>


    <!-- header of the page. -->
    <header >
      <div class="container-fluid row" id="header" >
        <!-- logo -->
        <div class="col-md-3 col-sm-3 col-xs-3 bar" >
          <!-- make user stay on this page, incase they have not log in. -->
          <a href="" class="nav-link" >
            <!-- Logo -->
            <img id="logo" src="../logo.png" alt="logo picture" />
          </a>

          <span class="" id="menu_btn" type="button" data-toggle="collapse" data-target="#nav_mobile" >
            <!-- Collapse --> 
            <i class="fa fa-bars"></i>
          </span>
        </div>
        <!-- navbar links,  -->
        <div id="nav_large" class="col-md-9 col-sm-9 col-xs-9" >
          <ul class="nav" id="nav-link-bs"  >

            <li class="nav-item" >
              <a href="../index.php" target="blank" class="nav-link" > log in</a>
            </li>

            <li class="nav-item" >
              <a href="./contactus.php" target="blank" class="nav-link" >Contact us</a>
            </li>

            <li class="nav-item" >
              <a href="./aboutus.php" target="blank" class="nav-link active_link" >About us</a>
            </li>
          </ul>
        </div>        
        
      </div>
       
      <!-- the menu for the mobile version of the code. -->
      <div class="collapse" id="nav_mobile">

        <div >
          <a href="../index.php" target="blank" class="nav-link nav_link_rad_start" >
          <i class="fa fa-sign-in" ></i> log in
          </a>
        </div>


        <div >
          <a href="./contactus.php" target="blank" class="nav-link nav_link_rad_start" >
          <i class="fa fa-phone" ></i> Contact us
          </a>
        </div>

        <div >
          <a href="./aboutus.php" target="blank" class="nav-link nav_link_rad_end active_link_m" >
            <i class="fa fa-info" ></i> &nbsp About us
          </a>
        </div>
      </div>

      <!-- <div class="wrap" style="display: none;"></div> -->
    </header>
    <div class="wrap" style="display: none;"></div>



    <div class="container" id="aboutus">
        <h2>About U-innovate</h2>

        <!-- describing about us -->
        <div id="aboutus_details" >
          <i >
            A platform whereby potential investors meet student creatives to transform industries, businesses, lives and the world. <br />

            It was founded in 2021 by university student.
          </i>  
        </div>


        <div id="aboutus_team" >

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jQuery.js" ></script>
    <script type="text/javascript" src="../js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="../js/script.js" ></script>
</body>

</html>