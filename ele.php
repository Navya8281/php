<!DOCTYPE html>
<head>
	<title>Electricity Bill</title>
  <style>
    table { background-color: #bde9ba; }
  body{
    font-family:cursive;
  }
  </style>
</head>
<?php
$total = $result =$cname =$cnum = $units= '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$cname = test_input($_POST["cname"]);
$cnum = test_input($_POST["cnum"]);
$units = test_input($_POST["units"]);
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
if (isset($_POST['unit_submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $total = 'Amount to be paid : '. $result;
        $cname = 'Name : ' . $cname;
        $cnum = 'Consumer number : ' . $cnum;
        $units = 'Units Consumed : ' . $units;
    }
}
function calculate_bill($units) {
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.50;
    $unit_cost_third = 5.50;
    $unit_cost_fourth = 6.50;
    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else if($units > 100 && $units <= 200) {
        $temp = (50 * 3.5) + (100 * $unit_cost_second);
        $remaining_units = $units - 150;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    }
    else {
        $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 250;
        $bill = $temp + ($remaining_units * $unit_cost_fourth);
    }
    return number_format((float)$bill, 2, '.', '');
}
?>
<body>
<form action="" method="post" id="quiz-form">
  <br><br><br>
	<div id="page-wrap">
    <table style="border-style:outset" cellspacing="1" cellpadding="10" align="center" bgcolor="white" width="600" background-color="black" >
      <tr><td colspan="2" align="center"><!-- <img src="kseb1.jpg"/> --></td><tr>
      <tr><td colspan="2" align="center"><h1>Electricity Bill</h1>
              <tr><td>Consumer name :</td><td><input type="text" name="cname" id="cname"/></td></tr>
                <tr><td>Consumer number :</td><td><input type="number" name="cnum" id="cnum"/></td></tr>
            	  <tr><td>Units consumed :</td><td><input type="number" name="units" id="units"/></td></tr>
                <tr><td></td></tr>
            	<tr><td colspan="2" align="center"><input type="submit" name="unit_submit" id="unit_submit" value="Submit" /></td><td>
<div>
      <tr><td><?php echo $cname.'<br>'; ?></td></tr>
       <tr><td><?php echo $cnum.'<br>'; ?></td><tr>
      <tr><td><?php echo $units; ?></td></tr>
		    <tr><td><?php echo $total; ?></td></tr>
      </div>
	</div>
  </table>
</form>
</body>
</html>


