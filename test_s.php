<html>
<head>
<title>
	Welcome to student wizard
</title>


<?php

$conn = oci_connect('STUDENT', 'STUDENT', 'localhost/XE');
if (!$conn) {
    $e = oci_error();   // For oci_connect errors do not pass a handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
    $name = $_POST['user'];
    $password = $_POST['password'];



$stid = oci_parse($conn, ' begin login.verify_secretary(:name, :password); end;');
if (!$stid) {
    $e = oci_error($conn);  // For oci_parse errors pass the connection handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
oci_bind_by_name($stid, ':name', $name);
oci_bind_by_name($stid, ':password', $passsword);
$r=oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}
else{

	echo 'Conexiune reusita!';
}

oci_free_statement($stid);
oci_close($conn);

?>

</head>
<body>
<form  method='POST' action='adauga_student.php'>
<input type='text' name='nume' />
<input type='text' name='prenume'/>
<input type='submit' value='Add_student' />
</form>
	<form  method='POST' action='sterge_student.php'>
<input type='text' name='matricol' />
<input type='submit' value='Remove_student' />
</form>
	<form  method='POST' action='foaie_matricola.php'>
<input type='text' name='matricol' />
<input type='submit' value='Foaie_matricola' />	
</form>
</body>
</html>