<?php
  require 'connectdb.php';
  require 'functiontime.php';
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: 404.php");
  }
  $sql = $dbHandle->query("SELECT * FROM adminuser_t WHERE id='".$_SESSION['id']."'");
  $me = $sql->fetch_assoc();
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta property="og:image" content="assets/img/Cover-share.png" />
    <meta property="og:title" content="สวนเกษตรอินทรีย์สวนฟุ้งขจร" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="สวนเกษตรอินทรีย์สวนฟุ้งขจร" />
    <meta property="og:description" content="สวนฟุ้งขจร สวนเกษตรอินทรีย์  สวนเกษตรอินทรีย์สวนฟุ้งขจร ออแกร์นิค สวนฟุ้งขจรพี่ชาลี วิถีเกษตรพอเพียง เกษตรผสมผสาน" />
    <title>สวนเกษตรอินทรีย์สวนฟุ้งขจร | Fungkhajorn</title>
    <link rel="shortcut icon" href="assets/img/logo_home_icon.ico" />
    <meta name="author" content="" />
    
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css"
    />
    <!--  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/plugin/aos/aos.css" />
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.css" />
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="assets/js/alertui.js"></script>
    <script src="assets/plugin/ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       <!-- Global site tag (gtag.js) - Google Analytics -->
       <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161523126-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-161523126-1');
    </script>
  </head>
  <body>
    <div id="header-firstnav">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brands" href="home.php">
            <img
              src="assets/img/logo.png"
              alt="image goes here"
              class="img-responsive logo-headeradmin"
            />
          </a>
          <span class="nameweb-home">ระบบการจัดการสวนฟุ้งขจร</span>
          <div class="row ml-auto">
            <div class="menu-top welcomehome">
              <i class="fas fa-user-circle"></i> ยินดีต้อนรับ : &nbsp;<?php echo $me['firstname'];?>
            </div>
            <div class="menu-top btn-logout">
              <a href="home.php?views=logout">
                <button class="btn btn-outline-danger">
                  <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </button>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <div class="header-secondnav sticky-top navbar-light bg-light">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=welcome"
                  ><i class="fas fa-home"></i> หน้าแรก</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=book"
                  ><i class="fas fa-book"></i> จัดการบทความ</a
                >
              </li>
              <li class="nav-item ">
                <a
                  class="page-scroll nav-link "
                  href="home.php?views=activities"
                  ><i class="fas fa-shopping-cart"></i> จัดการกิจกรรมชมสวน</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=gallery"
                  ><i class="fas fa-images"></i> จัดการภาพกิจกรรม</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=member"
                  ><i class="fas fa-user-friends"></i> จัดการสมาชิกสวน</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=contact"
                  ><i class="fas fa-map-marker-alt"></i> จัดการการติดต่อ</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="home.php?views=comment"
                  ><i class="far fa-comment-alt"></i> จัดการคอมเมนต์</a
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <?php
      if($_GET['views']){
        if(file_exists("backend/".trim($_GET['views']).".php")){
        require("backend/".trim($_GET['views']).".php");
        }
      }
	  ?>

    <!--  Footer -->
    <section id="footer" class="footer-bgdark">
      <div class="row">
        <div class="col-md-12">
          <img src="assets/img/footer.png" class="img-footer" alt="" />

          <div class="footer-image">
            <span class="text-infohome">
              สวนเกษตรอินทรีย์สวนฟุ้งขจร - © Copyright 2020. All Rights
              Reserved.
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- End Footer -->
    <div id="toTop"><i class="fa fa-chevron-up"></i><span>ขี้นบนสุด</span></div>

    <!--   -->
    <script type="text/javascript" src="assets/js/wysihtml5-0.3.0.js"></script>
    <script
      type="text/javascript"
      src="assets/js/bootstrap-wysihtml5.js"
    ></script>

    <script src="assets/js/crud.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/uploadphoto.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/plugin/aos/aos.js"></script>
    <!-- <script src="assets/js/jquery-3.3.1.slim.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.datetimepicker.js"></script>
    <script>
      /*-----Add field Script------*/
      $("#book-home").each(function() {
        var $wrapp = $(".box-bookhome", this);
        var $video = $(".box-bookhome-video", this);
        $(".add-field", $(this)).on("click", function() {
          // $('.content-boxhome:first-child', $wrapp).clone(true).appendTo($wrapp).find('div').val('').focus();
          $(".box-bookhome").removeClass("hideform");
          $(".box-bookhome").addClass("showform");
          $(".history").removeClass("col-md-12");
          $(".history").addClass("col-md-8");
        });
        $(".content-boxhome .remove-field", $wrapp).on("click", function() {
          if ($(".content-boxhome", $wrapp).length > 1)
            $(this)
              .parent(".content-boxhome")
              .remove();
          $(".box-bookhome").removeClass("showform");
          $(".box-bookhome").addClass("hideform");
          $(".history").removeClass("col-md-8");
          $(".history").addClass("col-md-12");
        });
        $(".add-field-video", $(this)).on("click", function() {
          // $('.content-boxhome:first-child', $wrapp).clone(true).appendTo($wrapp).find('div').val('').focus();
          $(".box-bookhome-video").removeClass("hideform");
          $(".box-bookhome-video").addClass("showform");
          $(".history").removeClass("col-md-12");
          $(".history").addClass("col-md-8");
        });
        $(".content-boxhome-video .remove-field-video", $video).on(
          "click",
          function() {
            if ($(".content-boxhome-video", $video).length > 1)
              $(this)
                .parent(".content-boxhome-video")
                .remove();
            $(".box-bookhome-video").removeClass("showform");
            $(".box-bookhome-video").addClass("hideform");
            $(".history").removeClass("col-md-8");
            $(".history").addClass("col-md-12");
          }
        );
      });
    </script>
    <script type="text/javascript">
      jQuery("#date_upload").datetimepicker({
        lang: "th",
        format: "d-m-Y",
        timepicker: false
      });
    </script>
    <script type="text/javascript">
      jQuery("#date_upload2").datetimepicker({
        lang: "th",
        format: "d-m-Y",
        timepicker: false
      });
    </script>
    <script>
      function readUrl(input) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $("#imguploadshow")
            .attr("src", e.target.result)
            .width(320);
        };
        reader.readAsDataURL(input.files[0]);
      }
    </script>
    <script>
      function readUrlimg(input) {
        var reader2 = new FileReader();

        reader2.onload = function(e) {
          $("#imguploadshow2")
            .attr("src", e.target.result)
            .width(320);
        };
        reader2.readAsDataURL(input.files[0]);
      }
    </script>
  </body>
</html>
