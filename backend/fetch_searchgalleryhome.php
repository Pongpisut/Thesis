<?php
    require '../connectdb.php';
    error_reporting(0);
    $sql = $dbHandle->query("SELECT * FROM catalog_t WHERE catalog_gallery LIKE '%".$_POST['search']."%'");
    $output = "";

    if(mysqli_num_rows($sql) > 0)  {
?>
    <?php while($row = $sql->fetch_array()){ ?>
        <ul class="list-group">
            <?php
                echo "<a href='gallery_show.php?id=".$row["id"]."'><li class='list-group-item'><span class='badge badge-danger'><i class='fas fa-images'></i> แคตตาล็อก </span><br> ".$row["catalog_gallery"]."</li></a>";
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