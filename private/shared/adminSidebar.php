<div class="row ">
        <div class="col bg-light rounded m-1">
          <marquee><h4>W e l c o m e </h4></marquee>   
          <?php 
            if(isset($_SESSION['admin_id'])){
              $admin = Admin::find_by_id($_SESSION['admin_id'] ?? '');
              $fullName =  $admin->first_name . ' '. $admin->last_name;
              echo $fullName ?? '';  
            }
           ?>    
          <hr>
          <p class="text-left p-0 m-0">
            <a href="<?php echo urlFor('/admin/staff/');?>">Staff</a><br />
            <a href="<?php echo urlFor('/admin/Student/');?>">Students</a><br />
            <a href="<?php echo urlFor('/admin/staff/');?>">Classs</a><br />
            <a href="<?php echo urlFor('/admin/Student/');?>">Arm</a><br />
            <a href="<?php echo urlFor('/admin/term/index.php');?>">Term</a><br />
            <a href="<?php echo urlFor('/admin/acadYr/index.php');?>">Session</a><br />
            <a href="<?php echo urlFor('/admin/staff/');?>">House</a><br />
            <a href="<?php echo urlFor('/admin/Student/');?>">Result</a><br />
            <a href="<?php echo urlFor('/admin/nextTerm/index.php');?>">Next Term</a><br />
          </p>
        </div>
      </div>