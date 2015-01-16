<?php
$__sub = ''; /* begin with a forward slash, without ending slash ( subdirectory under document root of a domain name) remove if unused */
function b2f($s) { return (str_replace('\\','/',$s)); } // optional on some OS environments, for platform independence
include( b2f(substr(__FILE__, 0, -strlen($_SERVER['SCRIPT_NAME']))) . $__sub . '/' . 'pre_filters/pre_hide.php' );
?>




<html>
<body>
<p>It's sunday</p>
<p>Then is monday</p>
<p> within subdirectory, note include paths unchanged <p>
</body>
</html>




<?php
$__post = True; /* is values are:  ( the variable exists ),  True,  False   represents T, T, F  (if removed, denotes T) */
include( b2f(substr(__FILE__, 0, -strlen($_SERVER['SCRIPT_NAME']))) . $__sub . '/' . 'post_filters/post_hide.php' ) 
?>