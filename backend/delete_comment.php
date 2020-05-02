<?php
    require '../connectdb.php';
    $comment_id = $_POST['id'];

    $sql_del = $dbHandle->query("DELETE FROM comment_t WHERE id='$comment_id'");

    if($sql_del){
        echo "<script>isuccess('Success', 'ลบคอมเม้นท์สำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=comment'>";
    } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการลบคอมเม้นท์สำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=comment'>";
    }


?>