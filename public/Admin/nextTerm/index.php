<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$nextTerms = NextTerm::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: Next Term Begins';
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
          <h3>Next Term Begins Dates</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/nextTerm/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-8 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Session</th>
              <th>Term</th>
              <th>Next Term Resumes</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($nextTerms as $nextTerm) {
           // var_dump($nextTerm->acadYr);
            
            $i++;
            ?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php 
                $acadYr = AcadYr::find_by_id($nextTerm->acadYr);
                echo $acadYr->acadYrName; ?></td>
              <td><?php 
                $term = Term::find_by_id($nextTerm->vTerm);
              echo $term->termName; ?></td>
              <td><?php echo $nextTerm->explanation; ?></td>
              <td><a href="<?php echo urlFor('/admin/nextTerm/show.php?id='.h($nextTerm->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/nextTerm/edit.php?id='.h($nextTerm->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/nextTerm/delete.php?id='.h($nextTerm->id));?>">Delete</a></td>
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

