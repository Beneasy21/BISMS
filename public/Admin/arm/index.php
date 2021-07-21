<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$arms = Arm::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: List Of Arms';
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
          <h3>List Arms</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/arm/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Arm Name</th>
              <th>Abbreviation</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($arms as $arm) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $arm->armName; ?></td>
              <td><?php echo $arm->armDesc; ?></td>
              <td><a href="<?php echo urlFor('/admin/arm/show.php?id='.h($arm->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/arm/edit.php?id='.h($arm->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/arm/delete.php?id='.h($arm->id));?>">Delete</a></td>
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

