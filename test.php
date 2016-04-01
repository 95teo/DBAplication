
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

$stid = oci_parse($conn, ' begin login.verify_prof(:name, :password); end;');
if (!$stid) {
    $e = oci_error($conn);  // For oci_parse errors pass the connection handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
oci_bind_by_name($stid, ':name', $name,20);
oci_bind_by_name($stid, ':password', $passsword,20);
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
<form  method='POST' action='adauga_nota.php'>
<input type='text' name='nume' />
<input type='text' name='prenume' />
<input type='text' name='materie' />
<input type='text' name='valoare' />
<input type='submit' value='Add_mark' />
	</body>
</html>