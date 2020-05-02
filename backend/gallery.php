<?php
  error_reporting(0);
  if(isset($_POST['add_catalog'])){
    $namecatalog = $dbHandle->real_escape_string($_POST['namecatalog']);
    $dateupload =  $dbHandle->real_escape_string($_POST['date_upload']);
    $datebd = date("Y-m-d",strtotime($dateupload));

     //upload image
     $ext = explode('.',$_FILES['gallery_cover']['name']);
     $newName = round(microtime(true)).'.'.end($ext);
     $checkfiles = getimagesize($_FILES['gallery_cover']['tmp_name']);

     if($checkfiles){
       if(move_uploaded_file($_FILES['gallery_cover']['tmp_name'],'./assets/img/cover/'.$newName)){
         $sql_catalog = $dbHandle->query("INSERT INTO catalog_t (catalog_gallery,date_gallery,gallery_cover) VALUES ('$namecatalog','$datebd','$newName')");
         if($sql_catalog){
           echo "<script>isuccess('Success', 'เพิ่มแคตตาล็อกสำเร็จ');</script>";
           echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
         } else {
           echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มแคตตาล็อก');</script>";
           echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
           }
         }
         } else {
           echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
           echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
         }
  }
          $perpage = 6;
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
            } else {
            $page = 1;
            }
          $start = ($page - 1) * $perpage;
          $sql = "SELECT * FROM catalog_t ORDER BY id DESC LIMIT {$start} , {$perpage} ";
          $sql_selectcatalog = mysqli_query($dbHandle, $sql);
