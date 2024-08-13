<?php 
$db = \Config\Database::connect();




if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        $session_array_id=array_column($_SESSION['cart'],'id');
        if(!in_array($_GET['id'],$session_array_id)){
            $session_array= array(
                'id'=>$_GET['id'],
                "name"=>$_POST['name'],
                
                'price'=>$_POST['price'],
                'quantity'=>$_POST['quantity']);
        $_SESSION['cart'][]=$session_array;

        }

    }else{
        $session_array= array(
            'id'=>$_GET['id'],
            'name'=>$_POST['name'],
            // 'category'=>$_POST['category'], 
            // 'subcategory'=>$_POST['subcategory'], 
            'price'=>$_POST['price'],

            'quantity'=>$_POST['quantity']);
    $_SESSION['cart'][]=$session_array;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Cloth Cart</h2>
                    <!-- <h5 style="text-align:right;">Enjoy your shopping at Cibus  //echo $login_session; ?></h5> -->
                    <div class="col-md-12">
                        <div class="row">

                    
                    <?php
                     $sql="SELECT * FROM `fashion`";
                     $query   = $db->query($sql);
                     $result = $query->getResultArray();
                    

                    foreach($result as $row){ ?>
                    <div class="col-md-4">
                        <style>
                            img:hover{
                                border-radius:15%;
                                transform:scale(1.05);
                            }
                        </style>
                        <!--  -->
                      <form action="cart?id=<?=$row['fashion_id'] ?> " method="post">
                      


                      <img src="/assets/<?= $row["fashion_image"]; ?>" class="img" style="height:350px; padding:10px;">
                      <h5 class="text-center"><?= $row["fashion_item"];?> </h5>
                      <h5 class="text-center"><?= $row["category"];?> </h5>
                      <h5 class="text-center"><?= $row["subcategory"];?> </h5>
                      <h5 class="text-center">Ksh<?= number_format($row["unit_price"],1);?> </h5>

                      <input type="hidden" name="name" id="" value=" <?= $row['fashion_item'] ?>">
                      <input type="hidden" name="price" id="" value=" <?= $row['unit_price'] ?>">
                      <input type="number" name="quantity" id="" value="1" class="form-control">
                      <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-warning btn-block my-2" style="">

                      </form>  
                    </div>
                    <?php } ?>
                       </div>
                    </div>
                    
                    
                </div>
                
                <div class="col-md-12">
                    <h2 class="text-center">Item Selected</h2>
                    <?php
                    $total=0;
                    $output="";
                    $output="
                    <table class='table table-bordered table-striped'>
                    <tr>
                    <th>ID</th>
                    <th>fashion Item</th>
                    <th>fashion Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                    </tr>
                    ";
                    //var_dump($_SESSION['cart']);
                    
                    if(!empty($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => $value){
                            $output .="
                            <tr>
                            <td>".$value['id']."</td>
                            <td>".$value['name']."</td>
                            <td>".$value['price']."</td>
                            <td>".$value['quantity']."</td>
                            <td>Ksh".number_format($value['price'] * $value['quantity'])."</td>
                            <td><a href='cart?action=remove&id=".$value['id']."'>
                             <button class='btn btn-danger btn-block'>Remove</button>
                            </a></td>
                            </tr>
                            .";
                            $total=$total+$value['quantity']*$value['price'];
                        }
                        $output.="
                        <tr>
                        <td colspan='3'></td>
                        <td >Total Price</td>
                        <td>".number_format($total,1)."</td>
                        <td><a href='cart.php?action+clearall'>
                        <button class='btn btn-warning'>Clear All</button></a></td>
                        </tr>
                        <tr>
                        <td colspan='5'></td>
                        <td><a href='' ><button class='btn btn-warning'>Proceed to Payment</button></a></td>
                        </tr>
                        </table>";
                    }
                    echo $output ;
                    ?>
                    <?php
                        if(isset($_GET['action'])){
                            if($_GET['action']=="clearall"){
                                unset($_SESSION['cart']);
                            }
                            if($_GET['action']=="remove"){
                                foreach($_SESSION['cart'] as $key=>$value){
                                    if($value['id']==$_GET['id']){
                                        unset($_SESSION['cart'][$key]);
                                    }
                                }
                            }
                        }
                        ?>

                </div>
            </div>
        </div>
    </div>
 </body>
 </html>