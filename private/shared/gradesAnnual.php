<?php 
														if ($AverageObt >=75)
														{
															$Grade= "A1";
														}
														elseif($AverageObt<75 && $AverageObt >=70)
														{
															$Grade = "B2";
														}
														elseif($AverageObt<70 && $AverageObt >=65)
														{
															$Grade = "B3";
														}
														elseif($AverageObt<65 && $AverageObt >=60)
														{
															$Grade = "C4";
														}
														elseif($AverageObt<60 && $AverageObt >=55)
														{
															$Grade = "C5";
														}
														elseif($AverageObt<55 && $AverageObt >=50)
														{
															$Grade = "C6";
														}
														elseif($AverageObt<50 && $AverageObt >=45)
														{
															$Grade = "D7";
														}
														elseif($AverageObt<45 && $AverageObt >=40)
														{
															$Grade = "E8";
														}
														else 
														{
															$Grade = "F9";
														}
													echo $Grade;?>