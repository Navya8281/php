 <html>
<head>
<style>
    body {
      font-family:cursive;
      background-color: white;
      margin: 0;
      padding: 0;
    }
  
    #regform {
      border: 2px solid blue;
      background-color: white;
      width: 500px;
      height: auto;
      margin: 50px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #regform h2, #regform h3, #regform h4 {
      color: blue;
    }

   

    #regform input[type="text"],
    #regform input[type="submit"] {
      padding: 8px;
      margin-bottom: 10px;
      width: calc(100% - 20px);
      box-sizing: border-box;
    }

    #regform input[type="submit"] {
      background-color: blue;
      color: black;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    #regform input[type="submit"]:hover {
      background-color: blue;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: blue;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
  </style>
</head>
<body>
<div id="regform">
<h2><center>Sarga Book Stall</center></h2>
<!-- <h3><center>Input Form</center></h3> -->
<form name="marksForm" action="book.php" method="post">
<label>Title:</label>
<input type="text" id="title" name="title" > <br><br>
<label>Author:</label>
<input type="text" id="author" name="author"> <br><br>
<label>Edition:</label>
<input type="text" id="edition" name="edition"> <br><br>
<label>Publisher:</label>
<input type="text" id="publisher" name="publisher"><br><br>
<input type="submit" name="submit" value="Submit"><br><br>
<h3><center>Search Book Details </center></h3>
<form name="searchForm" action="book.php" method="post">
<label>Author:</label>
<input type="text" name="author1"><br><br>
<input type="submit" name="search" value="search"><br><br>
</div>
</form>
<?php
$conn= mysqli_connect("localhost","root","","book");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully<br>";
if (isset($_POST['submit']))
{
$title = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];

echo " The values are: ".'<br>';
echo "Title: ".$title.'<br>';
echo "Author: ".$author.'<br>';
echo "Edition: ".$edition.'<br>';
echo "Publisher: ".$publisher.'<br>';


$sql="insert into book(title,author,edition,publisher) values('$title', '$author', $edition, '$publisher')";
if (mysqli_query($conn, $sql)) {
echo "<br>New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

if(isset($_POST['search']))
{
$author1 = $_POST['author1'];
$sql="select * from book where author='$author1'";
$res= mysqli_query($conn, $sql);
$totRows = mysqli_num_rows($res);
if($totRows==0)
{ echo "No records found!"; }
echo "<center><table><tr>";
echo "<th>Title</th><th>Author</th><th>Edition</th><th>Publisher</th>";
echo "</tr><tr>";
while($row = mysqli_fetch_assoc($res))
{

echo "<td>".$row["title"]."</td>";
echo "<td>".$row["author"]."</td>";
echo "<td>".$row["edition"]."</td>";
echo "<td>".$row["publisher"]."</td>";
echo "</tr>";

}
echo "</table></center>";
}
?>