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
<h4>Search Student Data</h4>

<form name="searchForm" action="mark.php" method="post">

<label for="tot">Roll No::</label>

<input type="text" name="roll" >

<input type="submit" name="search" value="Search"><br><br>

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

echo " The values are: ".'<br>';

echo "Name: ".$name.'<br>';

echo "Roll No: ".$rollno.'<br>';

echo "DS Marks: ".$marksDS.'<br>';

echo "ASE Marks: ".$marksASE.'<br>';

echo "Total Marks: ".$marksTot.'<br>';
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

if(isset($_POST['search']))

{

$rollno = $_POST['roll'];

$sql="select * from marks where rollno='$rollno'";

$res= mysqli_query($conn, $sql);

$totRows = mysqli_num_rows($res);
if($totRows==0)

{ echo "No records found!"; }

echo "<center><table><tr>";

echo "<th>Roll No</th><th>Name</th>";

echo "</tr><tr>";

while($row = mysqli_fetch_assoc($res))

{

echo "<td>".$row["rollno"]."</td>";

echo "<td>".$row["name"]."</td>";

echo "</tr>";

}

echo "</table></center>";

}

mysqli_close($conn);

?>

</div>

</body>

</html>