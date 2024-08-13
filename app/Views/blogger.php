<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/jquerymin.js"></script>
    <title><?php $meta_title ?></title>
    <style>
        body{ 
            margin-left:20px ;
        }
        img:hover{
            
            transform: scale(1.05);
        }
    </style>
   
</head>
<body>
    
    <h1>Our blog</h1>
    <p>This is the blog page enjoy our content</p>
    <img src="/assets/web.jpg" alt="" >
    <script>
     //alert("Greeting Michael");
    </script>
    
    <li><a href="Blog/Shop">Blog</a></li>
    <li><a href="/blog/post">Post</a></li>

    <?= view_cell('\App\Libraries\Blogging::postItem') ?>
   
</body>
</html>