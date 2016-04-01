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
    $name = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $materie = $_POST['materie'];
    $valoare = $_POST['valoare'];



$stid = oci_parse($conn, ' begin database_admin.inserare_note(:nume, :prenume, :materie, :valoare); end;');
if (!$stid) {
    $e = oci_error($conn);  // For oci_parse errors pass the connection handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
}
oci_bind_by_name($stid, ':nume', $nume);
oci_bind_by_name($stid, ':prenume', $prenume);
oci_bind_by_name($stid, ':materie', $materie);
oci_bind_by_name($stid, ':valoare', $valoare);
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

	echo 'Operatie reusita!';
}

oci_free_statement($stid);
oci_close($conn);

?>

</head>
<body>
	</body>
</html>