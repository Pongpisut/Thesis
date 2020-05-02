<?php
  require 'connectdb.php';
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location: 404.php");
  }
    $sql = $dbHandle->query("SELECT * FROM adminuser_t WHERE id='".$_SESSION['id']."'");
    $me = $sql->fetch_assoc();

    $id = $_GET['id'];
    $sql_gallery = $dbHandle->query("SELECT * FROM gallery_t WHERE catalog_gallery=$id");

    $sql_catalog = $dbHandle->query("SELECT * FROM catalog_t WHERE id=$id");
    $catalog = $sql_catalog->fetch_assoc();

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
    if(isset($_POST['editname_catalog'])){
      error_reporting(0);
      $catalog_nameedit = $_POST['catalog_nameedit'];

      $sql_namecatalog = $dbHandle->query("UPDATE catalog_t set catalog_gallery='$catalog_nameedit' WHERE id=$id");
      if($sql_namecatalog){
        echo "<script>isuccess('Success', 'แก้ไขชื่อแคตตาล็อกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
      } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขชื่อแคตตาล็อก');</script>";
        echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
      }

      $p_img = (isset($_POST['gallery_cover']) ? $_POST['gallery_cover'] : '');
      $upload_img = $_FILES['gallery_cover']['name'];

      //upload image
      $ext = explode('.',$_FILES['gallery_cover']['name']);
      $newName = round(microtime(true)).'.'.end($ext);
      $checkfiles = getimagesize($_FILES['gallery_cover']['tmp_name']);

      if($upload_img != ''){
        if($checkfiles){
          $sql_selectimage = $dbHandle->query("SELECT gallery_cover FROM catalog_t WHERE id=$id");
          $row_image =  $sql_selectimage->fetch_assoc();
          $image_old = $row_image['gallery_cover'];
          unlink("assets/img/cover/".$image_old);

          if(move_uploaded_file($_FILES['gallery_cover']['tmp_name'],'assets/img/cover/'.$newName)){
            $sql_namecatalog = $dbHandle->query("UPDATE catalog_t set gallery_cover='$newName' WHERE id=$id");

              if($sql_namecatalog){
              echo "<script>isuccess('Success', 'แก้ไขรูปภาพปกกิจกรรมสำเร็จ');</script>";
              echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
            } else {
              echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการแก้ไขรูปภาพปกกิจกรรม');</script>";
              echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
              }
            }
            } else {
              echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
              echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
            }
          } else{
            $newName = $p_img;
          }

    }
?>
    <section id="gallery_edit">
        <div class="container">
            <div class="box_edit">
                <p class="textname-edit">
                    <i class="fas fa-images"></i> แก้ไขรูปภาพกิจกรรม
                </p>
                <hr style="margin-top:-1.3em;" />
                <div class="boxname_catalog">
                      <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="nameform">ชื่อหมวดหมู่</p>
                                <input type="text" class="form-control frm-namecatalogedit" name="catalog_nameedit" maxlength="40" autocomplete="off" placeholder="กรุณากรอกชื่อแคตตาล็อก" require value="<?=$catalog['catalog_gallery'];?>">
                               <br >
                               <img src="assets/img/cover/<?=$catalog['gallery_cover'];?>" class="img-covergallerys" height="auto" alt="">
                               <br/><br >
                                <input
                                  type="file"
                                  class="form-control file-up"
                                  name="gallery_cover"
                                  id="gallery_cover"
                                  style="display:none;"
                                  require
                                />
                                <div class="btn btn-light btn-upload">
                                  <i class="fas fa-upload"></i> อัพโหลดรูปภาพปก
                                </div>
                                <div
                                  class="btn btn-danger mg-top btn-remove-file"
                                  style="display:none;"
                                >
                                  X
                                </div>
                                <br/><br/>
                               <button class="btn btn-success editname_catalog" name="editname_catalog"><i class="fas fa-check"></i> บันทึกการแก้ไข</button>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
                            <hr>
                            <div class="row">
                            <?php while($gallery_showedits = $sql_gallery->fetch_assoc()) {?>
                            <div class="col-md-4" id="showdetails_gallery">
                                <img src="assets/img/photos/<?php echo $gallery_showedits['gallery_name'];?>" alt="" class="img-thumbnail photos_img">
                                <br/> <br/>
                                <center>
                                  <button class="btn btn-danger delete_gallery" name="delete-gallery"  id="<?php echo $gallery_showedits['id'];?>">
                                    <i class="fas fa-trash-alt"></i> ลบ
                                  </button>
                                </center>
                            </div>
                            <?php } ?>
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
  </body>
</html>
