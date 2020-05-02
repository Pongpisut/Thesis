<?php
    require '../connectdb.php';
    $gallery_id = $_POST['id'];
    $sql_gallery = $dbHandle->query("SELECT gallery_name FROM gallery_t WHERE id='$gallery_id'");
    $row_gallery = mysqli_fetch_row($sql_gallery);
    $filename = $row_gallery[0];

    unlink('../assets/img/photos/'.$filename);


    $sql_del = $dbHandle->query("DELETE FROM gallery_t WHERE id='$gallery_id'");

    if($sql_del){
        echo "<script>isuccess('Success', 'ลบแคตตาล็อกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการลบแคตตาล็อกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    }


?>