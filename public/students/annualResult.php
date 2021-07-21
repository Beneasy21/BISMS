<?php
    require_once('../../private/initialize.php');
    //session_start();
    //require_student_login();
    //$studId = h(u($_SESSION['stud_id'])) ?? '1000000';
    $studId = $_SESSION['stud_id'];

    $student = Student::find_by_studId($studId);
    $clax = Clax::find_by_id($student->currentClass);
    $sex = Sex::find_by_id($student->sex);
    $house = House::find_by_id($student->house);
    $acadYr = AcadYr::find_by_id($_POST['acadYr'] ?? '4');
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
	<div class="">
		<header class="text-center header rounded">
			<div class="p-2">
				<img class="img rounded" src="<?php echo urlFor('images/Header.png');?>" alt="header pix" >	
			</div>
		</header>
		<div class="row p-2">
			
			<div class="col-md-12 rounded">
				<!-- Begining of the Result column -->

	<!-- Begin of post method -->
	
	<?php 
		@$RegNo = $studId; //Storing Reg Numberin $regNo variable.
		//@$Session = h($_POST["acadYr"]) ?? '4' ;//Storing Acad Year in $Session variable
		//@$Term = h($_POST["Term"]) ?? '1'; //Storing Term in $Term variable.
		@$Session = '4' ;//Storing Acad Year in $Session variable
		@$Term = '3'; //Storing Term in $Term variable.
		
		//$term = Term::find_by_id($Term);
		
	?>
		<!-- End of get method -->
		<table width="1300" align=center >
			<tr>
				<td height="150" style="display:none;" class="text-center"><img width="600" Height="150"src="<?php echo urlFor('/images/HeadyPix.png');?>"></td>
			</tr>
			<tr>	
			<td height="120" class="text-center p-5">
				<table align=center border=1 width="80%">
					<tr><td width = "20%" align="left">Name:</td><td bgcolor="#B8DEE9" class="style3" ><div align="left" class="style9 style6"><strong><?php echo $student->studName;?></strong></div></td>
					    <td width = "20%" align="left">Arm:</td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $arm->armName;?></strong></div></td></tr>
					<tr><td width = "20%" align="left">Session:</td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php  echo $acadYr->acadYrName;?></strong></div></td>
						<td width = "20%" align="left">Class:</td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $clax->classsName;?></strong></div></td></tr>
					<tr><td width = "15%" align="left">Adm No:</td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $student->studId;?></strong></div></td>
					<td width = "15%" align="left">Sex</td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $sex->sexName;?></strong></div></td></tr>
				</table>
			</td>
			</tr>
			<tr bgcolor="#B8DEE9" class="style3">
			<td>
				<table width="100%" border="1" bordercolor="#85A157" align=center>
				  <thead>
					<tr bgcolor="#B8DEE9" class="style3">
						<th width="27%;" rowspan='2'><font size="5">Subject</font></th>
						<th colspan="2">1st Term Score</th>
						<th colspan="2">2nd Term Score</th>
						<th colspan="2">3rd Term Score</th>
						<th colspan="2">Year Total</th>
						<th colspan="2">Year Average</th>
						<th colspan="4">Result</th>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">
						<td><strong>Marks Obtainable</strong></td>
						<td><strong>Marks Obtained</strong></td>
						<td><strong>Marks Obtainable</strong></td>
						<td><strong>Marks Obtained</strong></td>
						<td><strong>Marks Obtainable</strong></td>
						<td><strong>Marks Obtained</strong></td>
						<td><strong>Marks Obtainable</strong></td>
						<td><strong>Marks Obtained</strong></td>
						<td><strong>Marks Obtainable</strong></td>
						<td><strong>Marks Obtained</strong></td>
						<td><strong>Class Highest </strong></td>
						<td><strong>Class Lowest </strong></td>
						<td><strong>Class Average Marks</strong></td>
						<td><strong>Grade</strong></td>
					</tr>
				  </thead>
					<tbody>
			<?php 
				$res = Rexult::fetch_annual_result($RegNo, $Session);

				foreach ($res as $resu) {
				$FirstTermObt = $SecondTermObt = $ThirdTermObt = 100;
				$TotalObt = $FirstTermObt + $SecondTermObt + $ThirdTermObt;
				$Total = $resu->First + $resu->Second + $resu->Third;
				$AverageObtainable = Ceil($TotalObt / 3);
				$AverageObt = round($Total / 3, 2);
				$sub = Subjects::find_by_id($resu->subjects);
			?>

			<tr bgcolor="#B8DEE9" class="style3">
				<td><font size="5"><strong><?= $sub->subName; ?></strong></font></td>
				<td><strong><font size="5"><?= $FirstTermObt; ?></strong></font></td>
				<td><strong><font size="5"><?= $resu->First; ?></strong></font></td>
				<td><strong><font size="5"><?= $SecondTermObt ?></strong></font></td>
				<td><strong><font size="5"><?= $resu->Second; ?></strong></font></td>
				<td><strong><font size="5"><?= $ThirdTermObt ?></strong></font></td>
				<td><strong><font size="5"><?= $resu->Third; ?></strong></font></td>
				<td><strong><font size="5"><?= $TotalObt ?></strong></font></td>
				<td><strong><font size="5"><?= $Total ?></strong></font></td>
				<td><strong><font size="5"><?= $AverageObtainable ?></strong></font></td>
				<td><strong><font size="5"><?= $AverageObt ?></strong></font></td>
				<td><strong><font size="5"><?= $resu->highest; ?></strong></font></td>
				<td><strong><font size="5"><?= $resu->lowest; ?></strong></font></td>
				<td><strong><font size="5"><?= ceil($resu->Avgr); ?></strong></font></td>
				<td><strong><font size="5"><?php include(SHARED_PATH . '/gradesAnnual.php');?></strong></font></td>
			</tr>
						<?php }
					?> 
					
					
				</table>				
				<p class="p-2">
					<i>* CHM = Class Highest Marks, CLM = Class Lowest Marks, CAM = Class Average Marks			</i><td>
				</p>
			</td>
		</tr>
		<!-- Extra Space-->
		<tr>
			<td height = 30></td>
		</tr>
		
		<!-- Result Comments area-->
		<tr>
			<td>
				<?php
					$result = Rexult::fetch_annual_avg_n_sum($RegNo,$Session);
				
					?>
					<!--   ====================     Comment Table  ==============    -->
					<table border = "1" width = "70%"  class="text-center p-5" align="center">
						<tr valign = "Top">
							<td><strong> Total Score:</strong></td> <td><strong> <?php echo $result->annualTotal;?></strong></td><td align="Right"><strong> Average :</strong></td> <td><strong> <?php echo round($result->annualAvg,2);?></strong></td>
						</tr>
						<tr >
							<td colspan = "2" align="right"><strong> Next term begins:</strong>
							<td  Colspan="2"><strong><?php require_once(SHARED_PATH . '/comment2.php');?></strong></td>
						</tr>
					</table>
					
					<?php require_once(SHARED_PATH . '/annualComment.php');?></strong>
					
					<tr>
						<td colspan="8" class="style3"><div align="left" class="style12"> </div></td>
					</tr>
			</td>
		</tr>
		
		
		</td>
		</tr>
		</table>
		
  </div>
				<!-- End of the result Column -->
			</div>
		</div>
		<?php include(SHARED_PATH . '/resultFooter.php'); ?>