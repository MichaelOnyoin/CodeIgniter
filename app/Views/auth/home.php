<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to home page</h1>
    <?php 
    
    $session=session();
    $user_details=$session->get('user_details');
    //echo "<pre>"; print_r($user_details);
    $firstname=$user_details[0];
    $lastname=$user_details[1];
    echo "Welcome ";
    echo $firstname." ".$lastname ;
    ?>
</body>
</html>