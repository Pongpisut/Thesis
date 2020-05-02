<?php
    require '../connectdb.php';
    $book_id = $_POST['id'];
    $sql = $dbHandle->query("SELECT book_cover FROM book_t WHERE id='$book_id'");
    $row_book = mysqli_fetch_row($sql);
    $filename = $row_book[0];

    unlink('../assets/img/book-cover/'.$filename);

    $sql_image1 = $dbHandle->query("SELECT book_imagep1 FROM book_t WHERE id='$book_id'");
    $row_image1 = mysqli_fetch_row($sql_image1);
    $filenameimage1 = $row_image1[0];

    unlink('../assets/img/book/'.$filenameimage1);

    $sql_image2 = $dbHandle->query("SELECT book_imagep2 FROM book_t WHERE id='$book_id'");
    $row_image2 = mysqli_fetch_row($sql_image2);
    $filenameimage2 = $row_image2[0];

    unlink('../assets/img/book/'.$filenameimage2);

    $sql_image3 = $dbHandle->query("SELECT book_imagep3 FROM book_t WHERE id='$book_id'");
    $row_image3 = mysqli_fetch_row($sql_image3);
    $filenameimage3 = $row_image3[0];

    unlink('../assets/img/book/'.$filenameimage3);

    $sql_del = $dbHandle->query("DELETE FROM book_t WHERE id='$book_id'");


    $sql_catdel = $dbHandle->query("DELETE FROM book_t WHERE id='$book_id'");
    $sql_catdel = $dbHandle->query("DELETE FROM comment_t WHERE comment_postid='$book_id'");

    if($sql_del){
        echo "<script>isuccess('Success', 'ลบบทความสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    } else {
        echo "<script>iwarning('Warning', 'เกิดข้อผิดพลาดในการลบบทความ');</script>";
        echo "<meta http-equiv='refresh' content='5;URL=home.php?views=gallery'>";
    }
?>