?>
<section id="gallery_backend">
  <div class="container">
    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-4"></div>
      <div class="col-md-3">
        <div class="frm-addremove">
          <div class="form-search">
                <div class="input-group">
                  <input
                    type="text"
                    class=" form-control"
                    name=""
                    placeholder="ค้นหาแคตตาล็อกภาพกิจกรรม"
                    autocomplete="off"
                    id="searchgallery"
                  />
                  <span class="input-group-btn">
                    <button class="btn btn-brown2 " type="submit">
                      <i class="fa fa-search icon-search" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
                <div id="resultgallery"></div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <form
          action=""
          method="post"
          id="create_catalog"
          enctype="multipart/form-data"
        >
          <div class="box_edit">
            <p class="textname-edit">
              <i class="fas fa-images"></i> เพิ่มหมวดหมู่ภาพกิจกรรม
            </p>
            <hr style="margin-top:-1.3em;" />
            <div class="box-insertgallery">
              <p class="nameform">ชื่อหมวดหมู่</p>
              <input
                type="text"
                class="form-control"
                name="namecatalog"
                required
                autocomplete="off"
                placeholder="กรุณากรอกชื่อหมวดหมู่ภาพกิจกรรม"
                maxlength="40"
              />
              <br />
              <p class="nameform">เลือกวันที่ของภาพกิจกรรม</p>
              <input
                type="text"
                class="form-control"
                name="date_upload"
                autocomplete="off"
                id="date_upload"
                value=""
                required
                placeholder="เลือกวันที่ของภาพกิจกรรม"
              />
              <br />
              <img id="imguploadshow" alt="">
              <input
                type="file"
                class="form-control file-up"
                name="gallery_cover"
                id="gallery_cover"
                style="display:none;"
                require
                onchange="readUrl(this)"
              />
              <div class="btn btn-light btn-upload uploadgallery">
                <i class="fas fa-upload"></i> อัพโหลดรูปภาพปก
              </div>
              <div
                class="btn btn-danger mg-top btn-remove-file"
                style="display:none;"
              >
                X
              </div>
              <br />
              <hr />
              <button class="btn btn-success" name="add_catalog" type="submit">
                <i class="fas fa-check"></i> เพิ่มหมวดหมู่
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <div id="show_catalog">
          <div class="box-show">
          <p class="textname-edit">
            <i class="fas fa-images"></i> หมวดหมู่รูปภาพกิจกรรม
          </p>
          </div>
          <hr style="margin-top:-1.3em;" />
            <?php while($gallery_show = $sql_selectcatalog->fetch_assoc()) {?>
            <div class="box-showgallery">
              <div class="row">
                <div class="col-md-3">
                <center>
                <img src="./assets/img/cover/<?php echo $gallery_show['gallery_cover'];?>" class="img-cover" alt="" />
                </center>
                </div>
                <div class="col-md-3">
                <p class="namegallery-list">
                  <?php echo $gallery_show['catalog_gallery'];?>
                </p>
                <p class="dates-gallery">
                  <?php
                    $datetime =  $gallery_show['date_gallery'];
                    echo thai_date_and_time(($datetime));
                  ?>
                </p>
                </div>
                <div class="col-md-6 group_btn">
                <button type="button" class="btn btn-yellow add-photo" data-toggle="modal" data-target="#photo_add">
                  <i class="fas fa-plus"></i> เพิ่มรูปภาพ
                </button>
                  <a href="gallery_edit.php?id=<?php echo $gallery_show['id'];?>">
                    <button class="btn btn-brown2 edit_photo" name="edit_photo" type="submit">
                      <i class="fas fa-edit"></i> แก้ไข
                    </button>
                  </a>
                  <button class="btn btn-danger delete_photo" name="delete_photo"  type="submit" id="<?php echo $gallery_show['id'];?>">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </button>
                </div>
              </div>
            </div>
            <hr>
            <?php } ?>
              <?php
              $sql2 = "SELECT * FROM catalog_t ";
              $query2 = mysqli_query($dbHandle, $sql2);
              $total_record = mysqli_num_rows($query2);
              $total_page = ceil($total_record / $perpage);
              ?>
                <nav aria-label="...">
                  <ul class="pagination pagination-md">
                    <?php for($i=1; $i<=$total_page; $i++) { ?>
                    <li class="page-item <?php if($page==$i) echo 'active';?>">
                      <a class="page-link" href="home.php?views=gallery&page=<?=$i?>"><?php echo $i;?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    if(isset($_POST['gallerybtn_uploads'])){
      $catalog_gallery = $_POST['catalog'];
       //upload image
       $ext = explode('.',$_FILES['image_gallery']['name']);
       $newName = round(microtime(true)).'.'.end($ext);
       $checkfiles = getimagesize($_FILES['image_gallery']['tmp_name']);

       if($checkfiles){
         if(move_uploaded_file($_FILES['image_gallery']['tmp_name'],'./assets/img/photos/'.$newName)){
           $sql_galleryupload = $dbHandle->query("INSERT INTO gallery_t (gallery_name,catalog_gallery) VALUES ('$newName','$catalog_gallery')");
           if($sql_galleryupload){
             echo "<script>isuccess('Success', 'เพิ่มรูปภาพกิจกรรมสำเร็จ');</script>";
             echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
           } else {
             echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มรูปภาพกิจกรรม');</script>";
             echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
             }
           }
           } else {
             echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
             echo "<meta http-equiv='refresh' content='2;URL=home.php?views=gallery'>";
           }
    }
?>
<!-- Modal -->
<div class="modal fade" id="photo_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-images"></i> อัพโหลดรูปภาพกิจกรรม</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data" id="gallery_up">
       <div>
       <?php $sql_selectcatalogname = $dbHandle->query("SELECT * FROM catalog_t"); ?>
					<p for="catalog" class="nameform"><i class="fas fa-list"></i> หมวดหมู่รูปภาพกิจกรรม</p>
					<select name="catalog" id="catalog" class="form-control ">
          <?php while($catalog_name = $sql_selectcatalogname->fetch_assoc()){?>
						<option value="<?=$catalog_name['id'];?>"><?=$catalog_name['catalog_gallery'];?></option>
          <?php } ?>
					</select>
				</div>
       <div class="extra-field-box">
        <div class="multi-box">
          <div class="dublicat-box">
          <img id="imguploadshow2" alt="">
              <input
                  type="file"
                  class="form-control file-upgallery"
                  name="image_gallery"
                  id="image_gallery"
                  style="display:none;"
                  required
                  onchange="readUrlimg(this)"
                />
                <div class="btn btn-light btn-uploadgallery">
                <i class="fas fa-upload"></i> อัพโหลดรูปภาพกิจกรรม
              </div>
              <div class="btn btn-danger mg-top btn-remove-file" style="display:none;"> X</div>
            </div>
          </div>
       </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="gallerybtn_uploads" id="gallerybtn_uploads"><i class="fas fa-check"></i> อัพโหลดรูปภาพ</button>
      </div>
      </form>

    </div>
  </div>
</div>
