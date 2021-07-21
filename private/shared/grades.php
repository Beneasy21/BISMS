<?php 
	if ($Total >=75)
		{
		$Grade= "A1";
		}
		elseif($Total<75 && $Total >=70)
		{
		$Grade = "B2";
		}
														elseif($Total<70 && $Total >=65)
														{
															$Grade = "B3";
														}
														elseif($Total<65 && $Total >=60)
														{
															$Grade = "C4";
														}
														elseif($Total<60 && $Total >=55)
														{
															$Grade = "C5";
														}
														elseif($Total<55 && $Total >=50)
														{
															$Grade = "C6";
														}
														elseif($Total<50 && $Total >=45)
														{
															$Grade = "D7";
														}
														elseif($Total<45 && $Total >=40)
														{
															$Grade = "E8";
														}
														else 
														{
															$Grade = "F9";
														}
													echo $Grade;?>