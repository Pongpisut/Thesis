<div
  class="modal fade login-form"
  tabindex="-1"
  role="dialog"
  aria-labelledby="myExtraLargeModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
            <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
          </h5>
        </div>
        <div id="login-form">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <center>
                  <img src="assets/img/loading.png" class="login-logo" alt="" />
                  <h5 class="modal-title login-textheader">
                    ระบบบริหารจัดการสวนฟุ้งขจร
                  </h5>
                </center>
              </div>
              <div class="col-md-6">
              <?php
              require 'connectdb.php';
							if (isset($_POST['submit'])) {
                  $username = $dbHandle->real_escape_string($_POST['username']);
                  $password = $dbHandle->real_escape_string($_POST['password']);
                  $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789=][;';
                  $hash_login = hash_hmac('sha256', $password, $salt);
                  $sql = $dbHandle->prepare("SELECT * FROM adminuser_t WHERE username=? AND password=?");
                  $sql->bind_param("ss",$username,$hash_login);
                  $sql->execute();
                  $result_user = $sql->get_result();
                  if ($result_user->num_rows == 1) {
                    session_start();
                    $me_user = $result_user->fetch_array(MYSQLI_ASSOC);
                    $_SESSION['id'] = $me_user['id'];
												echo "<script>isuccess('Login Success', 'เข้าสู่ระบบสำเร็จ เรากำลังพาท่านไป');</script>";
												echo "<meta http-equiv='refresh' content='0;URL=home.php?views=welcome'>";
									} else {
												echo "<script>ierror('Login Error', 'การเข้าสู่ระบบผิดพลาด กรุณาลองใหม่อีกครั้ง');</script>";
									}
								}
								$dbHandle->close();
						?>
                <form action="" method="post" name="login-user" class="login-userform">
                  <p class="text-nameloging">
                    <i class="fas fa-user"></i> ชื่อผู้ใช้งาน
                  </p>
                  <input type="text" name="username" id="username"
                  class="form-control" placeholder="กรุณากรอกชื่อผู้ใช้งาน"
                  autocomplete="off" required / >
                  <p class="text-namelogin">
                    <i class="fas fa-unlock"></i> รหัสผ่าน
                  </p>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="กรุณากรอกรหัสผ่าน"
                    autocomplete="off"
                    required
                  />
                <span class="namedev">© พงศ์พิสุทธิ์ สวยรูป, คู่ชนารถ บุญสุวรรณ (ผู้พัฒนา)</span>
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fas fa-times"></i> ปิดหน้านี้
        </button>
        <button type="submit" name="submit"  id="submit" class="btn btn-success" >
          <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
