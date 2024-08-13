<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>
<body>
    <?php 
            $db = db_connect();
            //$db  = \Config\Database::connect('default');
            //$db->reconnect();
            
            $query   = $db->query('SELECT `user_id`, `email`, `firstname`, `lastname`, `password`, `gender`, `category`, `subcategory` FROM `user` ');
            $results = $query->getResultArray();
            echo "<pre>";

            print_r($results);
            echo "</pre>";

    foreach ($results as $row) {
        echo "<pre>";
        echo $row['email'];
        echo $row['firstname'];
        echo $row['lastname'];
        echo "</pre>";
    } 
      // DB credentials.
// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','ecommerce');

// // Establish database connection.
// try{

// $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,
// DB_USER, DB_PASS,
// array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
// }
// catch (PDOException $e)
// {
// exit("Error: " . $e->getMessage());
// }
// $sql = "INSERT INTO `user`(`user_id`, `email`, `firstname`, `lastname`, `password`, `gender`, `category`, `subcategory`) VALUES 
// (:`user_id`,:email,:firstname,:lastname,:`password`,:gender,:category,:subcategory)";
// $query = $dbh -> prepare($sql);
// $query->bindParam(':email',$email,PDO::PARAM_STR);
// $query->bindParam(':firstname',$firstname,PDO::PARAM_INT);
// $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
// $query->bindParam(':password',$password,PDO::PARAM_STR);
// $query->bindParam(':gender',$gender,PDO::PARAM_INT);
// $query->bindParam(':category',$category,PDO::PARAM_STR);
// $query->bindParam(':subcategory',$subcategory,PDO::PARAM_STR);


// // Insert the first row
// $email = "Joe@gmail.com";
// $firstname = "Joe";
// $lastname = "Incana";
// $password="123456";
// $gender="Male";
// $category="Men";
// $subcategory="Casual";



// $query -> execute();
// $lastInsertId = $dbh->lastInsertId();
// if($lastInsertId>0) { echo "OK"; } else { echo "not OK"; }




    ?>
</body>
</html>