<?php
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);

$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

ksort($age);

echo "<br>Ksort: Associative (Key) <br><br>";

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

asort($age);

echo "<br>Ksort: Associative (Value) <br><br>";

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
?>