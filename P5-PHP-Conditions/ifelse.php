<?php

$mat = 80;
$eng = 70;
$total = (80+70)/2;

echo "Matematika: $mat <br>";
echo "Bahasa Inggris: $eng <br>";

if($mat>=80 and $eng>=70)
{
	echo "Lulus";
}else{
	echo "Tidak Lulus";
}

echo ", dengan nilai $total ";

if($total>=80)
{
	echo "(Sangat Baik)";
}else if($total>=70 and $total<80){
	echo "(Baik)";
}else if($total>=60 and $total<70){
	echo "(Cukup)";
}else if($total>=50 and $total<60){
	echo "(Buruk)";
}

echo "<br><br>";

$a = 70;
$b = 70;

if($a==50 or $b==40)
{
	echo "Benar";
}else
	echo "Salah";

echo "<br><br>";

if($a==50 xor $b==40)
{
	echo "Benar";
}else
	echo "Salah";
?>