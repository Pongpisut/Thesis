<?php 
  session_start();
  require 'connectdb.php';
  require 'functiontime.php';

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
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.css" />
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="assets/js/alertui.js"></script>
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
    <script src="assets/js/loader.js"></script>
       <!-- Global site tag (gtag.js) - Google Analytics -->
       <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161523126-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-161523126-1');
    </script>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
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
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#welcome1"
                  >เกี่ยวกับเรา</a
                >
              </li>
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#knowledge1"
                  >ฐานความรู้</a
                >
              </li>
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#package1"
                  >กิจกรรมชมสวน</a
                >
              </li>
            </ul>
            <ul class="navbar-nav mx-auto nav2">
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#gallery1">ภาพกิจกรรม</a>
              </li>
              <li class="nav-item">
                <a class="page-scroll nav-link " href="assets/tour/_flash/Tourweaver_Project1.html"
                  >ภาพเสมือนจริง</a
                >
              </li>
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#member1">สมาชิกสวน</a>
              </li>
              <li class="nav-item">
                <a class="page-scroll nav-link " href="#googlemap">ติดต่อเรา</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <div id="loader">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <!---video-->
    <section id="video-header">
      <video playsinline autoplay muted loop width="100%" height="100%">
        <source src="assets/video/video-header.mp4" type="video/mp4" />
      </video>
      <div class="contents">
        <h1>สวนเกษตรอินทรีย์สวนฟุ้งขจร</h1>
        <p>
          แหล่งเรียนรู้และแหล่งท่องเที่ยวการทำเกษตรอินทรีย์และการทำเกษตรแบบผสมผสาน
        </p>
        <a
          href="#welcome1"
          class="page-scroll scroll-detail"
          style="text-decoration:none;"
        >
          <img src="assets/img/btn-scrollmouse.png" />
          <br />
          <span>เลื่อนดูรายละเอียด</span><br />
          <i class="fa fa-angle-double-down" style="color: #FFF;"></i>
        </a>
      </div>
    </section>
    <!--End Headervideo-->

    <div id="welcome1"></div>

    <!--welcome-->
    <section id="welcome">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>
              <img src="assets/img/leaf.png" alt="" class="leaf-icon" />
              <h2 class="name-th">ยินดีต้อนรับสู่สวนฟุ้งขจร</h2>
              <h6 class="name-en">Welcome fungkrajohn</h6>
              <img
                src="assets/img/underline.png"
                class="pic-underline"
                alt=""
              />
            </center>
          </div>
          <!--  -->
        </div>
        <center>
          <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="one-sec">
                  <img src="assets/img/one.png" class="one-icon" alt="" />
                  <h5 class="name-one">สวนฟุ้งขจร</h5>
                  <p class="other-welcome">
                    ได้รับมาตรฐาน GAP ผักและผลไม้ 6 ชนิด
                  </p>
                  <span class="other-five">กล้วยหอม กล้วยไข่ กล้วยเล็บมือนาง กล้วยน้ำว้า ฝรั่งกิมจู มะละกอฮอนแลนด์ ส้มเขียวหวาน</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
                <div class="two-sec">
                  <img src="assets/img/two.png" class="two-icon" alt="" />
                  <h5 class="name-two">มีการทำแปลงผักผสมผสาน</h5>
                  <p class="other-welcome">
                    ในพื้นที่ 20 ไร่
                  </p>
                  <span class="other-five"> เป็นที่พักอาศัยแบบโฮมสเตย์วิถีไทยมีการปลูกต้นไม้ผลไม้ในรูปแบบเกษตรผสมผสาน</span>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="three-sec" >
                  <img src="assets/img/three.png" class="three-icon" alt="" />
                  <h5 class="name-three">กิจกรรมเข้าถึงธรรมชาติ</h5>
                  <p class="other-welcome">
                    ทั้งหมด 5 ฐาน
                  </p>
                  <span class="other-five">ล่องเรือชมสวน ทำกล้วยอาบแดด ปลูกผักกลับบ้าน ทำอาหารสุขภาพ ทำปุ๋ยจากมูลไส้เดือน</span>
                </div>
            </div>
            <div class="col-md-4">
              <img src="assets/img/family.png" class="img-family" alt="" />
            </div>
            <div class="col-md-4">
                <div class="four-sec">
                  <img src="assets/img/four.png" class="four-icon" alt="" />
                  <h5 class="name-four">เข้าร่วมกิจกรรม</h5>
                  <p class="other-welcome">
                    หากต้องการเข้ามาเรียนรู้สามารถติดต่อล่วงหน้าได้
                  </p>
                </div>
            </div>
            <div class="col-md-4">
              <img src="assets/img/family.png" class="img-family2" alt="" />
            </div>
          </div>
        </center>
      </div>
    </section>
    <!--end welcome-->

    <!--information-->
    <section id="information">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="items-imgvegetables"></div>
            <div class="veget-icon">
              <h5 class="veget-text">VEGETABLES</h5>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="items-imgfruits"></div>
            <div class="fruits-icon">
              <h5 class="fruits-text">FRUITS</h5>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="items-imgactivities"></div>
            <div class="activities-icon">
              <h5 class="activities-text">ACTIVITIES</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--end information-->

    <div id="knowledge1"></div>

    <!-- Knowledge-->
    <section id="knowledge">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>
              <img src="assets/img/leaf.png" alt="" class="leaf-icon" />
              <h2 class="name-th">ฐานความรู้</h2>
              <h6 class="name-en">Knowledge</h6>
              <img
                src="assets/img/underline.png"
                class="pic-underline"
                alt=""
              />
            </center>
          </div>
          <?php
            $sql_know = $dbHandle->query("SELECT * FROM book_t WHERE book_types = '1' ORDER BY book_date DESC LIMIT 8");
          ?>
          <div class="col-md-12" style="margin-top:3em;">
            <div class="tabs tabs-bottom tabs-center tabs-simple">
              <ul class="nav nav-tabs">
                <li class="nav-item itemlink active">
                  <a
                    class="nav-link"
                    href="#tabsNavigationSimple1"
                    data-toggle="tab"
                  >
                    <i class="fas fa-book book"></i><br />บทความ
                  </a>
                </li>
                <li class="nav-item itemlink">
                  <a
                    class="nav-link"
                    href="#tabsNavigationSimple2"
                    data-toggle="tab"
                  >
                    <i class="fas fa-video"></i><br />
                    วิดีโอ
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="knowledge.php"
                  >
                    <i class="fas fa-search"></i><br />
                    ดูทั้งหมด
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabsNavigationSimple1">
                  <div class="container">
                    <div class="row">
                    <?php
                        while($book1 = $sql_know->fetch_assoc()) {
                    ?>
                      <!---->
                      <?php 
                        if($book1['book_types'] == '1') {
                      ?>
                           <div class="col-md-3">
                                <div class="items-boxknow">
                                  <h5 class="book_names"><b><?= $book1['book_name']; ?></b></h5>
                                  <p class="info-know">
                                    <?= $book1['book_description']; ?>
                                  </p>
                                  <a href="readbook.php?n=<?=$book1['book_name'];?>&id=<?=$book1['id'];?>">
                                    <button class="btn btn-outline-success" id="<?=$book1['id'];?>">
                                      <i class="fas fa-book-open"></i> อ่านเพิ่มเติม
                                    </button>
                                  </a>
                                </div>
                              </div>
                              <!---->
                              <div class="col-md-3">
                                <div class="pic-know">
                                  <div class="bg-date"></div>
                                  <img
                                    src="assets/img/book-cover/<?= $book1['book_cover']; ?>"
                                    class="img-fluid pic"
                                    alt=""
                                  />
                                  <div class="date">
                                    <?php
                                      $datetime =  $book1['book_date'];
                                      echo thai_dateone(strtotime($datetime));
                                    ?>
                                  </div>
                                  <div class="month">
                                    <?php
                                      $datetime =  $book1['book_date'];
                                      echo thai_months(strtotime($datetime));
                                    ?>
                                  </div>
                                </div>
                              </div>
                        <?php  } ?>
                      <!---->
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <?php
                  $sql_know2 = $dbHandle->query("SELECT * FROM book_t WHERE book_types = '2' ORDER BY book_date DESC LIMIT 8");
                ?>

                <div class="tab-pane" id="tabsNavigationSimple2">
                  <div class="container">
                    <div class="row">
                    <?php
                        while($book2 = $sql_know2->fetch_assoc()) {
                      ?>
                      <?php
                        if($book2['book_types'] == '2') {
                      ?>
                      <div class="col-md-3">
                        <div class="items-boxknow">
                          <h5><b><?= $book2['book_namevideo']; ?></b></h5>
                          <p class="info-know">
                            <?= $book2['book_description']; ?>
                          </p>
                          <a href="readbook.php?n=<?= $book2['book_namevideo']; ?>&id=<?= $book2['id']; ?>">
                            <button class="btn btn-outline-success" id="<?= $book2['id']; ?>">
                              <i class="fas fa-book-open"></i> อ่านเพิ่มเติม
                            </button>
                          </a>
                        </div>
                      </div>

                      <!---->
                      <div class="col-md-3">
                        <div class="pic-know">
                          <div class="bg-date"></div>
                          <img
                            src="assets/img/book-cover/<?= $book2['book_cover']; ?>"
                            class="img-fluid pic"
                            alt=""
                          />
                          <div class="date">
                          <?php
                            $datetime =  $book2['book_date'];
                            echo thai_dateone(strtotime($datetime));
                          ?>
                          </div>
                          <div class="month">
                          <?php
                            $datetime =  $book2['book_date'];
                            echo thai_months(strtotime($datetime));
                          ?>
                          </div>
                        </div>
                      </div>
                      <!---->
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Knowledge-->
    <?php
      $sql_package = $dbHandle->query("SELECT * FROM package_t WHERE id=1");
      $package = $sql_package->fetch_assoc();

      $sql_package2 = $dbHandle->query("SELECT * FROM package_t WHERE id=2");
      $package2 = $sql_package2->fetch_assoc();
    ?>

    <div id="package1"></div>

    <!-- Package-->
    <section id="package">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 h-package">
            <center>
              <img src="assets/img/leaf2.png" alt="" class="leaf-icon" />
              <h2 class="name-th">กิจกรรมชมสวน</h2>
              <h6 class="name-en">Gardening Activities</h6>
              <img
                src="assets/img/underline2.png"
                class="pic-underline"
                alt=""
              />
              <div class="icon-pack">
                <img
                  src="assets/img/icon-boat.png"
                  class="icon-boatpack"
                  alt=""
                />
                <img
                  src="assets/img/icon-pot.png"
                  class="icon-potpack"
                  alt=""
                />
                <img
                  src="assets/img/icon-tomato.png"
                  class="icon-tomatopack"
                  alt=""
                />
              </div>
              <div class="text-packinfo">
                <p>ทำอาหารสุขภาพ</p>
                <p>ปลูกผักกลับบ้าน</p>
                <p>ล่องเรือชมสวน</p>
              </div>
            </center>
          </div>

          <div class="col-md-4">
            <center>
              <div class="box-package">
                <div class="package-other">
                  <i class="far fa-calendar-alt calendar_icon"></i>
                  <h4 class="name-package"><?=$package['name_package'];?></h4>
                  <p class="info-packageprice"><?=$package['des_package'];?><br />&nbsp;</p>
                  <hr style="width: 70%;" />
                  <p class="text-price"><?=$package['price_activities'];?></p>
                  <button
                    class="btn btn-outline-danger"
                    data-toggle="modal"
                    data-target="#package11"
                  >
                  <i class="far fa-calendar-alt"></i> ดูรายละเอียดกิจกรรม
                  </button>
                </div>
              </div>
            </center>
          </div>
          <!-- Package1 Window Code -->
          <div
            class="modal fade"
            id="package11"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel2"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="list-head active" id="a1">
                        <a href="#otherpackage3"  role="tab" data-toggle="tab"
                          ><i class="far fa-list-alt"></i> รายละเอียดกิจกรรม</a
                        >
                      </li>
                      <li role="presentation" class="list-head" id="a2" >
                        <a href="#contactpackage3" role="tab" data-toggle="tab"
                          ><i class="fas fa-phone-alt"></i>
                          ติดต่อจองกิจกรรม</a
                        >
                      </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content modaltabpan" id="myModalLabel2">
                      <div
                        role="tabpanel"
                        class="tab-pane active"
                        id="otherpackage3"
                      >
                        <div class="package1">
                          <center>
                            <div class="package-popup1">
                              <i class="far fa-calendar-alt calendar_icon"></i>
                              <h4 class="name-popup1">
                                <b><?=$package['name_package'];?></b>
                              </h4>
                              <span class="other-popup1"><?=$package['des_package'];?></span>
                            </div>
                            <hr />
                            <p class="activities-popup1">
                              กิจกรรมที่ท่านจะได้รับ
                            </p>
                            <div class="activities-foru">
                              <img
                                src="assets/img/popup-boat.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                              <img
                                src="assets/img/popup-tomato.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                              <img
                                src="assets/img/popup-pot.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                            </div>
                            <div class="text-popupforu">
                              <span><?=$package['activities_1'];?></span>
                              <span><?=$package['activities_2'];?></span>
                              <span><?=$package['activities_3'];?></span>
                            </div>
                            <br>
                            <p class="other-despackage"><?=$package['other_description'];?></p>
                            <hr />
                            <p class="price-popup1">
                            <?=$package['price_activities'];?>
                            </p>
                            <hr />
                            <button
                              type="submit"
                              class="submit-btn"
                              data-dismiss="modal"
                            >
                              <i class="fas fa-times"></i> ปิดหน้าต่างนี้
                            </button>
                          </center>
                        </div>
                      </div>

                      <div
                        role="tabpanel"
                        class="tab-pane fade"
                        id="contactpackage3"
                      >
                        <div class="package1-sec2">
                          <center>
                            <p class="name-contact-sec2">
                              การติดต่อจองกิจกรรมนั้นสามารถติดต่อได้ 3 ช่องทาง
                            </p>
                            <hr />
                            <div class="contact-sec2">
                              <div class="sec2-phone">
                                <img
                                  src="assets/img/icon-phone.png"
                                  class="icon-sec2-phone"
                                  alt=""
                                />
                                <p class="name-sec2">โทรศัพท์มือถือ</p>
                                <p class="other-sec2"><?=$contact['tel'];?></p>
                              </div>
                              <span class="lineright"></span>
                              <div class="sec2-face">
                                <img
                                  src="assets/img/icon-face.png"
                                  class="icon-sec2-face"
                                  alt=""
                                />
                                <p class="name-sec2">เฟสบุ๊ค</p>
                                <a
                                  href="<?=$contact['link_facebook'];?>"
                                  target="#_blank"
                                >
                                  <p class="other-sec2">
                                    <?=$contact['facebook'];?>
                                  </p></a
                                >
                              </div>
                              <span class="lineright"></span>
                              <div class="sec2-line">
                                <img
                                  src="assets/img/icon-line.png"
                                  class="icon-sec2-line"
                                  alt=""
                                />
                                <p class="name-sec2">ไลน์ไอดี</p>
                                <p class="other-sec2"><?=$contact['line_id'];?></p>
                              </div>
                            </div>
                            <hr />
                            <button
                              type="submit"
                              class="submit-btn"
                              data-dismiss="modal"
                            >
                              <i class="fas fa-times"></i> ปิดหน้าต่างนี้
                            </button>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Package1 Window -->
          <div class="col-md-4">
            <center>
              <div class="box-package">
                <div class="package-other">
                  <i class="far fa-calendar-alt calendar_icon"></i>
                  <h4 class="name-package"><?=$package2['name_package'];?></h4>
                  <p class="info-packageprice">
                  <?=$package2['des_package'];?>
                  </p>
                  <hr style="width: 70%; margin-top: 2.5em;" />
                  <p class="text-price"><?=$package2['price_activities'];?></p>
                  <button
                    class="btn btn-outline-danger"
                    style="margin-top: -.1.1em;"
                    data-toggle="modal"
                    data-target="#package2"
                  >
                  <i class="far fa-calendar-alt"></i> ดูรายละเอียดกิจกรรม
                  </button>
                </div>
              </div>
            </center>
          </div>
          <!-- Package2 Window Code -->
          <div
            class="modal fade"
            id="package2"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel2"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="list-head active" id="a3">
                        <a href="#otherpackage2" role="tab" data-toggle="tab"
                          ><i class="far fa-list-alt"></i> รายละเอียดกิจกรรม</a
                        >
                      </li>
                      <li role="presentation" class="list-head " id="a4">
                        <a href="#contactpackage2" role="tab" data-toggle="tab"
                          ><i class="fas fa-phone-alt"></i>
                          ติดต่อจองกิจกรรม</a
                        >
                      </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content modaltabpan" id="myModalLabel2">
                      <div
                        role="tabpanel"
                        class="tab-pane active"
                        id="otherpackage2"
                      >
                        <div class="package1">
                          <center>
                            <div class="package-popup1">
                            <i class="far fa-calendar-alt calendar_icon"></i>
                              <h4 class="name-popup1">
                                <b><?=$package2['name_package'];?></b>
                              </h4>
                              <span class="other-popup1"
                                ><?=$package2['des_package'];?></span
                              >
                            </div>
                            <hr />
                            <p class="activities-popup1">
                              กิจกรรมที่ท่านจะได้รับ
                            </p>
                            <div class="activities-foru">
                              <img
                                src="assets/img/popup-boat.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                              <img
                                src="assets/img/popup-tomato.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                              <img
                                src="assets/img/popup-pot.png"
                                class="iconpop-pack1"
                                alt=""
                              />
                            </div>
                            <div class="text-popupforu">
                              <span><?=$package2['activities_1'];?></span>
                              <span><?=$package2['activities_2'];?></span>
                              <span><?=$package2['activities_3'];?></span>
                            </div>
                             <br>
                            <p class="other-despackage"><?=$package2['other_description'];?></p>
                            <hr />
                            <p class="price-popup1">
                            <?=$package2['price_activities'];?>
                            </p>
                            <hr />
                            <button
                              type="submit"
                              class="submit-btn"
                              data-dismiss="modal"
                            >
                              <i class="fas fa-times"></i> ปิดหน้าต่างนี้
                            </button>
                          </center>
                        </div>
                      </div>

                      <div
                        role="tabpanel"
                        class="tab-pane fade"
                        id="contactpackage2"
                      >
                        <div class="package1-sec2">
                          <center>
                            <p class="name-contact-sec2">
                              การติดต่อจองกิจกรรมนั้นสามารถติดต่อได้ 3 ช่องทาง
                            </p>
                            <hr />
                            <div class="contact-sec2">
                              <div class="sec2-phone">
                                <img
                                  src="assets/img/icon-phone.png"
                                  class="icon-sec2-phone"
                                  alt=""
                                />
                                <p class="name-sec2">โทรศัพท์มือถือ</p>
                                <p class="other-sec2"><?=$contact['tel'];?></p>
                              </div>
                              <span class="lineright"></span>
                              <div class="sec2-face">
                                <img
                                  src="assets/img/icon-face.png"
                                  class="icon-sec2-face"
                                  alt=""
                                />
                                <p class="name-sec2">เฟสบุ๊ค</p>
                                <a
                                  href="<?=$contact['link_facebook'];?>"
                                  target="#_blank"
                                >
                                  <p class="other-sec2">
                                    <?=$contact['facebook'];?>
                                  </p></a
                                >
                              </div>
                              <span class="lineright"></span>
                              <div class="sec2-line">
                                <img
                                  src="assets/img/icon-line.png"
                                  class="icon-sec2-line"
                                  alt=""
                                />
                                <p class="name-sec2">ไลน์ไอดี</p>
                                <p class="other-sec2"><?=$contact['line_id'];?></p>
                              </div>
                            </div>
                            <hr />
                            <button
                              type="submit"
                              class="submit-btn"
                              data-dismiss="modal"
                            >
                              <i class="fas fa-times"></i> ปิดหน้าต่างนี้
                            </button>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Package-->

    <div id="gallery1"></div>

    <!-- Gallery-->
    <section id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>
              <img src="assets/img/leaf.png" alt="" class="leaf-icon" />
              <h2 class="name-th">รูปภาพกิจกรรม</h2>
              <h6 class="name-en">Activity photos Fungkrajohn</h6>
              <img
                src="assets/img/underline.png"
                class="pic-underline"
                alt=""
              />
            </center>
          </div>
          <div class="gallery-box">
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery1.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery2.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image>
              <img src="assets/img/gallery3.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery4.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery5.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery6.jpg" alt="" class="zoom-dark" />
            </a>
            <a href="javascript:void(0)" class="image">
              <img src="assets/img/gallery7.jpg" alt="" class="zoom-dark"/>
            </a>
            <a href="gallery.php" class=" image lightbox">
              <img src="assets/img/gallery8.jpg" alt="" />
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Gallery-->

    <!-- Schedule -->
    <section id="schedule">
      <div class="container">
        <div class="row">
          <div class="col-md-12 h-schedule">
            <center>
              <img src="assets/img/leaf2.png" alt="" class="leaf-icon" />
              <h2 class="name-th">ตารางวันขายสินค้าที่ตลาดนัดสีเขียว</h2>
              <h6 class="name-en">Schedule Fungkrajohn</h6>
              <img
                src="assets/img/underline2.png"
                class="pic-underline"
                alt=""
              />
            </center>
          </div>
          <div class="col-md-12">
            <div class="bg-dateschedule">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>
                      <p class="schedule-table">
                        <i class="far fa-calendar-alt"></i>
                        วันจันทร์และวันพฤหัสบดี
                      </p>
                    </td>
                    <td>
                      <p class="schedule-table">
                        ที่โรงพยาบาลธรรมศาสตร์เฉลิมพระเกียรติ ตึกคณะทันตแพทย์
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="schedule-table">
                        <i class="far fa-calendar-alt"></i> วันพุธ
                      </p>
                    </td>
                    <td>
                      <p class="schedule-table">
                        ที่ข้างโรงเรียนสาธิตธรรมศาตร์ในโรงพยาบาลธรรมศาสตร์เฉลิมพระเกียรติ
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Schedule -->

    <div id="member1"></div>

    <!--  Member -->
    <section id="member">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <center>
              <img src="assets/img/leaf.png" alt="" class="leaf-icon" />
              <h2 class="name-th">สมาชิกสวนฟุ้งขจร</h2>
              <h6 class="name-en">Member Fungkrajohn</h6>
              <img
                src="assets/img/underline.png"
                class="pic-underline"
                alt=""
              />
            </center>

            <div
              class="member-list owl-carousel owl-theme"
              data-plugin-options="{'items': 3, 'autoplay': true, 'autoplayTimeout': 3000}"
            >
            <?php
              $sql_member = $dbHandle->query("SELECT * FROM member_t");
            ?>
            <?php
              while($member = $sql_member->fetch_assoc()){
            ?>
              <div class="member-user">
                <center>
                  <img src="assets/img/uploads/<?=$member['image_member'];?>" class="pic-uncle" alt="" />
                  <p class="name-member">
                  <?=$member['firstname'];?> <?=$member['lastname'];?> หรือ "คุณ<?=$member['nickname'];?>"
                  </p>
                  <p class="type-member"><?=$member['roles'];?></p>
                </center>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Member -->

    <!-- GoogleMap -->

    <section id="googlemap">
    <button type="button" class="btn btn-sm btn-brown btnmapmobile">
    <a href="https://www.google.com/maps?q=14.1697555,+100.8003806" class="mapmobile" ><i class="fas fa-map-marked"></i> เปิดใน Google Map</a>
    </button>
      <div class="row">
        <div class="col-md-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3868.424351013225!2d100.79790631464539!3d14.169906091285227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d9b2d4d60ac5d%3A0x186a3d78cac34e19!2z4Liq4Lin4LiZ4Lif4Li44LmJ4LiH4LiC4LiI4LijIOC4nuC4teC5iOC4iuC4suC4peC4tQ!5e0!3m2!1sth!2sth!4v1581355209034!5m2!1sth!2sth"
            width="100%"
            height="400"
            frameborder="0"
            style="border:0;"
            allowfullscreen=""
          ></iframe>
          
        </div>
      </div>
    </section>


    <!-- End GoogleMap -->

    <!--  Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <center>
              <img
                src="assets/img/icon-location.png"
                class="img-location-icon"
                alt=""
              />
            </center>
          </div>
          <div class="col-md-9">
            <h3 class="name-address"><?=$contact['names'];?></h3>
            <p class="address">
              <?=$contact['place'];?>
            </p>
          </div>
          <div class="col-md-12">
            <hr />
          </div>
          <div class="col-md-4">
            <center>
              <div class="phone">
                <img src="assets/img/icon-mobile.png" class="i-mobile" alt="" />
                <p class="name-phone">โทรศัพท์มือถือ</p>
                <p class="num-phone"><?=$contact['tel'];?></p>
              </div>
            </center>
          </div>
          <div class="col-md-4">
            <center>
              <div class="facebook">
                <img src="assets/img/icon-face.png" class="i-face" alt="" />
                <p class="name-face">เฟสบุ๊ค</p>
                <a
                  href="<?=$contact['link_facebook'];?>"
                  target="#_blank"
                >
                  <p class="face-link">
                  <?=$contact['facebook'];?>
                  </p></a
                >
              </div>
            </center>
          </div>
          <div class="col-md-4">
            <center>
              <div class="line">
                <img src="assets/img/icon-line.png" class="i-line" alt="" />
                <p class="name-line">ไลน์ไอดี</p>
                <p class="line-link">
                  LINE: <?=$contact['line_id'];?>
                </p>
              </div>
            </center>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact -->

    <!--  Footer -->
    <section id="footer">
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

    <!-- End Footer -->
    <div id="toTop"><i class="fa fa-chevron-up"></i><span>ขี้นบนสุด</span></div>

    <!--   -->
    <?php
      require 'login.php';
    ?>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/medium-zoom.min.js"></script>
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
     <!-- Load Facebook SDK for JavaScript -->
     <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="613949929031516"
  theme_color="#0084ff"
  logged_in_greeting="สวัสดีครับ มีอะไรให้ช่วยเหลือไหมครับ ?"
  logged_out_greeting="สวัสดีครับ มีอะไรให้ช่วยเหลือไหมครับ ?">
      </div>
  </body>
</html>
