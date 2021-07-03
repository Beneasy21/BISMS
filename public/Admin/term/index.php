<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$terms = Term::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: List Of Terms';
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
          <h3>List Terms</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/term/new.php'); ?>">&laquo; Add Term</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-6 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Term Name</th>
              <th>Abbreviation</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($terms as $term) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $term->termName; ?></td>
              <td><?php echo $term->termDesc; ?></td>
              <td><a href="<?php echo urlFor('/admin/term/show.php?id='.h($term->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/term/edit.php?id='.h($term->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/term/delete.php?id='.h($term->id));?>">Delete</a></td>
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

