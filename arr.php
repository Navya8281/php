<h2>Simple Array<br></h2>
<?php
$cars = array("Shake", "Ice cream", "Choclate");

$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {

echo $cars[$x];

echo "<br>";

}

?>
<?php

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

echo "Peter is " . $age['Peter'] . " years old.";

?>
<h2>Two Dimensional Array<br></h2>
<?php
$cars = array (

array("Volvo",22,18),

array("BMW",15,13),

array("Saab",5,2),

array("Land Rover",17,15));
    
for ($row = 0; $row < 4; $row++) {

echo "<p><b>Row number $row</b></p>";

echo "<ul>";

for ($col = 0; $col < 3; $col++) {

echo "<li>".$cars[$row][$col]."</li>";

}

echo "</ul>";

}
?>
<h2>sort<br></h2>
<?php

$ca = array("Volvo", "BMW", "Toyota");

sort($ca);
$clength = count($ca);
for($x = 0; $x < $clength; $x++) {
  echo $ca[$x];
  echo "<br>";
}

?>