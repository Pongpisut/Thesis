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
  if (isset($_POST['submit']))  {
    error_reporting(0);
    $edit_firstname = $dbHandle->real_escape_string($_POST['edit_firstname']);
    $edit_lastname = $dbHandle->real_escape_string($_POST['edit_lastname']);
    $edit_nickname = $dbHandle->real_escape_string($_POST['edit_nickname']);
    $edit_roles = $dbHandle->real_escape_string($_POST['edit_roles']);

    $qry = $dbHandle->query("UPDATE member_t set firstname='$edit_firstname',lastname='$edit_lastname',nickname='$edit_nickname',roles='$edit_roles' WHERE id=$id");
    if ($qry) {
      echo "<script>isuccess('Success', 'แก้ไขสมาชิกสำเร็จ');</script>";
      echo "<meta http-equiv='refresh' content='2;URL=home.php?views=member'>";
    } else {
      echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขสมาชิก');</script>";
      echo "<meta http-equiv='refresh' content='2;URL=home.php?views=member'>";
    }
    // 

    $p_img = (isset($_POST['image_member']) ? $_POST['image_member'] : '');
    $upload_img = $_FILES['image_member']['name'];

    $ext = explode('.',$_FILES['image_member']['name']);
    $newName = round(microtime(true)).'.'.end($ext);
    $checkfiles = getimagesize($_FILES['image_member']['tmp_name']);

    if($upload_img != ''){
        if($checkfiles){
            $sql_selectimage = $dbHandle->query("SELECT image_member FROM member_t WHERE id=$id");
            $row_image =  $sql_selectimage->fetch_assoc();
            $image_old = $row_image['image_member'];
            unlink("assets/img/uploads/".$image_old);

            if(move_uploaded_file($_FILES['image_member']['tmp_name'],'assets/img/uploads/'.$newName)){
            $sql_member_image = $dbHandle->query("UPDATE member_t SET image_member='$newName' WHERE id=$id");

            if($sql_member_image){
                echo "<script>isuccess('Success', 'แก้ไขรูปภาพสมาชิกสำเร็จ');</script>";
                echo "<meta http-equiv='refresh' content='3;URL=home.php?views=member'>";
            } else {
                echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพสมาชิก');</script>";
                echo "<meta http-equiv='refresh' content='3;URL=home.php?views=member'>";
            }
        }
          } else {
                echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพ หรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
                echo "<meta http-equiv='refresh' content='3;URL=home.php?views=member'>";
            }
          } else {
            $newName = $p_img;
          }
  }

?>
    <section id="member_edit">
      <div class="container">
        <div class="box_edit">
          <p class="textname-edit">
            <i class="fas fa-user-friends"></i> แก้ไขสมาชิก
          </p>
          <hr style="margin-top:-1.3em;" />
          <form action="" method="post" id="member_editform" name="member_editform" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-3">
                <center>
                  <img
                    src="assets/img/uploads/<?php echo $member_edit['image_member'];?>"
                    class="img-memberedit"
                    alt=""
                  /><br />
                  <img id="img-upload" alt="" />
                  <input
                    type="file"
                    class="form-control file-up"
                    name="image_member"
                    id="image_member"
                    style="display:none;"
                  />
                  <div class="btn btn-light btn-upload">
                    <i class="fas fa-upload"></i> อัพโหลดรูปภาพสมาชิก
                  </div>
                  <div
                    class="btn btn-danger mg-top btn-remove-file"
                    style="display:none;"
                  >
                    X
                  </div>
                  <br />
                </center>
              </div>
              <div class="line-right"></div>
              <div class="col-md-4">
                <p class="nameform">ชื่อจริง</p>
                <input
                  type="text"
                  class="form-control"
                  name="edit_firstname"
                  placeholder="กรุณากรอกชื่อจริง"
                  autocomplete="off"
                  required
                  value="<?php echo $member_edit['firstname'];?>"
                /><br />
                <p class="nameform">ชื่อเล่น</p>
                <input
                  type="text"
                  class="form-control"
                  name="edit_nickname"
                  placeholder="กรุณากรอกชื่อเล่น"
                  autocomplete="off"
                  required
                  value="<?php echo $member_edit['nickname'];?>"
                /><br />
              </div>
              <div class="col-md-4" style="margin-bottom:1.5em;">
              <p class="nameform">นามสกุล</p>
                <input
                  type="text"
                  class="form-control"
                  name="edit_lastname"
                  placeholder="กรุณากรอกนามสกุล"
                  autocomplete="off"
                  required
                  value="<?php echo $member_edit['lastname'];?>"
                />
                <br />
                <p class="nameform">ตำแหน่ง</p>
                <input
                  type="text"
                  class="form-control"
                  name="edit_roles"
                  placeholder="กรุณากรอกตำแหน่ง"
                  autocomplete="off"
                  required
                  value="<?php echo $member_edit['roles'];?>"
                /><br />
              </div>
          </div>
          <hr>
            <button
              class="btn btn-success btnmemberedit"
              name="submit"
              type="submit"
              style="float:right; margin-bottom:1em; margin-right:4em">
              <i class="fas fa-check"></i> บันทึกการแก้ไข
            </button>
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
