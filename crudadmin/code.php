<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_faculty']))
{
    $faculty_id = mysqli_real_escape_string($con, $_POST['delete_faculty']);

    $query = "DELETE FROM login WHERE uname='$faculty_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Faculty Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Faculty Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_faculty']))
{
    $faculty_id = mysqli_real_escape_string($con, $_POST['faculty_id']);

    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $faculty_type = mysqli_real_escape_string($con, $_POST['faculty_type']);

    $query = "UPDATE login SET uname='$uname',u_type='$faculty_type' WHERE uname='$uname' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Faculty Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Faculty Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_faculty']))
{
    $id= mysqli_real_escape_string($con, $_POST['id']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $type = mysqli_real_escape_string($con, $_POST['faculty_type']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $batch = mysqli_real_escape_string($con, $_POST['batch']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $sem = mysqli_real_escape_string($con, $_POST['sem']);
    $email = mysqli_real_escape_string($con, $_POST['email']);


    $query = "INSERT INTO login (uname,pass,u_type,branch,batch,year,sem,email) VALUES ('$id','$pass','$type','$branch','$batch','$year','$sem','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Faculty Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Faculty Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>