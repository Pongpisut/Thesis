<?php
  session_start();
  require 'connectdb.php';
  require 'functiontime.php';

  $id = $_GET['id'];
  $sql = $dbHandle->query("SELECT * FROM book_t WHERE id=$id");
  $sql_readbook = $sql->fetch_assoc();

  $sql_showbook = $dbHandle->query("SELECT * FROM book_t ORDER BY RAND() LIMIT 4 ");

  $sql_contact = $dbHandle->query("SELECT * FROM contact_t");
  $contact = $sql_contact->fetch_assoc();

  if(isset($sql_readbook['id']) != $id ){
    header("Location: 404.php");
  }
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
    <link rel="stylesheet" href="assets/css/sweetalert2.css">
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
              class="img-responsive logo-header2 hideform"
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
    <section id="bg-header2">
        <img src="assets/img/book-cover/<?=$sql_readbook['book_cover'];?>"  class="bg-book" alt="">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-bgheader">
            <p class="name-bgheader">
            <?php
                if($sql_readbook['book_types'] == '1'){
                    echo $sql_readbook['book_name'];
                } else {
                    echo $sql_readbook['book_namevideo'];
                }
            ?>
            </p>
            <p class="name-en-bgheader"><?=$sql_readbook['book_description'];?></p>
            <center><div class="linehr"></div></center>
            <p class="dates-readbook">
            <i class="far fa-calendar-alt"></i>
                <?php
                    $datetime =  $sql_readbook['book_date'];
                    echo thai_date_and_time(strtotime($datetime));
                ?>
            </p>
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
            <div class="col-md-12 menu-book">
            <center>
                <span class="submenu-book"><a href="index.php"><i class="fas fa-home"></i> หน้าแรก</a></span> <span class="line-book"> |</span>
                <span class="submenu-book"><a href="knowledge.php"><i class="fas fa-book"></i> ฐานความรู้</a></span> <span class="line-book"> |</span>
                <span class="namesubmenu-book">
                    ฐานความรู้ เรื่อง :
                    <?php
                        if($sql_readbook['book_types'] == '1'){
                            echo $sql_readbook['book_name'];
                        } else {
                            echo $sql_readbook['book_namevideo'];
                        }
                    ?>
                </span>
                </center>
            </div>
        </div>
      </div>
    </section>
    <!--  End navbar2 -->

    <!--   Content-Knowledge -->

    <section id="content-knowledge2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="box-knowledge2">
              <div class="headerbox-knowledge2"></div>
              <!---->
              <div class="content-knowledge2">
                <div class="container">
                  <div class="row">
                  <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <!-- -->
                        <?php
                            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '%3A%2F%2F'.$_SERVER['HTTP_HOST'].'%2F';
                            if($sql_readbook['book_types'] == '1'){
                                echo '<div class="readbook-content2">';
                                echo '<div class="textreadbook-content2">'.$sql_readbook['book_p1'].'</div>';
                            if($sql_readbook['book_imagep1'] != ''){
                                echo '<center><img class="img-fluid image-readbook2 zoom-dark" src="assets/img/book/'.$sql_readbook['book_imagep1'].'"></center>';
                            }
                                echo '<br /><br />';
                                echo '<div class="textreadbook-content2">'.$sql_readbook['book_p2'].'</div>';
                                echo '<br /><br />';
                            if($sql_readbook['book_imagep2'] != ''){
                                echo '<center><img class="img-fluid image-readbook2"  src="assets/img/book/'.$sql_readbook['book_imagep2'].'"></center>';
                            }
                                echo '<br /><br />';
                                echo '<div class="textreadbook-content2">'.$sql_readbook['book_p3'].'</div>';
                                echo '<br /><br />';
                            if($sql_readbook['book_imagep3'] != ''){
                                echo '<center><img class="img-fluid image-readbook2 zoom-dark"  src="assets/img/book/'.$sql_readbook['book_imagep3'].'"></center>';
                            }
                                echo '<br /><br />';
                                echo "</div>";
                            } else {
                                echo '<div class="readbook-content2">';
                                echo '<div class="textreadbook-content2">'.$sql_readbook['book_p1'].'</div>';
                            if($sql_readbook['book_imagep1'] != ''){
                                echo '<center><img class="img-fluid image-readbook2 zoom-dark" src="assets/img/book/'.$sql_readbook['book_imagep1'].'"></center>';
                            }
                                echo '<br /><br /><br />';
                            if($sql_readbook['book_videoyt'] != ''){
                                echo '<center><div class="ytvideo-show"><iframe class="iframeyt" width="800" height="500" src="https://www.youtube.com/embed/'.$sql_readbook['book_videoyt'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div></center>';
                            }
                                echo '<br /><br />';
                                echo "</div>";
                              }
                        ?>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div>
        </div>
      </div>
    </section>
    <!--  End Content-Knowledge -->

    <?php
      if(isset($_POST['add_comment'])){
        $comment_name = $dbHandle->real_escape_string($_POST['comment_name']);
        $comment_description = $dbHandle->real_escape_string($_POST['comment_description']);
        $comment_postid = $dbHandle->real_escape_string($_POST['comment_postid']);

        $cap2 = $_POST['Code2'];
        $cap1 = $_POST['Code1'];

        if($cap1 != $cap2){
          echo "<script>iwarning('Warning', 'รหัสรักษาความปลอดภัยไม่ตรงกัน');</script>";
          echo "<meta http-equiv='refresh' content='2;'>";
        } else {

        $sql_updb = $dbHandle->query("INSERT INTO comment_t (comment_name,comment_description,comment_postid,comment_date) VALUES ('$comment_name','$comment_description','$comment_postid',NOW())");

        if($sql_updb){
            echo "<script>isuccess('Success', 'เพิ่มความคิดเห็นสำเร็จ');</script>";
            echo "<meta http-equiv='refresh' content='2;'>";
          } else {
            echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มความคิดเห็น');</script>";
            echo "<meta http-equiv='refresh' content='2;'>";
        }
      }
    }
    ?>
    <div class="commentbox">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="comment-list owl-carousel owl-theme" data-plugin-options="{'items': 2, 'autoplay': true, 'autoplayTimeout': 3000}" >
              <?php $sql_commnet = $dbHandle->query("SELECT * FROM comment_t WHERE comment_postid=$id");?>
              <?php while($comment = $sql_commnet->fetch_assoc()){?>
              <center>
                <div class="list-comment">
                  <img src="assets/img/speaker.png" class="img-comment img-fluid">
                  <p class="comment-text"><?=$comment['comment_description'];?></p>
                  <span class="comment_name">ผู้เขียนความคิดเห็น : <?=$comment['comment_name'];?></span> 
                  <p class="comment_date">
                    <?php
                      $datetime =  $comment['comment_date'];
                      echo thai_date_and_times(strtotime($datetime));
                    ?>
                  </p>
                </div>
              </center>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-4">
            <h4 class="text-commenthead"><i class="far fa-comment-alt"></i> แสดงความคิดเห็น</h4>
            <hr/>
            <form action="" method="post" id="form_comment" name="form_comment">
              <p class="nameform">ชื่อจริง</p>
              <input type="text" class="form-control" name="comment_name" autocomplete="off" placeholder="กรุณากรอกชื่อจริง"  maxlength="25" required>
              <br/>
              <p class="nameform">ความคิดเห็นของท่าน</p>
              <textarea type="text" class="form-control" name="comment_description" autocomplete="off" placeholder="กรุณากรอกความคิดเห็นของท่าน" maxlength="195" required></textarea>
              <br/>
              <?php $rand = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789+-*/!#'),0,6); ?>
								<input name="Code2" type="hidden" id="Code2" value="<?= $rand;?>" />
								<label class="control-label" for="Code1"><i class="fa fa-shield" aria-hidden="true"></i> <span class="badge badge-dark" style="font-size:16px;"><?= $rand;?> </span></label>
                <input name="Code1" class="form-control" type="text" id="Code1" maxlength="6" required  placeholder="กรุณากรอกตัวอักษรที่เห็นด้านบน" autocomplete="off">
                <br>
              <button type="submit" class="btn btn-success" name="add_comment"><i class="far fa-comment-alt"></i> เพิ่มความคิดเห็น</button>
              <input type="hidden"  name="comment_postid" value="<?=$sql_readbook['id'];?>">
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- showbook -->

    <div class="showbook">
          <div class="row">
         <div class="col-md-12">
         <center><h2 style="color:#6e8a6d; margin-top:2em">บทความเพิ่มเติม</h2></center><br>
         </div>
                <?php while($rows = $sql_showbook->fetch_assoc()) { ?>
                  <div class="col-md-3">
                    <?php
                      echo '<center><a href="readbook.php?n=readbook.php?n='.$rows['book_namevideo'].'&id='.$rows['id'].'"><img class="img-fluid img-showbook" src="assets/img/book-cover/'.$rows['book_cover'].'"></a></center>'; 
                      echo '<div class="name-showcatalog">';
                          if($rows['book_types'] == '1'){
                            echo $rows['book_name'];
                            echo '<br />';
                            echo '<i class="far fa-calendar-alt"></i>';
                            echo '&nbsp;';
                            $datetime =  $rows['book_date'];
                            echo thai_date_and_time(strtotime($datetime));
                        } else {
                            echo $rows['book_namevideo'];
                            echo '<br />';
                            echo '<i class="far fa-calendar-alt"></i>';
                            echo '&nbsp;';
                            $datetime =  $rows['book_date'];
                            echo thai_date_and_time(strtotime($datetime));
                        }
                      echo '</div>'
                      ?>
                  </div>
                  <?php } ?>
              </div>
          </div>
      </div>

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

    <!-- End Footer -->
    <div id="toTop"><i class="fa fa-chevron-up"></i><span>ขี้นบนสุด</span></div>

    <!--   -->
    <?php
      require 'login.php';
    ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
    <script>
    $(window).on('load', function(){
        if (window.matchMedia('(max-width: 768px)').matches) {
          $('.logo-header2').removeClass('hideform');
          $('.logo-header2').addClass('showform');
          $('.logo-header').removeClass('showform');
          $('.logo-header').addClass('hideform');
        }
        if (window.matchMedia('(max-width: 425px)').matches) {
          $('.dropdownmenuhome').removeClass('showform');
          $('.dropdownmenuhome').addClass('hideform');
        }
    });
    </script>
  </body>
</html>
