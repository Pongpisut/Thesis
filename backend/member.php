<?php
    error_reporting(0);
		if (isset($_POST['submit'])) {
    $firstname = $dbHandle->real_escape_string($_POST['firstname']);
    $lastname = $dbHandle->real_escape_string($_POST['lastname']);
    $nickname = $dbHandle->real_escape_string($_POST['nickname']);
    $roles = $dbHandle->real_escape_string($_POST['roles']);

    //upload image
    $ext = explode('.',$_FILES['image_member']['name']);
    $newName = round(microtime(true)).'.'.end($ext);
    $checkfiles = getimagesize($_FILES['image_member']['tmp_name']);

    if($checkfiles){
      if(move_uploaded_file($_FILES['image_member']['tmp_name'],'./assets/img/uploads/'.$newName)){
        $sql_uploadmember = $dbHandle->query("INSERT INTO member_t (firstname,lastname,nickname,roles,image_member) VALUES ('$firstname','$lastname','$nickname','$roles','$newName')");
        if($sql_uploadmember){
          echo "<script>isuccess('Success', 'เพิ่มสมาชิกสำเร็จ');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=member'>";
        } else {
          echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการเพิ่มสมาชิก');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=member'>";
          }
        }
        } else {
          echo "<script>ierror('Error Upload Image', 'ไฟล์ของท่านไม่ใช่ไฟล์รูปภาพหรือไฟล์ของท่านมีขนาดใหญ่เกินไป');</script>";
          echo "<meta http-equiv='refresh' content='2;URL=home.php?views=member'>";
        }
      }
?>
<section id="memberfungkrajohn">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <form
          action=""
          method="post"
          enctype="multipart/form-data"
          id="adduser"
        >
          <div class="headertext-member">
            <span class="text-member">
              <i class="fas fa-user-plus"></i> เพิ่มสมาชิก</span
            >
          </div>
          <hr style="margin-top:-.5em" />
          <div class="boxinsert-member">
            <p class="nameform">ชื่อสมาชิก</p>
            <input
              type="text"
              name="firstname"
              id="firstname"
              class="form-control"
              placeholder="กรุณากรอกชื่อสมาชิก"
              autocomplete="off"
              required
            />
            <br />
            <p class="nameform">นามสกุลสมาชิก</p>
            <input
              type="text"
              name="lastname"
              id="lastname"
              class="form-control"
              placeholder="กรุณากรอกนามสกุลสมาชิก"
              autocomplete="off"
              required
            />
            <br />
            <p class="nameform">ชื่อเล่นสมาชิก</p>
            <input
              type="text"
              name="nickname"
              id="nickname"
              class="form-control"
              placeholder="กรุณากรอกชื่อเล่นสมาชิก"
              autocomplete="off"
              required
            />
            <br />
            <p class="nameform">หน้าที่ของสมาชิก</p>
            <input
              type="text"
              name="roles"
              id="roles"
              class="form-control"
              placeholder="กรุณากรอกหน้าที่ของสมาชิก"
              autocomplete="off"
              required
            />
            <br />
            <img id="imguploadshow" alt="" />
            <input
              type="file"
              class="form-control file-up"
              name="image_member"
              id="image_member"
              style="display:none;"
              required
              onchange="readUrl(this)"
            />
            <div class="btn btn-light btn-upload uploadmember">
              <i class="fas fa-upload"></i> อัพโหลดรูปภาพสมาชิก
            </div>
            <div
              class="btn btn-danger mg-top btn-remove-file"
              style="display:none;"
            >
              X
            </div>
            <br />
            <hr>
            <button
              class="btn btn-success"
              name="submit"
              id="submit"
              type="submit"
              value="เพิ่มสมาชิก"
            >
              <i class="fas fa-user-plus"></i> เพิ่มสมาชิก
            </button>
          </div>
        </form>
      </div>
      <?php
       $perpage = 6;
       if (isset($_GET['page'])) {
         $page = $_GET['page'];
         } else {
         $page = 1;
         }
       $start = ($page - 1) * $perpage;
       $sql = "SELECT * FROM member_t LIMIT {$start} , {$perpage} ";
       $sql_member = mysqli_query($dbHandle, $sql);
      ?>
      <div class="col-md-8 ">
        <div class="show-member">
          <div class="boxshow-member">
            <span class="text-showmember">
              <i class="fas fa-user-friends"></i> รายชื่อสมาชิกทั้งหมด</span
            >
          </div>
          <hr style="margin-top:-.5em" />
          <?php while ($member = $sql_member->fetch_assoc()) {?>
          <div class="showmember-list">
            <div class="row">
              <div class="col-md-3">
                <center>
                  <img
                    src="./assets/img/uploads/<?php echo $member['image_member'];?>"
                    class="img-member"
                    alt=""
                  />
                </center>
              </div>
              <div class="col-md-4">
                <p class="nameuser-list">
                  คุณ
                  <?php echo $member['firstname'];?>
                  <?php echo $member['lastname'];?>
                </p>
                <p class="roles-member"><?php echo $member['roles'];?></p>
              </div>
              <div class="col-md-5 btn-editdelmember">
                <a href="member_edit.php?id=<?php echo $member['id'];?>">
                <button
                  class="btn btn-brown2 edit_member"
                  name="edit"
                  id="<?php echo $member['id'];?>"
                >
                  <i class="fas fa-edit"></i> แก้ไข
                </button>
                </a>
                <button class="btn btn-danger delete_member" name="delete"  id="<?php echo $member['id'];?>">
                  <i class="fas fa-trash-alt"></i> ลบ
                </button>
              </div>
            </div>
            <hr />
            <?php } ?>
            <?php
            $sql2 = "SELECT * FROM member_t ";
            $query2 = mysqli_query($dbHandle, $sql2);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record / $perpage);
            ?>
            <nav aria-label="...">
                  <ul class="pagination pagination-md">
                    <?php for($i=1; $i<=$total_page; $i++) { ?>
                    <li class="page-item <?php if($page==$i) echo 'active';?>">
                      <a class="page-link" href="home.php?views=member&page=<?=$i?>"><?php echo $i;?></a>
                    </li>
                    <?php } ?>
                  </ul>
                </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>