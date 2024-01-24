<html>
<head>
	<style>
		#regform
		{
			border: 5px outset plum;
			background-color: purple;
			text-align: center;
			width: 600;
			height: 700;
			margin: auto;
			border-radius: 7px;
			font-family: cursive;
		}
	</style>
	<script>
		function validation()
		{
			var a=document.forms['myform']['name'];
			var b=document.forms['myform']['rollno'];
			let regex=/^[a-zA-Z]+$/;
			if (regex.test(a)==false) {
				alert("name");
				return false;
			}
			let rollno=/^\d{10}$/;
			if (rollno.test(b)==false) {
				alert("rollno");
				return false;
			}

		}
	</script>
</head>
<body>
	<div id="regform">
	<form name="myform" method="POST" onsubmit="return validation()">
		
		<h1>form</h1>
		name:<input type="text" name="name" id="name" required>
		rollno:<input type="text" name="rollno" id="rollno" required>
<input type="submit" name="submit" value="submit">
	</form>

	<?php
	$con=mysqli_connect("localhost","root","","college");
	if (!$con) {
		// code...
		echo "not";
	}
	
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$rollno=$_POST['rollno'];
		$marksDS = $_POST['marksDS'];

$marksASE = $_POST['marksASE'];

$marksTot = $_POST['marksTot'];
		echo"name:".$name ."<br>";
		echo"rollno:".$rollno ."<br>";
		$sql="insert into marks values('$name','$rollno', $marksDS, $marksASE,
$marksTot)";
		if(mysql_query($con,$sql))
		{
			echo "done";
		}
		else
		{
			echo "not";
		}
	}
	mysqli_close($con);
	?>
</body>
</div>
</html>