<?php
    require_once('../../private/initialize.php');
    
    $studId = $_SESSION['stud_id'];

    $student = Student::find_by_studId($studId);
    $clax = Clax::find_by_id($student->currentClass);
    $sex = Sex::find_by_id($student->sex);
    $house = House::find_by_id($student->house);
    $arm = Arm::find_by_id($student->arm);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/myStyles.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo urlFor('stylesheets/custom.css'); ?>" />

    <title>Document</title>
</head>
<body>
	<div class="container tea">
		<header class="text-center header rounded">
			<div class="p-2">
				<img class="img rounded" src="<?php echo urlFor('images/Header.png');?>" alt="header pix" >	
			</div>
		</header>
		<div class="row p-2">
			<div class="col-md-3 ash rounded">
				<div class="text-center p-3">
					<img class="img rounded-circle" src="<?php echo urlFor('images/Logo.png');?>" alt="Logo pix" style="height: 120px; width:120px;">		
				</div>
				<p>Welcome, <?= $student->studName ?? '';?></p>			
				<ul>
					<li><a href="<?php echo urlFor('students/myResults.php'); ?>">Results</a></li>
					<li><a href="">Payments</a></li>
					<li><a href="">Profile</a></li>
					<li><a href="">Assignments</a></li>
					<li><a href="<?php echo urlFor('students/logout.php');?>">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9 blue rounded">
			  <div class="row">
				<div class="col-2"></div>
				  <div class="col-8 tea text-center shadow m-5">	
					<form method="POST" action = "<?php echo urlFor('students/results.php');?>">
					  <div class="form-group">
						<input class="form-control" type="hidden" name="studId" value="<?php echo $StudId;?>">	
					  </div>
					  <div class="form-group">
						<input class="form-control" type="hidden" name="arm" value="<?php echo $Armm;?>">	  	
					  </div>
					  <div class="form-group">
					  	<select name="acadYr">
						  <option >Select An Academic Year</option>
							<?php include(SHARED_PATH .'/getAcadYr.php'); ?>	
						</select>
					  </div>		
					  <div class="form-group">
					  	<select name="Term">
						  <option>Select a Term</option>
							<?php include(SHARED_PATH .'/getTerm.php'); ?>	
						</select>
					  </div>
					  <div class="form-group">
					  	<input class="btn btn-primary" type="submit" value="View Result" name="submit"></td></tr>
					  </div>
					</form>					
				  </div>		
				</div>
				<div class="row">
				<div class="col-2"></div>
				  <div class="col-8 tea text-center shadow m-5">	
				  	<h4>Annual Result</h4>
					<form method="POST" action = "<?php echo urlFor('students/annualresult.php');?>">
					  <div class="form-group">
						<input class="form-control" type="hidden" name="studId" value="<?php echo $StudId;?>">	
					  </div>
					  <div class="form-group">
						<input class="form-control" type="hidden" name="arm" value="<?php echo $Armm;?>">	  	
					  </div>
					  <div class="form-group">
					  	<select name="acadYr">
						  <option >Select An Academic Year</option>
							<?php include(SHARED_PATH .'/getAcadYr.php'); ?>	
						</select>
					  </div>		
					  <div class="form-group">
					  	<select name="Term">
						  <option>Select a Term</option>
							<?php include(SHARED_PATH .'/getTerm.php'); ?>	
						</select>
					  </div>
					  <div class="form-group">
					  	<input class="btn btn-primary" type="submit" value="View Result" name="submit"></td></tr>
					  </div>
					</form>					
				</div>		
			</div>
		</div>
		      </div>


	</div>
		<footer class="text-center header rounded">
			<div class="p-2">
				&copy; <?php echo date("Y"). " ";?>   All rights reserved
			</div>
		</footer>
	</div>
	
	    
</body>
</html>
