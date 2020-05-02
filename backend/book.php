<section id="book-home">
  <div class="container">
    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-4">
      <div class="btn-addremove">
          <button type="button" class="btn btn-yellow add-field">
            <i class="fas fa-sticky-note"></i> เพิ่มบทความ
          </button>
          <button type="button" class="btn btn-info add-field-video">
            <i class="fas fa-photo-video"></i> เพิ่มบทความวิดีโอ
          </button>
        </div>
        </div>
      <div class="col-md-3">
        <div class="frm-addremove">
          <div class="form-search">
                <div class="input-group">
                  <input
                    type="text"
                    class=" form-control"
                    name=""
                    placeholder="ค้นหาบทความและวิดีโอ"
                    autocomplete="off"
                    id="searchbook"
                  />
                  <span class="input-group-btn">
                    <button class="btn btn-brown2 " type="submit">
                      <i class="fa fa-search icon-search" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
                <div id="resultbook"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <?php 
      if(isset($_POST['btn_addbook'])){
        $book_name =  $dbHandle->real_escape_string($_POST['book_name']);
        $book_description =  $dbHandle->real_escape_string($_POST['book_description']);
        $date_upload =  $dbHandle->real_escape_string($_POST['date_upload']);
        $book_types =  $dbHandle->real_escape_string($_POST['book_types']);
        $datebd = date("Y-m-d",strtotime($date_upload));

            $ext = explode('.',$_FILES['book_cover']['name']);
            $newName = round(microtime(true)).'.'.end($ext);
            $checkfiles = getimagesize($_FILES['book_cover']['tmp_name']);

            if($checkfiles){
              if(move_uploaded_file($_FILES['book_cover']['tmp_name'],'./assets/img/book-cover/'.$newName)){
                $sql_book = $dbHandle->query("INSERT INTO book_t (book_name,book_description,book_date,book_cover,book_p1,book_imagep1,book_p2,book_imagep2,book_p3,book_imagep3,book_namevideo,book_videoyt,book_types) 
                VALUES ('$book_name','$book_description','$datebd','$newName','','','','','','','','','$book_types')");
                if($sql_book){
                  echo "<script>isuccess('Success', 'เพิ่มบทความสำเร็จ');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                } else {
                  echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มบทความ');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                  }
                }
                } else {
                  echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                }
          }
    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 frmbook">
        <div class="box-bookhome hideform">
          <div class="content-boxhome">
            <img
              src="./assets/img/icon-book.png"
              alt=""
              class="book-iconbook"
            />
            <span class="text-boxhome">เพิ่มบทความ</span>
            <button type="button" class="btn btn-danger remove-field">
              <i class="fas fa-trash-alt"></i> ลบ
            </button>
          </div>
          <hr style="margin-top:-2.4em" />
          <form action="" method="post" enctype="multipart/form-data">
            <div class="multi-box">
              <p class="nameform">ชื่อบทความ</p>
              <input
                type="text"
                class="form-control"
                name="book_name"
                id="book_name"
                placeholder="กรุณากรอกชื่อบทความ"
                autocomplete="off"
                maxlength="38"
              />
              <br />
              <p class="nameform">คำอธิบายเกี่ยวกับบทความสั้นๆ</p>
              <input
                type="text"
                class="form-control"
                name="book_description"
                id="book_description"
                placeholder="กรุณากรอกคำอธิบายเกี่ยวกับบทความสั้นๆ"
                autocomplete="off"
                maxlength="40"
              />
              <br />
              <p class="nameform">เลือกวันที่ลงบทความ</p>
              <input
                type="text"
                class="form-control"
                name="date_upload"
                autocomplete="off"
                id="date_upload"
                value=""
                required
                placeholder="เลือกวันที่ลงบทความ"
              />
              <br />
              <img  id="imguploadshow"  alt="">
              <input
                type="file"
                class="form-control file-upbook"
                name="book_cover"
                id="book_cover"
                style="display:none;"
                required
                onchange="readUrl(this)"
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
              <hr />
              <button
              class="btn btn-success"
              name="btn_addbook"
              id="submit"
              type="submit">
              <i class="fas fa-check"></i> เพิ่มบทความ
            </button>
            <input type="hidden" class="hidden" name="book_types" value="1">
            </div>
        </div>
        </form>
        <!--  -->
        <?php 
          if(isset($_POST['btn_addvideo'])){
            $book_namevideo = $dbHandle->real_escape_string($_POST['book_namevideo']);
            $book_description2 =  $dbHandle->real_escape_string($_POST['book_description2']);
            $book_videoyt = $dbHandle->real_escape_string($_POST['book_videoyt']);
            $book_types =  $dbHandle->real_escape_string($_POST['book_types']);
            $date_upload =  $dbHandle->real_escape_string($_POST['date_upload2']);
            $datebd = date("Y-m-d",strtotime($date_upload));

              //upload image
              $ext = explode('.',$_FILES['image_book']['name']);
              $newName = round(microtime(true)).'.'.end($ext);
              $checkfiles = getimagesize($_FILES['image_book']['tmp_name']);

            if($checkfiles){
              if(move_uploaded_file($_FILES['image_book']['tmp_name'],'./assets/img/book-cover/'.$newName)){
                $sql_bookvideo = $dbHandle->query("INSERT INTO book_t (book_name,book_description,book_date,book_cover,book_p1,book_imagep1,book_p2,book_imagep2,book_p3,book_imagep3,book_namevideo,book_videoyt,book_types) 
                VALUES ('','$book_description2','$datebd','$newName','','','','','','','$book_namevideo','$book_videoyt','$book_types')");
                 if($sql_bookvideo){
                  echo "<script>isuccess('Success', 'เพิ่มบทความวิดีโอสำเร็จ');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                } else {
                  echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มบทความวิดีโอ');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                  }
                }
                } else {
                  echo "<script>iwarning('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
                  echo "<meta http-equiv='refresh' content='2;URL=home.php?views=book'>";
                }
        }
        ?>
        <!--  -->
        <div class="box-bookhome-video hideform">
          <div class="content-boxhome-video">
            <img
              src="./assets/img/icon-videocam.png"
              alt=""
              class="book-iconbook"
            />
            <span class="text-boxhome">เพิ่มบทความวิดีโอ</span>
            <button type="button" class="btn btn-danger remove-field-video">
              <i class="fas fa-trash-alt"></i> ลบ
            </button>
          </div>
          <hr style="margin-top:-2.4em" />
          <form action="" method="post"  enctype="multipart/form-data">
          <div class="multi-box">
            <p class="nameform">ชื่อบทความ</p>
            <input
              type="text"
              class="form-control"
              name="book_namevideo"
              id="book_namevideo"
              autocomplete="off"
              placeholder="กรุณากรอกชื่อบทความ"
              required
              maxlength="38"
            />
            <br />
            <p class="nameform">คำอธิบายเกี่ยวกับบทความสั้นๆ</p>
              <input
                type="text"
                class="form-control"
                name="book_description2"
                id="book_description2"
                placeholder="กรุณากรอกคำอธิบายเกี่ยวกับบทความสั้นๆ"
                autocomplete="off"
                maxlength="40"
              />
              <br />
            <p class="nameform">ลิ้งค์ยูทูป</p>
            <input
              type="text"
              class="form-control"
              name="book_videoyt"
              autocomplete="off"
              id="book_videoyt"
              placeholder="กรุณากรอกลิ้งค์ยูทูป"
              required
            />
            <br />
              <p class="nameform">เลือกวันที่ลงบทความ</p>
                <input
                  type="text"
                  class="form-control"
                  name="date_upload2"
                  autocomplete="off"
                  id="date_upload2"
                  value=""
                  required
                  placeholder="เลือกวันที่ลงบทความ"
                />
                <br />
                <img  id="imguploadshow2"  alt="">
            <input
                type="file"
                class="form-control file-upbook"
                name="image_book"
                id="image_book"
                style="display:none;"
                required
                onchange="readUrlimg(this)"
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
              <hr />
              <button
              class="btn btn-success"
              name="btn_addvideo"
              id="btn_addvideo"
              type="submit">
              <i class="fas fa-check"></i> เพิ่มบทความวิดีโอ
            </button>
            <input type="hidden" class="hidden" name="book_types" value="2">
          </div>
        </form>
        </div>
      </div>
      <?php
      $perpage = 6;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        } else {
        $page = 1;
        }
      $start = ($page - 1) * $perpage;
      $sql = "SELECT * FROM book_t ORDER BY id DESC LIMIT {$start} , {$perpage} ";
      $sql_booklist = mysqli_query($dbHandle, $sql);
      ?>
      <div class="col-md-12 history ">
        <div class="box-showhistory">
            <p class="textname-edit">
              <i class="fas fa-book"></i> บทความและบทความวิดีโอทั้งหมด
            </p>
            <hr style="margin-top:-1.3em;" />
            <?php
              while($listbook = $sql_booklist->fetch_assoc()) {
            ?>
            <div class="showlist_book">
            <div class="row">
              <div class="col-md-3">
              <center>
              <img src="./assets/img/book-cover/<?=$listbook['book_cover'];?>" class="img-book" alt="">
             </center>
              </div>
              <div class="col-md-3">
                <p class="namebook-list">
                  <?php
                    if($listbook['book_types'] == '1'){
                      echo $listbook['book_name'];
                    } else {
                      echo $listbook['book_namevideo'];
                    }
                  ?>
                </p>
                <p class="datebook-list">
                  <?php
                  $datetime =  $listbook['book_date'];
								  echo thai_date_and_time(strtotime($datetime));
                  ?>
                </p>
              </div>
              <div class="col-md-2">
               <?php
                if($listbook['book_types'] == '1'){
                  echo '<p class="book_typesname"><span class="badge badge-success"><i class="fas fa-book"></i> บทความ</span></p>';
                } else{
                  echo '<p class="book_typesname"><span class="badge badge-danger"><i class="fab fa-youtube"></i> บทความวิดีโอ</span></p>';
                }
               ?>
              </div>
              <div class="col-md-4 group_btn">
               <a href="<?php if($listbook['book_types'] == '1'){
                 echo 'book_edit.php';
               } else {
                echo 'book_editvideo.php';
               };?>?id=<?=$listbook['id'];?>">
                    <button class="btn btn-brown2 add_book" name="add_book" type="submit" id="<?=$listbook['id'];?>">
                    <i class="fas fa-pencil-alt"></i> เพิ่มเนื้อหา
                    </button>
                  </a>
                  <button class="btn btn-danger delete_book" name="delete_book"  type="submit" id="<?=$listbook['id'];?>">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </button>
              </div>
            </div>
            </div>
            <hr/>
            <?php } ?>
            <?php
              $sql2 = "SELECT * FROM book_t ";
              $query2 = mysqli_query($dbHandle, $sql2);
              $total_record = mysqli_num_rows($query2);
              $total_page = ceil($total_record / $perpage);
              ?>
                <nav aria-label="...">
                  <ul class="pagination pagination-md">
                    <?php for($i=1; $i<=$total_page; $i++) { ?>
                    <li class="page-item <?php if($page==$i) echo 'active';?>">
                      <a class="page-link" href="home.php?views=book&page=<?=$i?>"><?php echo $i;?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
if (screen.width == 1024 || screen.width == 768){
  $(".frmbook").removeClass("col-md-4");
  $(".frmbook").addClass("col-md-12");
  $(".history").addClass("zzz");
  $(".zzz").removeClass("history");
  $(".zzz").removeClass("col-md-8");
  $(".history").addClass("col-md-12");
  }
</script>