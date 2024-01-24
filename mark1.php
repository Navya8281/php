<DOCTYPE! html>

<html>

<head>

<style>

#regform{

border: 5px outset purple;

background-color: plum;

text-align: center;

width: 600;

height: 700;

margin:auto;
border-radius: 7px;
font-family: cursive;

}

button{
	border-radius: 15px;

background-color: solid black;

}

</style>
<script>
function validate(){
var a=document.forms["marksForm"]["name"].value;
var b=document.forms["marksForm"]["rollno"].value;
let regex=/^[a-zA-Z]+$/;
if(regex.test(a)==false){
alert("Name must only contain letters");
return false;
}
var phoneno = /^\d{10}$/;
if (phoneno.test(b)==false) {
alert("it should have 10 digits");
return false;
}
}
</script>
</head>

<body>

<div id="regform">

<h1><i><b> Muthoot Institute of Technology and Science</h1></i></b>
<form name="marksForm"  method="post" onsubmit="return validate()">

<label for="name">Full Name:</label>

<input type="text" id="name" name="fname" required> <br><br>

<label for="roll">Roll No :</label>

<input type="text" id="roll" name="rollno" required>

<h4>Marks </h4>

<label for="ds">DS Marks :</label>

<input type="text" id="ds" name="marksDS" required><br><br>

<label for="ase">ASE Marks:</label>

<input type="text" id="ase" name="marksASE" ><br><br>

<label for="tot">Total Marks:</label>

<input type="text" id="tot" name="marksTot" ><br><br>

<input type="submit" name="submit" value="Submit"><br><br>

</form>


<?php

// Connect to DB

$conn= mysqli_connect("localhost","root","","college");

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}


echo "Connected successfully<br>";
if (isset($_POST['submit']))

{

$name = $_POST['fname'];

$rollno = $_POST['rollno'];

$marksDS = $_POST['marksDS'];

$marksASE = $_POST['marksASE'];

$marksTot = $_POST['marksTot'];

echo "rollno:".$rollno.'<br>';

echo "name:".$name.'<br>';
//Connecting to database and inserting the values

$sql="insert into marks values('$name', '$rollno', $marksDS, $marksASE,
$marksTot)";

if (mysqli_query($conn, $sql)) {

echo "<br>New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

}


?>

</div>

</body>

</html>