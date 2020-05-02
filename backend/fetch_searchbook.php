<?php
    require '../connectdb.php';
    error_reporting(0);
    $sql = $dbHandle->query("SELECT * FROM book_t WHERE book_name LIKE '%".$_POST['search']."%' OR book_namevideo LIKE '%".$_POST['search']."%'");
    $output = "";

    if(mysqli_num_rows($sql) > 0)  {
?>
    <?php while($row = $sql->fetch_array()){ ?>
        <ul class="list-group">
            <?php
                if($row['book_types'] == '1'){
                    echo "<a href='book_edit.php?id=".$row["id"]."'><li class='list-group-item'><span class='badge badge-success'><i class='fas fa-book'></i> บทความ</span><br> เรื่อง : ".$row["book_name"]."</li></a>";
                } else {
                    echo "<a href='book_editvideo.php?id=".$row["id"]."'><li class='list-group-item'><span class='badge badge-danger'><i class='fab fa-youtube'></i> วิดีโอ</span><br> เรื่อง : ".$row["book_namevideo"]."</li></a>";
                }
            ?>
        </ul>
    <?php } ?>
<?php 
 } else {
    echo "<center>
    <ul class='list-group'>
    <li class='list-group-item'>ไม่พบข้อมูลที่ท่านค้นหา</li>
    </ul>
    </center>";
}
?>