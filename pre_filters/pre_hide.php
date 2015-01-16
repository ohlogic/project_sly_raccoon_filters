<?php

function pre($buffer) { return (str_replace("too_clever", "better_simple", $buffer)); 

                         /* could also call something like:
						 $buffer = htmlspecialchars($buffer);     with   ENT_QUOTES
						 return passthru ( 'python post_hide.py ' . "$buffer" . '  2>&1');
						 
						 Then once the data is over at the python post filter   post_hide.py
                         can call a system call or communicate to a  php interpreter to html_entity_decode() and further 
                         process the data in python. */
						 
                        /* Note: attention that buffer must be a double quoted string to transfer to Python */
						
                      } /* anything that a pre filter can be */

ob_start("pre");
?>