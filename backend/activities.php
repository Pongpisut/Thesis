<?php 
  $activities = $dbHandle->query("SELECT * FROM package_t");
?>
<div id="activities-be">
  <div class="container">
    <div class="row">
    <?php
      while ($activities_sql = $activities->fetch_assoc()) {
    ?>
        <div class="col-md-6">
            <div class="box-activities-be">
              <img
                src="./assets/img/icon-cart2.png"
                class="icon-cart-activities"
                alt=""
              />
              <h4><p class="name-activities-be"><?php echo $activities_sql['name_package'];?></p></h4>
              <p class="des-activities"><?php echo $activities_sql['des_package'];?></p>
              <br>
              <a href="activities_edit.php?id=<?php echo $activities_sql['id'];?>">
                <button
                  class="btn btn-brown"
                  type="submit"
                  name="edit_activities"
                  id="<?php echo $activities_sql['id'];?>"
                >
                  <i class="fas fa-edit" ></i> แก้ไข
                </button>
              </a>
            </div>
          </div>
      <?php } ?>
    </div>
  </div>
</div>
