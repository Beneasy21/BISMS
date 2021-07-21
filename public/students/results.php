<?php
    require_once('../../private/initialize.php');
    //session_start();
    //require_student_login();
    //$studId = h(u($_SESSION['stud_id'])) ?? '1000000';
    if(!is_post_request()){
    	redirect_to(urlFor('students/'));
    }

    @$Session = h($_POST["acadYr"]) ?? '';//Storing Acad Year in $Session variable
	@$Term = h($_POST["Term"]) ?? ''; //Storing Term in $Term variable.


    $studId = $_SESSION['stud_id'];
    $student = Student::find_by_studId($studId);
    $clax = Clax::find_by_id($student->currentClass);
    $sex = Sex::find_by_id($student->sex);
    $house = House::find_by_id($student->house);
    $acadYr = AcadYr::find_by_id($_POST['acadYr']);
    $arm = Arm::find_by_id($student->arm);
    $term = Term::find_by_id($_POST['Term']);

    $RegNo = $studId;
	$result = Rexult::fetch_termly_avg_n_sum($RegNo,$Session, $Term);
	$res = Rexult::fetch_individual_result($RegNo,$Session, $Term);


 
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
			
			<div class="col-md-12 blue rounded">
				<!-- Begining of the Result column -->

	<!-- Begin of post method -->
	
	
		<!-- End of get method -->
		<div class="container text-center">
		<table width="90%" align=center >
			<tr>
				<td height="150" style="display:none;" class="text-center"><img width="600" Height="150"src="<?php echo urlFor('/images/HeadyPix.png');?>"></td>
			</tr>
			<tr>	
			<td height="120" class="text-center p-5">
				<table align=center border="1" width="90%" height="120">
					<tr>
						<td width = "14%" align="right"><strong><i>Full Name:</i></td><td bgcolor="#B8DEE9" class="style3" colspan=3 width="42%"><div align="left" class="style9 style6"><strong><?php echo $student->studName ?? '';?></strong></div></td>
						<td width = "10%" align="right"><Strong><i>Sex:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width = "12%"><div align="left" class="style9 style6"><strong><?php echo $sex->sexName ?? '';?></strong></div></td>
						<td width = "16%" align="Center" rowspan="3"><img src ="PassPort"></td>
					</tr>
					<tr>
						<td width = "14%"" align="right"><strong><i>Admin No:</i></td><td bgcolor="#B8DEE9" class="style3" width="18"><div align="left" class="style9 style6"><strong><?php  echo $student->studId ?? '';?></strong></div></td>
						<td width = "14%" align="right"><strong><i>Class:</i></strong></td><td bgcolor="#B8DEE9" class="style3"width="18"><div align="left" class="style9 style6" ><strong><?php  echo $clax->classsName  ?? '';?></strong></div></td>
						<td width = "10%" align="right"><strong><i>Arm:</i></strong></td><td bgcolor="#B8DEE9" class="style3" width="12"><div align="left" class="style9 style6"><strong><?php  echo $arm->armName ?? '';?></strong></div></td>
					</tr>
					<tr>
						<td width = "14%" align="right"><strong><i>House: </i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $house->houseName ?? '';?></strong></div></td>
						<td width = "14%" align="right"><strong><i>Session:</i></strong></td><td bgcolor="#B8DEE9" class="style3"><div align="left" class="style9 style6"><strong><?php echo $acadYr->acadYrName  ?? '';?></strong></div></td>
						<td width = "10%" align="right"><strong><i>Term:</i></strong></td><td bgcolor="#B8DEE9" class="style3" width="12%"><div align="left" class="style9 style6"><strong><?php echo $term->termName ??'';?></strong></div></td>
					</tr>
				</table>
			</td>
			</tr>
			<tr bgcolor="#B8DEE9" class="style3">
			<td>
				<table width="100%" border="1" bordercolor="#85A157" align=center>
					<tr bgcolor="#B8DEE9" class="style3">
						<th width = "32%"><strong></strong></th>
						<th colspan =2 width = "11%">1st Summary</th>
						<th colspan =2 width = "11%">2nd Summary</th>
						<th colspan =2 width = "13%">Term's Work</th>
						<th colspan =6 width = "33%">Summary of Term's Work</th>
					</tr>
					<tr bgcolor="#B8DEE9" class="style3">
						<th width = "32%">Subject</th>
						<th width = "5%">Marks Obt</th>
						<th width = "6%">1st Test</th>
						<th width = "5%">Marks Obt</th>
						<th width = "6%">2nd Test</th>
						<th width = "7%">Marks Obt</th>
						<th width = "6%">Exam</th>
						<th width = "7%">Marks Obt</th>
						<th width = "6%">Total Score</th>
						<th width = "6%">CHM</th>
						<th width = "6%">CLM</th>
						<th width = "6%">CAM</th>
						<th width = "6%">Grade</th>
					</tr>
					
					<?php
				
						//echo $RegNo, $Session, $Term;
						
												
						foreach($res as $resu) { 
						$FirstSummaryObt = 15;
						$SecondSummaryObt = 15;
						$ExamObt = 70;
						$TotalObt = $FirstSummaryObt + $SecondSummaryObt + $ExamObt;
						$sub = Subjects::find_by_id($resu->subjects);
							?>
						
					<tr>
						<td width = "28%" class="text-left"><strong><?php echo $sub->subName;?></strong></td>
						<td width = "5%"><strong><?php echo $FirstSummaryObt;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->ca1;?></strong></td>
						<td width = "5%"><strong><?php echo $SecondSummaryObt;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->ca2;?></strong></td>
						<td width = "7%"><strong><?php echo $ExamObt;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->exam;?></strong></td>
						<td width = "7%"><strong><?php echo $TotalObt;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->examTotal;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->chm;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->clm;?></strong></td>
						<td width = "6%"><strong><?php echo $resu->cam;?></strong></td>
						<td width = "6%"><strong><?php $Total = $resu->examTotal;require(SHARED_PATH . '/grades.php');?></strong></td>
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
					
				
					?>
					<!--   ====================     Comment Table  ==============    -->
					<table border = "1" width = "70%"  class="text-center p-5" align="center">
						<tr valign = "Top">
							<td><strong> Total Score:</strong></td> <td><strong> <?php echo $result->termTotal;?></strong></td><td align="Right"><strong> Average :</strong></td> <td><strong> <?php echo round($result->termAvg,2);?></strong></td>
						</tr>
						<tr >
							<td colspan = "2" align="right"><strong> Next term begins:</strong>
							<td  Colspan="2"><strong><?php require_once(SHARED_PATH . '/comment2.php');?></strong></td>
						</tr>
					</table>
					
					<?php require_once(SHARED_PATH . '/comment3.php');?></strong>
					
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