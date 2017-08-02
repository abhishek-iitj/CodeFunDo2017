<?php
define('HOST','ftp://waws-prod-sn1-079.ftp.azurewebsites.windows.net');
define('USER','codefundof9\f9_ftp_user1');
define('PASS','f9_ftp_pass');
define('DB','jarvis');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
  
if($con){
echo 'success';
}else{
echo 'intl_i';
}
 
mysqli_close($con);
?>