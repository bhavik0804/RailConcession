<?php
     setcookie("user_name", "abc", time()+ 80,'/'); // expires after 60 seconds
     echo 'the cookie has been set for 80 seconds';
     print_r($_COOKIE);    //output the contents of the cookie array variable 
?>