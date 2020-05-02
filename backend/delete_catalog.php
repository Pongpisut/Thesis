<?php
    require '../connectdb.php';
    $catalog_id = $_POST['id'];
    $sql = $dbHandle->query("SELECT gallery_cover FROM catalog_t WHERE id='$catalog_id'");
    $row_catalog = mysqli_fetch_row($sql);
    $filename = $row_catalog[0];

    unlink('../assets/img/cover/'.$filename);

    $sql_image = $dbHandle->query("SELECT gallery_name FROM gallery_t WHERE catalog_gallery='$catalog_id'");
    $row_memberimage = mysqli_fetch_row($sql_image);
    $filenameimage = $row_memberimage[0];

    unlink('../assets/img/photos/'.$filenameimage);


    $sql_del = $dbHandle->query("DELETE FROM gallery_t WHERE catalog_gallery='$catalog_id'");
    $sql_catdel = $dbHandle->query("DELETE FROM catalog_t WHERE id='$catalog_id'");

    if($sql_del){
        echo "<script>isuccess('Success', 'ลบแคตตาล็อกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการลบแคตตาล็อกสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    }
?>