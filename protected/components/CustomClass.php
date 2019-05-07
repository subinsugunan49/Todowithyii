<?php
class CustomClass extends CApplicationComponent {
 
 public static function moneyformat($amount='',$flag='') {

 		$explrestunits = "" ;

	 	 if(strlen($amount)>3) {
	        $lastthree = substr($amount, strlen($amount)-3, strlen($amount));
	        $restunits = substr($amount, 0, strlen($amount)-3); // extracts the last three digits
	        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to \
	        $expunit = str_split($restunits, 2);
	        for($i=0; $i<sizeof($expunit); $i++) {
	            // creates each of the 2's group and adds a comma to the end
	            if($i==0) {
	                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
	            } else {
	                $explrestunits .= $expunit[$i].",";
	            }
	        }
	        $formatcash = $explrestunits.$lastthree;
	      } else {
	        $formatcash = $amount;
	      }

	      if($flag)
	      	$formatcash = $formatcash.' INR';
		
	         return $formatcash;
	     }
 
}