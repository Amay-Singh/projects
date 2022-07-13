<html>
<head><title>Oracle demo</title></head>
<body>
    <?php 
    $conn=oci_connect("SYSTEM","30xx525","localhost/orcl");
    if (!$conn)
        echo 'Failed to connect to Oracle';

 

?>
 
