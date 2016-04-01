<html>
<head>
<title>
	Welcome to student wizard
</title>
</head>
<body>

<?php
$conn = oci_connect('STUDENT', 'STUDENT', 'localhost/XE');
if (!$conn) {
    $e = oci_error();   // For oci_connect errors do not pass a handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}

?>
<input type="button" value="Secretariat" onclick="location='Login_s.php'" />
<input type="button" value="Profesor" onclick="location='Login_profs.php'" />
</body>
</html>