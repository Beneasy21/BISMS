<?php 
  $tComment = Comment::termlyComment($RegNo, $Session, $Term);

  $Joiner = "  Yet,  ";
			
  if($tComment->commandant != NULL)
	{
 	  $Commandant =$Joiner . $tComment->commandant ;
	}
	else
	{
	  $Commandant = "";
	}
?>
  <table>
	<tr>
	  <td height="20"></td>
	</tr>
	  </table>
		<table border="1" width="100%"bordercolor="#85A157" align=center>	
		  <tr bgcolor="#B8DEE9" class="style3">	
		    <td><strong>Class Teacher's Remarks</strong></td><td><strong><?php echo $tComment->classTeacher; ?> </strong></td> 
		  </tr>
		  <tr bgcolor="#B8DEE9" class="style3">	
		    <td><strong>House Parent's Remarks</strong></td><td><strong><?php echo $tComment->houseParent; ?></strong></td>
		  </tr>
		  <tr bgcolor="#B8DEE9" class="style3">
		    <td><strong>Commandant's Remarks<strong></td><td> <strong><?php 
			  
				$AverageScore = $result->termAvg;
				
				if ($AverageScore >= 75.0000)
				  {
					$Comment =  "Excellent Result. Keep It up";
				  }
				elseif ($AverageScore >= 70.0000 && $AverageScore < 75.0000)
				  {
					$Comment =  "Very Good Result";
				  }
				elseif ($AverageScore >= 60.0000 && $AverageScore < 70.0000)
				  {
					$Comment =  "Good Result";
				  }
				elseif ($AverageScore >= 55.0000 && $AverageScore < 59.0000)
				  {
					$Comment =  "Fairly Good Result, Need to improve upon.";
				  }
				elseif ($AverageScore >= 50.0000 && $AverageScore < 55.0000)
				  {
					$Comment =  "Average Performance";
				  }
				elseif ($AverageScore >= 40.0000 && $AverageScore < 50.0000)
				  {
					$Comment =  "Weak Performance, Work Harder";
				  }
				else
				  {
				 	$Comment =  "Sorry cant place your comment";
				  }
					echo $Comment . $Commandant;
					
					?> 
						
						

					

</body>
</html>
