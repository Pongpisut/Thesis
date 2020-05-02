<?php
    require '../connectdb.php';
    error_reporting(0);
    $sql = $dbHandle->query("SELECT * FROM comment_t WHERE comment_name LIKE '%".$_POST['search']."%' OR comment_description LIKE '%".$_POST['search']."%'");
    $output = "";

    if(mysqli_num_rows($sql) > 0)  {
?>
    <?php while($row = $sql->fetch_array()){ ?>
        <ul class="list-group">
            <?php
                    echo "<li class='list-group-item'><span class='badge badge-success'><i class='fas fa-book'></i> คอมเม้นท์</span><br> ".$row["comment_description"]."<br><button class='btn btn-danger btn-sm delete_comment' id='".$row['id']."' name='delete_comment'><i class='fas fa-trash-alt'></i> ลบ</button></li>";
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
<script src="./assets/js/crud.js"></script>