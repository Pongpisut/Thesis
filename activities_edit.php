<?php
  require 'connectdb.php';
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: 404.php");
  }
  $sql = $dbHandle->query("SELECT * FROM adminuser_t WHERE id='".$_SESSION['id']."'");
  $me = $sql->fetch_assoc();

  $id = $_GET['id'];
  $sql_editactivities = $dbHandle->query("SELECT * FROM package_t WHERE id=$id");
  $activities_edit = $sql_editactivities->fetch_assoc();
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
      if(isset($_POST['submit'])){
        $name_package = $dbHandle->real_escape_string($_POST['name_package']);
        $des_package = $dbHandle->real_escape_string($_POST['des_package']);
        $activities_1 = $dbHandle->real_escape_string($_POST['activities_1']);
        $activities_2 = $dbHandle->real_escape_string($_POST['activities_2']);
        $activities_3 = $dbHandle->real_escape_string($_POST['activities_3']);
        $other_description = $dbHandle->real_escape_string($_POST['other_description']);
        $price_activities = $dbHandle->real_escape_string($_POST['price_activities']);

        $qry = $dbHandle->query("UPDATE package_t set name_package='$name_package',des_package='$des_package',activities_1='$activities_1',activities_2='$activities_2',activities_3='$activities_3',other_description='$other_description',price_activities='$price_activities' WHERE id=$id");
        if ($qry) {
          echo "<script>isuccess('Success', 'แก้ไขกิจกรรมชมสวนได้สำเร็จ');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=activities'>";
        } else {
          echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขกิจกรรมชมสวน');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=activities'>";
        }
      }
    ?>
    <!-- Package edit -->
    <section id="package_edit">
      <div class="container">
        <div class="box_edit">
        <p class="textname-edit">
            <i class="fas fa-shopping-cart"></i> แก้ไขกิจกรรมชมสวน
          </p>
          <hr style="margin-top:-1.3em;" />
          <form action="" method="post" id="activities_edits">
            <div class="row">
              <div class="col-md-4">
                <p class="nameform">ชื่อกิจกรรม</p>
                <input type="text" class="form-control" name="name_package" autocomplete="off" placeholder="กรุณากรอกชื่อกิจกรรม" required value="<?php echo $activities_edit['name_package']; ?>">
              </div>
              <div class="col-md-4 des_package">
                <p class="nameform">คำอธิบายกิจกรรม</p>
                <input type="text" class="form-control" name="des_package" autocomplete="off" placeholder="กรุณากรอกคำอธิบายกิจกรรม" required value="<?php echo $activities_edit['des_package']; ?>">
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4" style="margin-top:1.8em">
                <p class="nameform">กิจกรรมที่ได้รับ 1</p>
                <input type="text" class="form-control" name="activities_1" autocomplete="off" placeholder="กรุณากรอกกิจกรรมที่ได้รับ 1" required value="<?php echo $activities_edit['activities_1']; ?>">
              </div>
              <div class="col-md-4" style="margin-top:1.8em">
                <p class="nameform">กิจกรรมที่ได้รับ 2</p>
                <input type="text" class="form-control" name="activities_2" autocomplete="off" placeholder="กรุณากรอกกิจกรรมที่ได้รับ 2" required value="<?php echo $activities_edit['activities_2']; ?>">
              </div>
              <div class="col-md-4" style="margin-top:1.8em">
                <p class="nameform">กิจกรรมที่ได้รับ 3</p>
                <input type="text" class="form-control" name="activities_3" autocomplete="off" placeholder="กรุณากรอกกิจกรรมที่ได้รับ 3" required value="<?php echo $activities_edit['activities_3']; ?>">
              </div>
              <div class="col-md-4" style="margin-top:1.8em">
                <p class="nameform">คำอธิบายกิจกรรมเพิ่มเติม</p>
                <input type="text" class="form-control" name="other_description" autocomplete="off" placeholder="กรุณากรอกคำอธิบายกิจกรรมเพิ่มเติม"  value="<?php echo $activities_edit['other_description']; ?>">
                <br />
              </div>
              <div class="col-md-4 des_price" style="margin-top:1.8em">
                <p class="nameform">ราคากิจกรรมชมสวน</p>
                <input type="text" class="form-control" name="price_activities" autocomplete="off" placeholder="กรุณากรอกราคากิจกรรมชมสวน" required value="<?php echo $activities_edit['price_activities']; ?>">
                <br />
              </div>
            </div>
            <hr>
            <button class="btn btn-success" name="submit" type="submit"  style="float:right;"> <i class="fas fa-check"></i> บันทึกการแก้ไข</button>
          </form>
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
  </body>
</html>
