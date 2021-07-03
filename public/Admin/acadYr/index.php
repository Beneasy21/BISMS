<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$acadYrs = AcadYr::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: List Of Academic Years';
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
          <h3>List Sessions</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/acadYr/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Session Name</th>
              <th>Abbreviation</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($acadYrs as $acadYr) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $acadYr->acadYrName; ?></td>
              <td><?php echo $acadYr->acadYrDesc; ?></td>
              <td><a href="<?php echo urlFor('/admin/acadYr/show.php?id='.h($acadYr->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/acadYr/edit.php?id='.h($acadYr->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/acadYr/delete.php?id='.h($acadYr->id));?>">Delete</a></td>
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

