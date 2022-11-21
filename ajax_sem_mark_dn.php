<?php
session_start();
$mark=array();
$supl=array();
$kl="dt";
$klw="dtw"; 
for($i=0;$i<8;$i++)
{/* $kl="dt0";
$klw="dtw0"; */
  $kl="dt".strval($i);
$klw="dtw".strval($i);  

    $mark[$i]=$_POST[$kl];
    $supl[$i]=$_POST[$klw];
}
$_SESSION['mrk']=serialize($mark);
/* $_SESSION['mrk']=$_POST['dt0']; */
$_SESSION['sup']=serialize($supl);
echo 1;


?>