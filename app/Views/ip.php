<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Address</title>
</head>
<body>
    <h1>IP address </h1>
    <?php 
    
    $ipname=gethostbyaddr('192.168.137.1');
    printf($ipname);
    echo " <br> ";
    $ipadd=gethostbyname('D-Link');
    printf($ipadd);
   
    ?>
</body>
</html>