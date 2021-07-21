<?php
  require_once('../../private/initialize.php');
  require_login();
  

$admins = Admin::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: Add Admin';
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
          <h3>View Admin</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/showAll.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/new.php'); ?>">&laquo; Add Admin</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Last Name</th>
              <th>First Name</th>
              <th>Username</th>
              <th>Email</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($admins as $admin) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $admin->last_name; ?></td>
              <td><?php echo $admin->first_name; ?></td>
              <td><?php echo $admin->username; ?></td>
              <td><?php echo $admin->email; ?></td>
              <td><a href="<?php echo urlFor('/admin/show.php?id='.h($admin->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/edit.php?id='.h($admin->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/delete.php?id='.h($admin->id));?>">Delete</a></td>
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

