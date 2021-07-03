<?php
  require_once('../../private/initialize.php');
  //require_login();

  $page_title = 'Command:: Result Home';
  include(SHARED_PATH . '/adminHeader.php');
  //include(SHARED_PATH . '/resultHeader.php');
?> 
<main class="container mx-auto">
  <div class="row">
    <div class="col-md-3 bg-light rounded">
      <?php include(SHARED_PATH . '/adminSidebar.php');?>
    </div>
    <div class="col-md-9 pt-4 rounded">
      <div class="row mx-auto">
        <div class="col text-center">
          <h1>Admin: <?php echo $fullName ?? '';?></h1>
        </div>        
      </div>
      <div class="row">
        <div class="col">
          <a class="mr-2 back-link" href="<?php echo urlFor('/admin/showAll.php'); ?>">&laquo; Back to List</a> || 
          <a  href="<?php echo urlFor('/admin/new.php'); ?>"> Add Admin</a>
          <hr>
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col text-left">
          Email : <?php echo $admin->email ?? '' ;?><br />
          Phone : <?php echo $admin->username ?? '';?><br />
        </div>        
      </div>

    </div>      
  </div>
  </main>        
  <?php include(SHARED_PATH .'/adminFooter.php');?>      
       
