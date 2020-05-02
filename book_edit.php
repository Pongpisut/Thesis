<?php
  require 'connectdb.php';
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: 404.php");
  }
    $sql = $dbHandle->query("SELECT * FROM adminuser_t WHERE id='".$_SESSION['id']."'");
    $me = $sql->fetch_assoc();

    $id = $_GET['id'];
    $sql_editmember = $dbHandle->query("SELECT * FROM member_t WHERE id=$id");
    $member_edit = $sql_editmember->fetch_assoc();

    $sql_bookedit = $dbHandle->query("SELECT * FROM book_t WHERE id=$id");

    $sql_bookeditOb = $dbHandle->query("SELECT * FROM book_t WHERE id=$id");
    $qry_fetchbook = $sql_bookeditOb->fetch_assoc();

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
    <link rel="stylesheet" href="assets/css/responsive.css">
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
    <link rel="stylesheet" href="assets/css/sweetalert2.css" />
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <script type="text/javascript" src="assets/js/alertui.js"></script>
    <script src="assets/plugin/ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
            <div class="menu-top">
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
              <li class="nav-item">
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
                  ><i class="fas fa-images"></i> จัดการรูปภาพกิจกรรม</a
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
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <?php

      if(isset($_POST['book_edit'])){
        error_reporting(0);
        $book_name = $dbHandle->real_escape_string($_POST['book_name']);
        $book_description = $dbHandle->real_escape_string($_POST['book_description']);

        $p_img = (isset($_POST['image_book']) ? $_POST['image_book'] : '');
        $upload_img = $_FILES['image_book']['name'];

         //upload image
         $ext = explode('.',$_FILES['image_book']['name']);
         $newName = round(microtime(true)).'.'.end($ext);
         $checkfiles = getimagesize($_FILES['image_book']['tmp_name']);

         $qrybtn_bookedit = $dbHandle->query("UPDATE book_t set book_name='$book_name',book_description='$book_description' WHERE id=$id");
         if($qrybtn_bookedit){
          echo "<script>isuccess('Success', 'แก้ไขบทความสำเร็จ');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
         } else {
          echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขบทความ');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          }

        if($upload_img != ''){
          if($checkfiles){
            $sql_selectimage = $dbHandle->query("SELECT book_cover FROM book_t WHERE id=$id");
            $row_image =  $sql_selectimage->fetch_assoc();
            $image_old = $row_image['book_cover'];
            unlink("assets/img/book-cover/".$image_old);

            if(move_uploaded_file($_FILES['image_book']['tmp_name'],'assets/img/book-cover/'.$newName)){
                $qry_bookedit = $dbHandle->query("UPDATE book_t set book_cover='$newName' WHERE id=$id");

                if($qry_bookedit){
                echo "<script>isuccess('Success', 'แก้ไขรูปภาพบทความสำเร็จ');</script>";
                echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
              } else {
                echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพบทความ');</script>";
                echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                }
              }
              } else {
                echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
                echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
              }
            } else{
              $newName = $p_img;
            }
        }
    //
      if(isset($_POST['btn_paragraph1'])){
        error_reporting(0);
        $disriptionnotep1 = $dbHandle->real_escape_string($_POST['disriptionnotep1']);

        $p_img = (isset($_POST['book_imagep1']) ? $_POST['book_imagep1'] : '');
        $upload_img = $_FILES['book_imagep1']['name'];

        $qrybtn_bookp1 = $dbHandle->query("UPDATE book_t set book_p1='$disriptionnotep1' WHERE id=$id");
        if($qrybtn_bookp1){
         echo "<script>isuccess('Success', 'แก้ไขบทความสำเร็จ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
        } else {
         echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขบทความ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
         }

        //upload image
        $ext = explode('.',$_FILES['book_imagep1']['name']);
        $newName = round(microtime(true)).'.'.end($ext);
        $checkfiles = getimagesize($_FILES['book_imagep1']['tmp_name']);

    if($upload_img != ''){
      if($checkfiles){
        $sql_selectimage = $dbHandle->query("SELECT book_imagep1 FROM book_t WHERE id=$id");
        $row_image =  $sql_selectimage->fetch_assoc();
        $image_old = $row_image['book_imagep1'];
        unlink("assets/img/book/".$image_old);

        if(move_uploaded_file($_FILES['book_imagep1']['tmp_name'],'assets/img/book/'.$newName)){
          $qry_paragraph1 = $dbHandle->query("UPDATE book_t set book_imagep1='$newName' WHERE id=$id");

           if($qry_paragraph1){
            echo "<script>isuccess('Success', 'แก้ไขรูปภาพบทความสำเร็จ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          } else {
            echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพบทความ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
            }
          }
          } else {
            echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          }
        } else {
          $newName = $p_img;
        }
      }

      // 
      if(isset($_POST['btn_paragraph2'])){
        error_reporting(0);
        $disriptionnotep2 = $dbHandle->real_escape_string($_POST['disriptionnotep2']);

        $p_img = (isset($_POST['book_imagep2']) ? $_POST['book_imagep2'] : '');
        $upload_img = $_FILES['book_imagep2']['name'];

        $qrybtn_bookp2 = $dbHandle->query("UPDATE book_t set book_p2='$disriptionnotep2' WHERE id=$id");
        if($qrybtn_bookp2){
         echo "<script>isuccess('Success', 'แก้ไขบทความสำเร็จ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
        } else {
         echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขบทความ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
         }


        //upload image
        $ext = explode('.',$_FILES['book_imagep2']['name']);
        $newName = round(microtime(true)).'.'.end($ext);
        $checkfiles = getimagesize($_FILES['book_imagep2']['tmp_name']);

    if($upload_img != ''){
      if($checkfiles){
        $sql_selectimage = $dbHandle->query("SELECT book_imagep2 FROM book_t WHERE id=$id");
        $row_image =  $sql_selectimage->fetch_assoc();
        $image_old = $row_image['book_imagep2'];
        unlink("assets/img/book/".$image_old);

        if(move_uploaded_file($_FILES['book_imagep2']['tmp_name'],'assets/img/book/'.$newName)){
          $qry_paragraph2 = $dbHandle->query("UPDATE book_t set book_imagep2='$newName' WHERE id=$id");

           if($qry_paragraph2){
            echo "<script>isuccess('Success', 'แก้ไขรูปภาพบทความสำเร็จ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          } else {
            echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพบทความ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
            }
          }
          } else {
            echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          }
        } else {
          $newName = $p_img;
        }
      }

      if(isset($_POST['btn_paragraph3'])){
        error_reporting(0);
        $disriptionnotep3 = $dbHandle->real_escape_string($_POST['disriptionnotep3']);

        $p_img = (isset($_POST['book_imagep3']) ? $_POST['book_imagep3'] : '');
        $upload_img = $_FILES['book_imagep3']['name'];

        $qrybtn_bookp3 = $dbHandle->query("UPDATE book_t set book_p3='$disriptionnotep3' WHERE id=$id");
        if($qrybtn_bookp3){
         echo "<script>isuccess('Success', 'แก้ไขบทความสำเร็จ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
        } else {
         echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขบทความ');</script>";
         echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
         }

        //upload image
        $ext = explode('.',$_FILES['book_imagep3']['name']);
        $newName = round(microtime(true)).'.'.end($ext);
        $checkfiles = getimagesize($_FILES['book_imagep3']['tmp_name']);

    if($upload_img != ''){
      if($checkfiles){
        $sql_selectimage = $dbHandle->query("SELECT book_imagep3 FROM book_t WHERE id=$id");
        $row_image =  $sql_selectimage->fetch_assoc();
        $image_old = $row_image['book_imagep3'];
        unlink("assets/img/book/".$image_old);

        if(move_uploaded_file($_FILES['book_imagep3']['tmp_name'],'assets/img/book/'.$newName)){
          $qry_paragraph3 = $dbHandle->query("UPDATE book_t set book_imagep3='$newName' WHERE id=$id");

           if($qry_paragraph3){
            echo "<script>isuccess('Success', 'แก้ไขรูปภาพบทความสำเร็จ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          } else {
            echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพบทความ');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
            }
          }
          } else {
            echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
            echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
          }
          } else {
            $newName = $p_img;
          }
      }
    ?>
    <section id="book_edit">
      <div class="container">
        <div class="box_edit">
          <p class="textname-edit">
            <i class="fas fa-plus"></i> เพิ่มเนื้อหาบทความ
          </p>
          <hr style="margin-top:-1.3em;" />
          <div class="row">
            <div class="col-md-4">
              <?php while($bookedit = $sql_bookedit->fetch_assoc()) { ?>
              <form action="" method="post" id="paragraphbook" enctype="multipart/form-data">
              <p class="nameform">ชื่อบทความ</p>
              <input type="text" class="form-control inputbook-name" name="book_name" autocomplete="off" maxlength="38" placeholder="กรุณากรอกชื่อบทความ" required
              value="<?=$bookedit['book_name'];?>">
              <br />
              <p class="nameform">คำอธิบายบทความสั้นๆ</p>
              <input type="text" class="form-control inputbook-des" name="book_description" autocomplete="off" placeholder="กรุณากรอกคำอธิบายบทความสั้นๆ" maxlength="40" required 
              value="<?=$bookedit['book_description'];?>">
              <img src="./assets/img/book-cover/<?=$bookedit['book_cover'];?>" class="img-coverbookedit" alt="">
            <input
                type="file"
                class="form-control file-upbook"
                name="image_book"
                id="image_book"
                style="display:none;"
              />
              <div class="btn btn-light btn-uploadbook">
                <i class="fas fa-upload"></i> อัพโหลดรูปภาพปกบทความ
              </div>
              <div
                class="btn btn-danger mg-top btn-remove-file"
                style="display:none;"
              >
                X
              </div>
              <br/><br/>
              <button
              class="btn btn-success"
              name="book_edit"
              id="submit"
              type="submit">
              <i class="fas fa-check"></i> แก้ไขบทความ
            </button>
              </form>
              <?php } ?>
            </div>
            <div class="col-md-12">
            <hr/>
              <form
                action=""
                method="post"
                id="paragraphbook"
                enctype="multipart/form-data"
              >
                <h2>
                บทความส่วนที่ 1
                <input
                    type="file"
                    class="form-control file-bookp1"
                    name="book_imagep1"
                    id="book_imagep1"
                    style="display:none;"
                  />
                  <div class="btn btn-light btn-uploadbookp1">
                    <i class="fas fa-upload"></i> อัพโหลดรูปภาพ
                  </div>
                  <div
                    class="btn btn-danger mg-top btn-remove-file"
                    style="display:none;"
                  >
                    X
                  </div>
                <br />
                </h2>
                <div class="boxbook-edit1">
                  <textarea
                    name="disriptionnotep1"
                    class="disriptionnotep1"
                  >
                  <?php echo $qry_fetchbook['book_p1'];?>
                  </textarea>
                  <br/>
                  <button
                    class="btn btn-success"
                    name="btn_paragraph1"
                    id="submit"
                    type="submit"
                    style="float:right;"
                  >
                    <i class="fas fa-check"></i> เพิ่มเนื้อหาส่วนที่ 1
                  </button>
                </div>
              </form>
            </div>
            <br /><br />
            <div class="col-md-12">
            <hr/>
              <form
                action=""
                method="post"
                id="paragraphbook"
                enctype="multipart/form-data"
              >
                <h2>
                บทความส่วนที่ 2
                <input
                    type="file"
                    class="form-control file-bookp1"
                    name="book_imagep2"
                    id="book_imagep2"
                    style="display:none;"
                  />
                  <div class="btn btn-light btn-uploadbookp1">
                    <i class="fas fa-upload"></i> อัพโหลดรูปภาพ
                  </div>
                  <div
                    class="btn btn-danger mg-top btn-remove-file"
                    style="display:none;"
                  >
                    X
                  </div>
                </h2>
                <br />
                <div class="boxbook-edit1">
                  <textarea
                    name="disriptionnotep2"
                    class="disriptionnotep2"
                  >
                  <?php echo $qry_fetchbook['book_p2'];?>
                  </textarea>
                  <br />
                  <button
                    class="btn btn-success"
                    name="btn_paragraph2"
                    id="submit"
                    type="submit"
                    style="float:right;"
                  >
                    <i class="fas fa-check"></i> เพิ่มเนื้อหาส่วนที่ 2
                  </button>
                </div>
              </form>
            </div>
            <br /><br />
            <div class="col-md-12">
            <hr/>
              <form
                action=""
                method="post"
                id="paragraphbook"
                enctype="multipart/form-data"
              >
                <h2>
                บทความส่วนที่ 3
                <input
                    type="file"
                    class="form-control file-bookp1"
                    name="book_imagep3"
                    id="book_imagep3"
                    style="display:none;"
                  />
                  <div class="btn btn-light btn-uploadbookp1">
                    <i class="fas fa-upload"></i> อัพโหลดรูปภาพ
                  </div>
                  <div
                    class="btn btn-danger mg-top btn-remove-file"
                    style="display:none;"
                  >
                    X
                  </div>
                </h2>
                <br />
                <div class="boxbook-edit1">
                  <textarea
                    name="disriptionnotep3"
                    class="disriptionnotep3"
                  >
                  <?php echo $qry_fetchbook['book_p3'];?>
                  </textarea>
                  <br />
                </div>
                <hr />
                <button
                  class="btn btn-success"
                  name="btn_paragraph3"
                  id="submit"
                  type="submit"
                  style="float:right;"
                >
                  <i class="fas fa-check"></i> เพิ่มเนื้อหาส่วนที่ 3
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Footer -->
    <section id="footer" class="footer-bgdark">
      <div class="row">
        <div class="col-md-12">
          <img src="assets/img/footer.png" class="img-footer" alt="" />

          <div class="footer-image">
            <span>
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
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
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

    <script>
      CKEDITOR.replace("disriptionnotep1");
      CKEDITOR.replace("disriptionnotep2");
      CKEDITOR.replace("disriptionnotep3");
    </script>
  </body>
</html>
