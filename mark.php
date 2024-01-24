<DOCTYPE! html>

<html>

<head>

<style>

#regform{

border: 5px outset blue;

background-color: white;

text-align: center;

width: 600;

height: 700;

margin:auto;

}

table,tr,td,th{

border: 1px solid black;

}

</style>

</head>

<body>

<div id="regform">

<h1><i><b> Muthoot Institute of Technology and Science</h1></i></b>
<form name="marksForm" action="mark.php" method="post">

<label for="name">Full Name:</label>

<input type="text" id="name" name="fname" > <br><br>

<label for="roll">Roll No :</label>

<input type="text" id="roll" name="rollno" >

<h4>Marks </h4>

<label for="ds">DS Marks :</label>

<input type="text" id="ds" name="marksDS" ><br><br>

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

echo "Connected successfully<br><br>";
if (isset($_POST['submit']))

{

$name = $_POST['fname'];

$rollno = $_POST['rollno'];

$marksDS = $_POST['marksDS'];

$marksASE = $_POST['marksASE'];

$marksTot = $_POST['marksTot'];


//Connecting to database and inserting the values

$sql="insert into marks values('$name', '$rollno', $marksDS, $marksASE,
$marksTot)";

if (mysqli_query($conn, $sql)) {

echo "<br>New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

}

//Connecting to database and Searching for tuples of given roll no
$rollno = $_POST['rollno'];



$sqll = "select * from marks where rollno='$rollno'";

$result = mysqli_query($conn, $sqll);

if (mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_assoc($result))

{

echo "<br>"."rollno: " . $row["rollno"]."<br>" ."  Name: " . $row["name"]. "<br> " ."  Ds mark: " . $row["markDS"]. " <br>"."  Ase mark: " . $row["markASE"]. "<br> "."  Total mark: " . $row["marksTot"]. " ".
"<br>";

}



}
else {

echo "No records found";
}

mysqli_close($conn);

?>

</div>

</body>

</html>