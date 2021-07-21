<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$houses = House::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: List Of Houses';
  include(SHARED_PATH . '/adminHeader.php');
?>

<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php'); ?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h3>List Houses</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/house/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>House Name</th>
              <th>Abbreviation</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($houses as $house) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $house->houseName; ?></td>
              <td><?php echo $house->houseDesc; ?></td>
              <td><a href="<?php echo urlFor('/admin/house/show.php?id='.h($house->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/house/edit.php?id='.h($house->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/house/delete.php?id='.h($house->id));?>">Delete</a></td>
            </tr>
          <?php }?>
        </table>
            </div>
          </form>            
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>

