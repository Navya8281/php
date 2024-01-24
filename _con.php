<?php
$con=mysqli_connect("localhost","root","","college");
if(!$con)
{
die("connection failed:" .mysqli_connect_error());
}
echo "connected successfully";
?>
<?php

$sql = "INSERT INTO student (student_name, student_age,course_id)

VALUES ('John', '25', '1')";

if (mysqli_query($con, $sql)) {

echo "New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($con);

}



?>
<?php

$sql = "INSERT INTO course (course_name, course_duration)

VALUES ('BArch', '4')";

if (mysqli_query($con, $sql)) {

echo "New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($con);

}

?>


<?php

$sqll = "SELECT student_id,student_name, student_age,course_id FROM student";

$result = mysqli_query($con, $sqll);

if (mysqli_num_rows($result) > 0) {

// output data of each row

while($row = mysqli_fetch_assoc($result)) {

echo "id: " . $row["student_id"]. "   - Name:" . $row["student_name"]. "age " . $row["student_age"]."course id".$row["course_id"]."<br>";

}

} else {

echo "No records found";

}

mysqli_close($con);

?>