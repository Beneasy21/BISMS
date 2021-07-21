<?php
  require_once('../../../private/initialize.php');
  //require_login();
  //$_SESSION['admin_id'] = '';

$students = Student::find_all();
  
if(is_post_request()) {
  
  }
?>

 <?php $page_title = 'Command:: List Of Students';
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
          <h3>List of Students</h3>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col text-center">
            <a class="back-link" href="<?php echo urlFor('/admin/index.php'); ?>">&laquo; Back to Admin Home</a> || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/index.php'); ?>">&laquo; Back to List</a>  || 
            <a class="back-link" href="<?php echo urlFor('/admin/student/new.php'); ?>">&laquo; Add New</a>
        </div>        
      </div>
      <div class="row mx-auto">
        <div class="col-md-12 text-center">
          <table class="table">
            <tr>
              <th>SN</th>
              <th>Reg No</th>
              <th>Student Name</th>
              <th>Sex</th>
              <th>Current Class</th>
              <th>Arm</th>
              <th>House</th>
              <th>Session</th>
              <th>Status</th>
              <th>Date of Birth</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          <?php $i=0; foreach ($students as $student) {$i++?>
            <tr>

              <td><?php echo $i; ?></td>
              <td><?php echo $student->studId; ?></td>
              <td><?php echo $student->studName; ?></td>              
              <td><?php echo $student->sex; ?></td>
              <td><?php
                $clax = Clax::find_by_id($student->currentClass);
                echo $clax->classsName ; ?></td>
              <td><?php 
                $arm = Arm::find_by_id($student->arm);
                echo $arm->armName; ?></td>
              <td><?php echo $student->house; ?></td>
              <td><?php 
                $acadYr = AcadYr::find_by_id($student->acadYr);
                echo $acadYr->acadYrName; ?></td>
              <td><?php echo $student->studStatus; ?></td>
              <td><?php echo $student->studDOB; ?></td>
              <td><a href="<?php echo urlFor('/admin/student/show.php?id='.h($student->id));?>">View</a></td>
              <td><a href="<?php echo urlFor('/admin/student/edit.php?id='.h($student->id));?>">Edit</a></td>
              <td><a href="<?php echo urlFor('/admin/student/delete.php?id='.h($student->id));?>">Delete</a></td>
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

