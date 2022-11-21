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
 $query = "SELECT message FROM admin_message";
 $query_run = mysqli_query($conn, $query);
 ?>
 <div class="container mt-4">
        <div class="card">
        <div class="card-header">
            <h4 style="text-align: center;">Admin Message</h4>
        </div>
        <?php
 //$mess=mysqli_fetch_assoc($query_run);
  while($rows=$query_run->fetch_assoc())
  {
  	?>
  
        <div style="margin: auto;">
		<?php echo $rows['message'];?>
	
<?php
  }
?>
</div> 
        </div>
</div>
</body>
</html>