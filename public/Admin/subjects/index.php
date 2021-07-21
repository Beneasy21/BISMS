<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$subjectss = Subjects::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: Subjects';
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
          <h3>List Subjects</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/subjects/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/subjects/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-9 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Subject Name</th>
              <th>Abbreviation</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($subjectss as $subjects) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $subjects->subName; ?></td>
              <td><?php echo $subjects->subDesc; ?></td>
              <td><a href="<?php echo urlFor('/admin/subjects/show.php?id='.h($subjects->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/subjects/edit.php?id='.h($subjects->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/subjects/delete.php?id='.h($subjects->id));?>">Delete</a></td>
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

