<?php
    require '../connectdb.php';
    $member_id = $_POST['id'];
    $sql = $dbHandle->query("SELECT image_member FROM member_t WHERE id='$member_id'");
    $row_member = mysqli_fetch_row($sql);
    $filename = $row_member[0];

    unlink('../assets/img/uploads/'.$filename);

    $sql_del = $dbHandle->query("DELETE FROM member_t WHERE id='$member_id'");

    if($sql_del){
        echo "<script>isuccess('Success', 'ลบสมาชิกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=member'>";
    } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการลบสมาชิก');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=member'>";
    }


?>