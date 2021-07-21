<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$rexults = Rexult::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: Result';
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
          <h3>List Results</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/rexult/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <table border="1" class="table">
            <tr>
              <th>SN</th>
              <th>Reg No</th>
              <th>Session</th>
              <th>Term</th>
              <th>Class</th>
              <th>Arm</th>
              <th>Subject</th>
              <th>CA 1</th>
              <th>CA 2</th>
              <th>Exam</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($rexults as $rexult) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $rexult->studId; ?></td>
              <td><?php
                $acadYr = AcadYr::find_by_id($rexult->acadYr);
                echo $acadYr->acadYrName; ?></td>
              <td><?php 
                $term = Term::find_by_id($rexult->term);
                echo $term->termName; ?></td>
              <td><?php 
                $clax = Clax::find_by_id($rexult->resClass);
                echo $clax->classsName; ?></td>
              <td><?php 
                $arm = Arm::find_by_id($rexult->arm);
                echo $arm->armName; ?></td>
              <td class="text-left"><?php 
                $subjects = Subjects::find_by_id($rexult->subjects);
                echo $subjects->subName; ?></td>
              <td><?php echo $rexult->ca1; ?></td>
              <td><?php echo $rexult->ca2; ?></td>
              <td><?php echo $rexult->exam; ?></td>
              <td><a href="<?php echo urlFor('/admin/rexult/show.php?id='.h($rexult->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/rexult/edit.php?id='.h($rexult->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/rexult/delete.php?id='.h($rexult->id));?>">Delete</a></td>
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