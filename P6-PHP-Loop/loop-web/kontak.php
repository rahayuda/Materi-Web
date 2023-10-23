<h1>Halaman Kontak</h1>
<p>Ini adalah halaman kontak.</p>

<br>

<?php
for ($x = 0; $x <= 10; $x++) 
{

if($x <= 3)
{
 ?><div style="width:40px;height:30px;background-color:red"></div><br><?php
}
else if ($x <= 5 && $x >= 4)
{
 ?><div style="width:40px;height:30px;background-color:blue"></div><br><?php
}
else if ($x <= 10 && $x >= 6)
{
?><div style="width:40px;height:30px;background-color:green"></div><br><?php
}

?>


<?php } ?>