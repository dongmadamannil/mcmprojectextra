<?php
    session_start();
    require 'dbconnect.php';
?>
</!DOCTYPE html>
<html>
<head>
	<title></title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php
    include('admin_message.php');
    if(isset($_POST['broadcast']))
    {
         $mess = mysqli_real_escape_string($conn, $_POST['message']);
         $tdate = date("Y-m-d");
        
        $sql="INSERT INTO admin_message VALUES('$mess','$tdate')";
        if(mysqli_query($conn,$sql))
         {  
            $_SESSION['message'] = "Message Inserted ";
            header("Location: broadcast_message.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Message not Inserted";
            header("Location: broadcast_message.php");
            exit(0);
        }

     }

    if(isset($_POST['delete']))
    {
        //$prev_date=date('Y-m-d', strtotime("-1 days"));
        $tdate = date("Y-m-d");

        //$del = mysqli_real_escape_string($con, $_POST['delete_faculty']);
        $query = "DELETE FROM admin_message WHERE mess_date < '$tdate'";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
             $_SESSION['message'] = "Message Deleted Successfully";
             header("Location: broadcast_message.php");
            exit(0);
    }
    else
    {
        $_SESSION['message'] = "Message Not Deleted";
        header("Location: broadcast_message.php");
        exit(0);
    }
}

        ?>
        <form method="post" action="broadcast_message.php" name="broadcast">
        <div class="container mt-4">
        <div class="row" style="margin: auto;">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 style="text-align: center;">Broadcast Message</h4>
        </div>
        <div class="card-body" style="margin: auto;">
        <textarea rows="4" cols="50" name="message" id="message"></textarea> 
        <br><br>
        <input type="submit" name="broadcast" id="broadcast" value="SUBMIT"class="btn btn-success btn-sm">
        <input type="submit" name="delete" id="delete" value="DELETE" class="btn btn-danger btn-sm">
        </div>
        </div>
        </div>
        </div>
    </div>
        </form>
</body>
</html>