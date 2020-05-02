<?php
  session_start();
  require 'connectdb.php';
  require 'functiontime.php';

  $perpage = 8;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        } else {
        $page = 1;
        }
      $start = ($page - 1) * $perpage;
      $sql = "SELECT * FROM book_t ORDER BY book_date DESC LIMIT {$start} , {$perpage} ";
      $sql_knowledge = mysqli_query($dbHandle, $sql);

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
                <a class="page-scroll nav-link " href="index.php#gallery1"
                  >ภาพกิจกรรม</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="assets/tour/_flash/Tourweaver_Project1.html"
                  >ภาพเสมือนจริง</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#member1"
                  >สมาชิกสวน</a
                >
              </li>
              <li class="nav-item ">
                <a class="page-scroll nav-link " href="index.php#contact"
                  >ติดต่อเรา</a
                >
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
            <p class="name-bgheader">ฐานความรู้</p>
            <p class="name-en-bgheader">Knowledge</p>
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
          <div class="col-md-9 dropdownmenuhome showform">
            <div class="dropdown">
              <button
                id="btn-submenu"
                class="btn btn-default dropdown-toggle"
                type="button"
                data-toggle="dropdown"
              >
                <span class="name-header">
                  <i class="fas fa-bars"></i> ฐานความรู้
                </span>
              </button>
              <ul class="dropdown-menu month-dropdown">
                <li class="link-submenu">
                  <a href="gallery.php"
                    ><i class="far fa-images"></i> รูปภาพกิจกรรม</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-search">
              <div class="input-group">
                <input
                  type="text"
                  class=" form-control"
                  name=""
                  placeholder="ค้นหาบทความและวิดีโอ"
                  autocomplete="off"
                  id="searchbookhome"
                />
                <span class="input-group-btn btn-searchhome">
                  <button class="btn btn-brown " type="submit">
                    <i class="fa fa-search icon-search" aria-hidden="true"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  End navbar2 -->
    <div id="resultbookhome"></div>
    <!--   Content-Knowledge -->

    <section id="content-knowledge">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="box-knowledge">
              <div class="headerbox-knowledge">
                <img src="assets/img/icon-book.png" class="icon-book" alt="" />
                <span class="name-know">ฐานความรู้</span>
                <span class="name-sub">บทความ/วิดิโอ</span>
              </div>
              <hr style="margin-top: -.5em;" />
              <?php 
                while ($sql_know = $sql_knowledge->fetch_assoc()) {
              ?>
              <!---->
              <div class="content-knowledge">
                <div class="container">
                  <div class="row">
                    <div class="col-md-8">
                          <?php
                          if($sql_know['book_types'] == '1'){
                            echo '<div class="new_title2"><h2 class="type-knowledge2">บทความ</h2></div>';
                          } else {
                            echo '<div class="new_title1"><h2 class="type-knowledge1">บทความวิดีโอ</h2></div>';
                          }
                          ?>
                      <div class="box-content">
                        <p class="name-content">
                        <?php
                          if($sql_know['book_types'] == '1'){
                            echo $sql_know['book_name'];
                          } else {
                            echo $sql_know['book_namevideo'];;
                          }
                          ?>
                        </p>
                        <p class="date-content">
                          <i class="far fa-calendar-alt"></i>
                          <?php
                            $datetime =  $sql_know['book_date'];
                            echo thai_date_and_time(strtotime($datetime));
                          ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="box-btn btnknowdo">
                      <?php
                        if($sql_know['book_types'] == '1'){
                          echo '<a href="readbook.php?n='.$sql_know['book_name'].'&id='.$sql_know['id'].'">
                          <button class="btn btn-lg btn-light">
                            ดูเพิ่มเติม
                            <i class="fas fa-arrow-circle-right"></i>
                          </button>
                          </a>';
                        } else {
                          echo '<a href="readbook.php?n='.$sql_know['book_namevideo'].'&id='.$sql_know['id'].'">
                          <button class="btn btn-lg btn-light">
                            ดูเพิ่มเติม
                            <i class="fas fa-arrow-circle-right"></i>
                          </button>
                          </a>';
                        }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-md-12">
                  <hr style="margin-top: -.5em;" />
                </div>
              <!---->
                <?php } ?>
               <!--  -->
            </div>
          </div>
          <?php
              $sql2 = "SELECT * FROM book_t ";
              $query2 = mysqli_query($dbHandle, $sql2);
              $total_record = mysqli_num_rows($query2);
              $total_page = ceil($total_record / $perpage);
              ?>
              <div class="col-md-12" style="margin-top:1em;">
                <nav aria-label="...">
                  <ul class="pagination pagination-md">
                    <?php for($i=1; $i<=$total_page; $i++) { ?>
                    <li class="page-item <?php if($page==$i) echo 'active';?>">
                      <a class="page-link" href="knowledge.php?page=<?=$i?>"><?php echo $i;?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
            </div>
        </div>
      </div>
    </section>
    <!--  End Content-Knowledge -->

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
