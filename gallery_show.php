<?php
    session_start();
    require 'connectdb.php';
    require 'functiontime.php';

    $id = $_GET['id'];

    $sql = $dbHandle->query("SELECT * FROM gallery_t WHERE catalog_gallery=$id");

    $sql_catlog = $dbHandle->query("SELECT * FROM catalog_t WHERE id=$id");
    $sql_catlogresult = $sql_catlog->fetch_assoc();

    $sql_contact = $dbHandle->query("SELECT * FROM contact_t");
    $contact = $sql_contact->fetch_assoc();

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
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <!-- <link rel="stylesheet" href="assets/css/animate.css" /> -->
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
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.css">
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="assets/js/alertui.js"></script>
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
        <img
              src="assets/img/logo.png"
              alt="image goes here"
              class="img-responsive logo-header2"
            />
          <div class="menu-top topnumber">
            <span class="text-date"
              >เปิดทุกวันศุกร์ เสาร์ อาทิตย์ เวลา 10.00 - 17.00 น.
            </span>
          </div>
          <div class="row ml-auto">
            <div class="menu-top topnumber2">
              <img src="assets/img/icon-phone.png" alt="" width="20px;" />
              <span class="text-headertop">095-701-8925 </span>
            </div>
            <div class="menu-top topnumber2">
              <img src="assets/img/icon-facebook.png" alt="" width="20px;" />
              <a href="<?=$contact['link_facebook'];?>" target="#_blank"><span class="text-headertop facebookicon">
                สวนฟุ้งขจร วิสาหกิจชุมชนเกษตรอินทรีย์</span
              ></a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <div class="header-secondnav sticky-top navbar-light bg-light">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="javascript:void(0)">
            <img
              src="assets/img/logo.png"
              alt="image goes here"
              class="img-responsive logo-header"
            />
          </a>
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
            <ul class="navbar-nav mx-auto ">
              <li class="nav-item">
                <a class="page-scroll nav-link " href="index.php">หน้าแรก</a>
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#welcome1"
                  >เกี่ยวกับเรา</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#knowledge1"
                  >ฐานความรู้</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#package1"
                  >กิจกรรมชมสวน</a
                >
              </li>
            </ul>
            <ul class="navbar-nav mx-auto nav2">
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#gallery1">ภาพกิจกรรม</a>
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="assets/tour/_flash/Tourweaver_Project1.html"
                  >ภาพเสมือนจริง</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#member1">สมาชิกสวน</a>
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#contact">ติดต่อเรา</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <!--  BG-Header -->
    <section id="bg-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-bgheader">
            <p class="name-bgheader">รูปภาพกิจกรรม</p>
            <p class="name-en-bgheader">Avtivities photos</p>
          </div>
        </div>
      </div>
    </section>

    <!--  End BG-Header -->
    <!-- Large button groups (default and split) -->

    <!--  navbar2 -->
    <section id="navbar2">
      <div class="container">
        <div class="row">
          <div class="col-md-9 dropdownmenuhome">
            <div class="dropdown">
              <button
                id="btn-submenu"
                class="btn btn-default dropdown-toggle"
                type="button"
                data-toggle="dropdown"
              >
                <span class="name-header">
                  <i class="fas fa-images"></i> รูปภาพกิจกรรม
                </span>
              </button>
              <ul class="dropdown-menu month-dropdown">
                <li class="link-submenu">
                  <a href="knowledge.php"
                    ><i class="fas fa-book book-iconfa"></i>
                    ฐานความรู้</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 menu-book menugalleryshow">
            <span class="submenu-book book-gallery"><a href="index.php"><i class="fas fa-home"></i> หน้าแรก</a></span> <span class="line-book"> |</span>
            <span class="namesubmenu-gallery"><a href="gallery.php"><i class="fas fa-images"></i> รูปภาพกิจกรรม</a></span>
          </div>
        </div>
      </div>
    </section>
    <!--  End navbar2 -->
    <div id="resultgalleryhome"></div>
    <!--   Gallery -->

    <section id="content-gallery">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="box-gallery">
              <div class="headerbox-gallery">
                <img
                  src="assets/img/icon-gallery.png"
                  class="icon-gallery"
                  alt=""
                />
                <span class="name-sub subgalleryname"><?=$sql_catlogresult['catalog_gallery'];?></span>
                <span class="name-date subgallerydate"> <i class="far fa-calendar-alt"></i> 
                <?php
                    $datetime =  $sql_catlogresult['date_gallery'];
                    echo thai_date_and_time(strtotime($datetime));
                ?>
                </span>
              </div>
              <hr style="margin-top: -.5em;"  class="hrline"/>
              <center>
                <div class="row">
                <?php while($sql_gallery = $sql->fetch_assoc()) {?>
                  <div class="col-md-4">
                  <div class="show_gallery">
                  <img
                    src="assets/img/photos/<?=$sql_gallery['gallery_name'];?>"
                    class="img-fluid img-galleryshowhome zoom-dark"
                    alt=""
                    />
                  </div>
                  </div>
                  <?php } ?>
                </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  End Gallery -->

    <!--  Footer -->
    <section id="footer" class="footer-bgdark">
      <div class="row">
        <div class="col-md-12">
          <img src="assets/img/footer.png" class="img-footer" alt="" />
          <div class="footer-image">
            <span>
              สวนเกษตรอินทรีย์สวนฟุ้งขจร - © Copyright 2020. All Rights
              Reserved. |</span
            >
            <a
              href="javascript:void(0)"
              data-toggle="modal"
              data-target=".login-form"
            >
            <i class="fas fa-user"></i> สำหรับผู้ดูแลระบบ</a>
          </div>
        </div>
      </div>
    </section>
    <?php
      require 'login.php';
    ?>

    <!-- End Footer -->
    <div id="toTop"><i class="fa fa-chevron-up"></i><span>ขี้นบนสุด</span></div>

    <!--   -->

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/medium-zoom.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/crud.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/plugin/aos/aos.js"></script>
    <!-- <script src="assets/js/jquery-3.3.1.slim.min.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>

    <script>
      $(window).scroll(function() {
        if ($(this).scrollTop()) {
          $("#toTop").fadeIn();
        } else {
          $("#toTop").fadeOut();
        }
      });
      $("#toTop").click(function() {
        //1 second of animation time
        //html works for FFX but not Chrome
        //body works for Chrome but not FFX
        //This strange selector seems to work universally
        $("html, body").animate(
          {
            scrollTop: 0
          },
          1000
        );
      });
    </script>
  </body>
</html>
