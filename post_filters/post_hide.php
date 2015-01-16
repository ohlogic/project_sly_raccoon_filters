<?php
function strToHex($string)
{
 $hex="";
 for ($i=0; $i < strlen($string); $i++)
 {
  if (ord($string[$i])<16)
  $hex .= "0";
  $hex .= dechex(ord($string[$i]));
 }
 return $hex;	// strtoupper($hex)     nice, but unnecessary, not required at this time
}

function post($buffer) {
	
// mod_sed (a small bit of sed functionality)

    //$out = str_replace("sunday", "SUN", $buffer);    // works, simply php processing
    //return str_replace("monday", "MON", $out);       // works, simply php processing
    //return $buffer;
						
// ext_filter_module (to run some binary on the data) (with php handler enabled)
		 /* could also call something like:
		 $buffer = htmlentities($buffer, ENT_QUOTES);  
		 return passthru ( 'python post_hide.py ' . "$buffer" . ' 2>&1');
			though the attempt to try it this way did not work, therefore  strToHex
		 */

	$path = b2f(realpath(dirname((__FILE__))));

	return passthru (  'python "'.$path.'/post_hide.py" ' .  strToHex($buffer) . ' 2>&1' );
	
	// I strToHex as a workaround due to the following not working 
	// when trying to transfer to python code using the    htmlentities($buffer, ENT_QUOTES);  
	// though the console (system or passthru)  even if   str_replace('&','%26', that output  also .

	
// mod_gzip - gzip compression: http://php.net/manual/en/function.gzcompress.php#88044
} /* anything that a post filter can be */
					   
					   
if ( (isset($__post) ? $__post : True) )   { // just being a bit too clever, it just says if the variable does not exist, assume 
                                             // the post filter variable is on , i.e., True
											 
											 // Though you can actually explicitly tell the variable
											 // that it is off i.e., False
											 // And finally you can tell the variable it is True , that is same as the 
											 // variable simply existing (in the first place) 
											 // (so its unnecessary to set the post filter variable to True)
											 // (but it would be part of best practices to set the post filter variable to True)
											 // In production code, it's probably better to assume False if using
											 // the "feature" of variable existence for a conditional statement
											 // it's (safer perhaps to assume False), it's better to opt-in  instead of  opt-out
											 
	$page = ob_get_contents(); // note: use of this function therefore, the ob_start callback does not apply 
							   // i.e., it does not run
	ob_end_clean();
	$page = pre( $page);       // so apply it manually
	echo    post($page);
}

ob_end_flush();

// Alternative implementation for strToHex
//function strToHex($string){ $hex = '';for ($i=0; $i < strlen($string); $i++){$hex .= sprintf( "%02x", ord($string[$i]));}	return $hex; }

// and the reverse (unused in this program)
//function hexToStr($hex){ $string = ''; for ($i =0; $i < strlen($hex) - 1; $i +=2){ $string .= chr(hexdec($hex[$i].$hex[$i+1])); } return $string;}
?>