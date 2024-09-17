<?php
    $db_host="127.0.0.1";
    $db_user="root";
    $db_pass="";
    $db_name="file_detailes";
    $conn =mysqli_connect($db_host,
                      $db_user, 
                      $db_pass,
                      $db_name);
    $sql="SELECT * FROM fontdetails";
    $result=$conn->query($sql);
    print_r($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Font List</title>
</head>
<body>
<div class="container-lg">
		<table class="border" style="margin:10px; width: 70rem;">
			<tbody>
				<tr>
					<th>font name</th>
					<th>preview</th>
				</tr>
				<?php
                 while($user=$result->fetch_assoc()) {?>
					
				<tr>
					<td > <?php echo $user['fontname']; ?> </td>
					<td > <?php echo $user['preview']; ?> </td>
					<td class="btn btn-danger" delete> delete</td>
				</tr>
             <?php } ?>
    </tbody>
</table>
	</div>
</body>
</html>