<?php
session_start();
include("dbconnect.php");
    if($_POST['idr']==3){//used to return json data for filling
        $tid=$_POST['reff_dta'];
        $tdata=mysqli_fetch_assoc(mysqli_query($conn,"select * from registration_details where studid='$tid';"));
      //  $user_idr=$tdata['user_id'];
      $_SESSION['fetch_qry']="select * from registration_details where studid='$tid';";
        //$udata=mysqli_fetch_assoc(mysqli_query($conn,"select * from registration_details where studid='$user_idr';"));
        $rtarray['0']=$tdata['fullname'];
        $rtarray['1']=$tdata['studid'];
        $rtarray['2']=$tdata['email'];
        $rtarray['3']=$tdata['mobile'];
        $rtarray['4']=$tdata['fatherincome'];
        $rtarray['5']=$tdata['motherincome'];
        $rtarray['6']=$tdata['sibling1income'];
        $rtarray['7']=$tdata['sibling2income'];
        $rtarray['8']=$tdata['entrancerank'];
        $rtarray['9']=$tdata['gpa'];
        echo json_encode($rtarray);
        
        }
 

if($_POST['idr']==1){//used to display the list of students
    
$srch=$_POST['srh'];
$srch1=$_POST['srh1'];

//$user_idr=$_POST['uidrh'];
    if($srch=="" && $srch1==""){
      $sqQuery = "select * from registration_details where studid in (select studid from to_admin)  order by branch;";
      $sqQuery12 = "select fullname,branch,hosteller,accno,bankbranch,ifsc,category from registration_details where studid in (select studid from to_admin)  order by branch;";
     // echo "1";
   }
     else{
      if($srch!="" && $srch1=="")
      {
        $m=$srch."%";
      $sqQuery = "select * from registration_details where ( studid like '$m' or fullname like '$m') and studid in (select studid from to_admin)  order by branch;";
      $sqQuery12 = "select fullname,branch,hosteller,accno,bankbranch,ifsc,category from registration_details where ( studid like '$m' or fullname like '$m') and studid in (select studid from to_admin)  order by branch;";
      //echo 2;
      }
      if($srch=="" && $srch1!="")
      {
      $sqQuery = "select * from registration_details where studid in (select studid from to_admin where branch='$srch1')  order by branch;";
      $sqQuery12 = "select fullname,branch,hosteller,accno,bankbranch,ifsc,category from registration_details where studid in (select studid from to_admin where branch='$srch1')  order by branch;";
      //echo 2;
      }
      if($srch!="" && $srch1!="")
      {
        $m=$srch."%";
      $sqQuery = "select * from registration_details where ( studid like '$m' or fullname like '$m') and studid in (select studid from to_admin where branch='$srch1')  order by branch;";
      $sqQuery12 = "select fullname,branch,hosteller,accno,bankbranch,ifsc,category from registration_details where ( studid like '$m' or fullname like '$m') and studid in (select studid from to_admin where branch='$srch1')  order by branch;";
      //echo 2;
      }
      
    } 

       $resObjQuery = mysqli_query($conn, $sqQuery);
       $_SESSION['fetch_qry']=$sqQuery12;
    $i = 0;
    if (mysqli_num_rows($resObjQuery)) {
        while ($rowObj = mysqli_fetch_assoc($resObjQuery)) {
            $retArray[$i] = $rowObj;
            $i++;
        }
        echo json_encode($retArray);
    } else {
        $retArray[0] = "NULL";
        echo json_encode($retArray);
    }
}
?>