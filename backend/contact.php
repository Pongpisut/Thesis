        <?php
              require 'connectdb.php';
                if (isset($_POST['address'])) {
                  $name_suan = $dbHandle->real_escape_string($_POST['name_suan']);
                  $place = $dbHandle->real_escape_string($_POST['place']);
                  $qry = "UPDATE contact_t set names='$name_suan',place='$place' WHERE id=1";
                    if ($dbHandle->query($qry)) {
                      echo "<script>isuccess('Success', 'แก้ไขที่อยู่สำเร็จ');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    } else {
                      echo "<script>ierror('Error', 'เกิดข้อผิดพลาดในการแก้ไขที่อยู่');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    }
                }
                if (isset($_POST['facebooks'])) {
                  $facebook = $dbHandle->real_escape_string($_POST['facebook']);
                  $link_facebook = $dbHandle->real_escape_string($_POST['link_facebook']);
                  $qryfacebook = "UPDATE contact_t set facebook='$facebook',link_facebook='$link_facebook' WHERE id=1";
                    if ($dbHandle->query($qryfacebook)) {
                      echo "<script>isuccess('Success', 'แก้ไขที่อยู่สำเร็จ');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    } else {
                      echo "<script>ierror('Error', 'เกิดข้อผิดพลาดในการแก้ไขที่อยู่');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    }
                }

                if (isset($_POST['telephone'])) {
                  $tel = $dbHandle->real_escape_string($_POST['tel']);
                  $qrytelephone = "UPDATE contact_t set tel='$tel' WHERE id=1";
                    if ($dbHandle->query($qrytelephone)) {
                      echo "<script>isuccess('Success', 'แก้ไขเบอร์โทรศัพท์สำเร็จ');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    } else {
                      echo "<script>ierror('Error', 'เกิดข้อผิดพลาดในการแก้ไขเบอร์โทรศัพท์');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    }
                }

                if (isset($_POST['line'])) {
                  $line_id = $dbHandle->real_escape_string($_POST['line_id']);
                  $qryline = "UPDATE contact_t set line_id='$line_id' WHERE id=1";
                    if ($dbHandle->query($qryline)) {
                      echo "<script>isuccess('Success', 'แก้ไขไอดีไลน์สำเร็จ');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    } else {
                      echo "<script>ierror('Error', 'เกิดข้อผิดพลาดในการแก้ไขเบอไอดีไลน์สำเร็จ');</script>";
                      echo "<meta http-equiv='refresh' content='5;URL=home.php?views=contact'>";
                    }
                }

                $sql_contact = $dbHandle->query("SELECT * FROM contact_t");
        ?>
<div id="contact-user">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      <?php while ($contact_t = $sql_contact->fetch_assoc()) {?>
        <form action="" method="post" id="contact1" name="contact1">
          <div class="box-contact">
            <span class="headertext-contact"
              ><i class="fas fa-map-marker-alt"></i> แก้ไขที่อยู่</span
            >
          </div>
          <hr style="margin-top:-.5em;" />
          <div class="inputcontact1">
            <p class="nameform">ชื่อสวน</p>
            <input
              type="text"
              class="form-control"
              name="name_suan"
              id="name_suan"
              required
              placeholder="กรุณาใส่ชื่อสวนของท่าน"
              autocomplete="off"
              value="<?php echo $contact_t['names'];?>"
            />
            <br />
            <p class="nameform">ที่อยู่สวน</p>
            <input
              type="text"
              class="form-control"
              name="place"
              id="place"
              required
              autocomplete="off"
              placeholder="กรุณาใส่ที่อยู่สวนของท่าน"
              value="<?php echo $contact_t['place'];?>"
            />
            <br />
            <center>
              <button class="btn btn-brown2 address" type="submit" name="address">
                <i class="fas fa-edit"></i> บันทึกการแก้ไข
              </button>
            </center>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form action="" method="post" id="contact2">
          <div class="box-contact">
            <span class="headertext-contact"
              ><i class="fab fa-facebook-f"></i> แก้ไขเพจเฟสบุ๊ค</span
            >
          </div>
          <hr style="margin-top:-.5em;" />
          <div class="inputcontact1">
            <p class="nameform">ชื่อเพจเฟสบุ๊ค</p>
            <input
              type="text"
              class="form-control"
              name="facebook"
              id="facebook"
              required
              autocomplete="off"
              placeholder="กรุณาใส่ชื่อเพจเฟสบุ๊คของท่าน"
              value="<?php echo $contact_t['facebook'];?>"
            />
            <br />
            <p class="nameform">ลิ้งค์เพจเฟสบุ๊ค</p>
            <input
              type="text"
              class="form-control"
              name="link_facebook"
              id="link_facebook"
              required
              autocomplete="off"
              placeholder="กรุณาใส่ลิ้งค์เพจเฟสบุ๊คของท่าน"
              value="<?php echo $contact_t['link_facebook'];?>"
            />
            <br />
            <center>
              <button class="btn btn-brown2" type="submit" name="facebooks">
                <i class="fas fa-edit"></i> บันทึกการแก้ไข
              </button>
            </center>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form action="" method="post" id="contact3">
          <div class="box-contact">
            <span class="headertext-contact"
              ><i class="fas fa-phone"></i> แก้ไขเบอร์โทรศัพท์มือถือ</span
            >
          </div>
          <hr style="margin-top:-.5em;" />
          <div class="inputcontact1">
            <p class="nameform">เบอร์โทรศัพท์มือถือ</p>
            <input
              type="text"
              class="form-control"
              name="tel"
              id="tel"
              autocomplete="off"
              required
              placeholder="กรุณาใส่เบอร์โทรศัพท์มือถือของท่าน"
              value="<?php echo $contact_t['tel'];?>"
            />
            <br />
            <center>
              <button class="btn btn-brown2" type="submit" name="telephone">
                <i class="fas fa-edit"></i> บันทึกการแก้ไข
              </button>
            </center>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form action="" method="post" id="contact3">
          <div class="box-contact">
            <span class="headertext-contact"
              ><i class="fab fa-line"></i> แก้ไขไอดีไลน์</span
            >
          </div>
          <hr style="margin-top:-.5em;" />
          <div class="inputcontact1">
            <p class="nameform">ไอดีไลน์</p>
            <input
              type="text"
              class="form-control"
              name="line_id"
              id="line_id"
              autocomplete="off"
              required
              placeholder="กรุณาใส่ไอดีไลน์ของท่าน"
              value="<?php echo $contact_t['line_id'];?>"
            />
            <br />
            <center>
              <button class="btn btn-brown2" type="submit" name="line">
                <i class="fas fa-edit"></i> บันทึกการแก้ไข
              </button>
            </center>
          </div>
        </form>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
