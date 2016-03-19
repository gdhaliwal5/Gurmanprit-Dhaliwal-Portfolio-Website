<?php   
    //Error reporting
    //ini_set('display_errors', 1);
    //error_reporting(E_ALL); 
    session_start();
if (!isset($_SESSION['username']))
    header("Location: login.php");
	
	//require the loggedin
	require'loggedIn.php';
	
    //Connect to DB
    require '../../../db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gurmanprit Dhaliwal Admin</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"
          rel="stylesheet">
	<link href="css/agency.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <h2>List of Contacts</h2>
	<?php
    $sql = "SELECT * FROM contact ORDER BY contact_id DESC";
       $result = mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
            echo '<table id="example" class="display" cellspacing="0" width="100%">';
        echo '<thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
		
        
';
        while ($row = mysqli_fetch_array($result))
        {
            $name= $row['name'];
            $email = $row['email'];
            $message = $row['message'];
            
            echo "<tr>
			<td>$name</td>
			<td>$email</td>
			<td>$message</td>
			</tr>";
        }
        echo '</tbody>
    </table>';
   ?>
	
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('#example').DataTable();
</script>
  </body>
</html>