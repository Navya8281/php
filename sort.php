<h2> Array print & sort</h2>
<?php

$stud = array("1"=>"ANILA", "2"=>"VENU", "3"=>"DIPU" ,"4"=>"NIVA","5"=>"NAVYA");
print_r($stud);
echo "<br>";
echo "<br>";
asort($stud);
foreach($stud as $det => $det_value) {
  echo "Key=" . $det . ", Value=" . $det_value;
  echo "<br>";
}
echo "<br>";
echo "<br>";
arsort($stud);
foreach($stud as $dtls => $dtls_value) {
  echo "Key=" . $dtls . ", Value=" . $dtls_value;
  echo "<br>";
}
?>