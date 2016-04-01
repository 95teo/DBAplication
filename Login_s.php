<html>
<head>
<title>
	Welcome to student wizard
</title>
</head>
<?php
if(isset($_POST['user'])){
$name = $_POST['user'];
   
if(isset($_POST['password'])){
    $password = $_POST['password'];
     print $name;
     echo $password;
 }}
$conn = oci_connect('STUDENT', 'STUDENT', 'localhost/XE');
if (!$conn) {
    $e = oci_error();   // For oci_connect errors do not pass a handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
?>
</head>
<body>
<form  method='POST' action='test_s.php'>
<input type='text' name='user' />
<input type='password' name='password' />
<input type='submit' value='Login aplication' />
	</form>
</body>
</html>