<?php  
	//$name=$_POST["name"];
	$name=$_REQUEST["name"];
	$password=$_POST["password"];
	echo "Welcome: $name, your password is: $password <br><br>"; 

	$hashedpassword = password_hash($password, PASSWORD_BCRYPT); 
	echo "1. Enkripsi Bcrypt: $hashedpassword<br>";

	$hashedpassword = hash("sha256", $password);
	echo "2. Enkripsi SHA256: $hashedpassword<br>";

	$hashedpassword = md5($password);
	echo "3. Enkripsi MD5: $hashedpassword<br>";

	$key = "kuncipassword";
	$hashedpassword = hash_hmac("sha256", $password, $key);
	echo "4. Enkripsi HMAC: $hashedpassword<br>";
?>  