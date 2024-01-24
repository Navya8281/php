<?php
$conn = mysqli_connect("localhost", "root", "", "college");
if (!$conn) {
    echo "Connection Failed" . "<br>";
} else {
    echo "Connected successfully" . "<br>";
}

$sql = "INSERT INTO student (stu_id, name, course) VALUES (67, 'Surya', 'MCA'),(45,'sree','BTech'),(78,'aami','BCA'),(70,'aryan','MTech')";

if (mysqli_query($conn, $sql)) {
    echo "Inserted Successfully" . "<br>";
} else {
    echo "Insertion Failed" . "<br>";
}

$select_query = "SELECT * FROM student";
$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0)
 {
    echo "<center><h1 style='color: black'>Student Details</h1></center>";
    echo "<center><table border='5' cellspacing='1' cellpadding='10' align='center' bgcolor='white'>
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>Course</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['stu_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        echo "</tr>";
    }

    echo "</table></center>";
} else {
    echo "No records found in the student table";
}
mysqli_close($conn);
?>
