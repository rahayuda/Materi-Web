<?php  
	$nama		= $_REQUEST["nama"];
	$tempat		= $_REQUEST["tempat"];
	$lahir		= $_REQUEST["lahir"];
	$gender		= $_REQUEST["gender"];
	$pendidikan	= $_REQUEST["pendidikan"];
	$usia		= $_REQUEST["usia"];
	$email		= $_REQUEST["email"];
	$password	= $_REQUEST["password"];
	$rate		= $_REQUEST["rate"];
	
    $uploadDir = "images/"; 
    $gambarPath = $uploadDir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambarPath); 

    $uploadDir = "uploads/"; 
    $filePath = $uploadDir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $filePath); 

	echo "Nama: $nama<br>";
	echo "Tempat: $lahir<br>";
	echo "Lahir: $tempat<br>";
	echo "Gender: $gender<br>";
	echo "Pendidikan: ";
	$arrlength = count($pendidikan);

	for($x = 0; $x < $arrlength; $x++) {
  		echo $pendidikan[$x];
  		echo " ";
	}

	echo "<br>";
	echo "Usia: $usia<br>";
	echo "Email: $email<br>";
	echo "Password: $password<br>";
	echo "Rate: $rate<br>";  

    echo "Foto:<br><img src='$gambarPath' alt='Uploaded Gambar'><br>";
    echo "Dokumen: ";
?> 

<a href='<?php echo $filePath; ?>'>Dokumen</a>
