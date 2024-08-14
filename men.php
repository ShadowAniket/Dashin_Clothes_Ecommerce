<?php


include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location: logandreg.php');
}


if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location: logandreg.php');
};


if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name ='$product_name' AND user_id = '$user_id'  ") or die('query failed');

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'Product Already Added to Cart!';
    }else{
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity') ") or die('query failed');
        $message[] = 'Product Added to Cart...';
    }
    
}

?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="css/styleprod1.css">

    <style>

        .product img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;

        }
        #featured > div.row.mx-auto.container > nav > ul > li.page-item.active > a{
            background-color: black;
        }
        #featured > div.row.mx-auto.container > nav > ul > li:nth-child(n):hover>a{
            background-color: coral;
            color: white;
        }

        .pagination a{
            color: #000;

        }

        </style>


</head>
<body>
    
<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';

    }
}   
?> 

<?php
    $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id ='$user_id' ") or die('query failed');
    if(mysqli_num_rows($select_user) > 0){
        $fetch_user = mysqli_fetch_assoc($select_user);
    };


?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container">
          <a style="font-weight:bold" class="navbar-brand" href="newindex.php">DASHIN</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
       
              <li class="nav-item">
                <a class="nav-link active" href="newindex.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="">Welcome <?php echo $fetch_user['name']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="men.php">Men</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="women.php">Women</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kids.php">Kids</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="trynew2latest/index.html">Log-In</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="products.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to Logout?'); ">Log-Out</a>
              </li>
              <!-- <li class="nav-search" >
                <input placeholder="Search Dashin" style="font-style: italic" >
             </li> -->
              <li class="nav-item">
                <i class="fal fa-search"></i>
                <a href="cart.php" class="fal fa-shopping-bag" ></a>
                <i class="fal fa-user"></i>
              </li>
            
          </div>
        </div>
      </nav>  

        
<section id="featured" class="my-5 py-5">
  

  <div class="container  mt-5 py-5">
      <h2 class="font-weight:bold">Our Featured Products</h2>
      <hr >
      <p STYLE="font-style:italic">Below is our featured and latest products at  <SPAN STYLE="font-weight:bold"> DASHIN </SPAN>.</p>
  </div>

  <div class="row mx-auto container">

<!-- 
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/6.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hoodie(Maroon)</h5>
          <h4 class="p-price">1699.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div> -->
     
      
  


      
      <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products` ") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
      while($fetch_product = mysqli_fetch_assoc($select_product)){
      ?>  
      <div class="product text-center col-lg-3 col-md-4 col-12">
      <form method="post" class="box" action="">
      <img class="item-fluid mb-3" src="img/<?php echo $fetch_product['image']  ?>" alt="">
      <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
      <h5 class="p-name"><?php echo $fetch_product['name']  ?></h5>
      <h4 class="p-price">Rs. <?php echo $fetch_product['price']  ?></h4>
      <input type="number" min="1" name="product_quantity" value="1" class='form-control'>
      <!-- <br>
      <br> -->
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']  ?>">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']  ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']  ?>">
      <button type="submit" value="AddtoCart" name="add_to_cart" class="buy-btn">Add To Cart</button>
       



      </form>
      </div>


  <?php
          };
      };
?>



<!-- <div class="container">
<div class="shopping-cart">
  <h1 class="heading">Shopping Cart</h1>
  <table>
      <thead>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          <th>quantity</th>
          <th>total price</th>
          <th>action</th>
      </thead>
      <tbody>
      <?php
          $grand_total = 0;
          $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id' ") or die('query failed');
          if(mysqli_num_rows($cart_query) > 0){
          while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
          <tr>
              <td><img src="img/<?php echo $fetch_cart['image']; ?>" height= 100 alt=""></td>
              <td><?php echo $fetch_cart['name']; ?></td>
              <td>Rs. <?php echo $fetch_cart['price']; ?></td>
              <td>
                  <form action="" method="post">
                      <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                      <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                      <input type="submit" name="update_cart" value="update" class="option-btn">
                  </form>
              </td>
              <td>Rs. <?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'] ; ?></td>
              <td><a href="products.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Remove Item from Cart?');">Remove</a></td>
          </tr>
      <?php 
          $grand_total += $sub_total;
            };
          }else{
              echo '<tr><td style="padding:20px; text-transform:capitalize;"  colspan="6">No Item added...</td></tr>' ;
          }
      ?>
      <tr class="table-bottom">
          <td colspan="4">Grand Total : </td>
          <td>Rs. <?php echo $grand_total; ?></td>
          <td><a href="products.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Delete All Items from Cart?');">Delete All</a></td>
      </tr>






  </tbody>
  </table>



  <div class="cart-btn">
      <a href="#" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
  </div>

  </div>
</div> -->










<div>


      <!-- <div  onclick="window.location.href='sproduct.html' " class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/shop/1.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">T-shirt(Navy)</h5>
          <h4 class="p-price">999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div onclick="window.location.href='sproduct.html' "  class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/3.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Laptop Bag(Blue)</h5>
          <h4 class="p-price">1299.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/4.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Beanie(Pink)</h5>
          <h4 class="p-price">359.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>



      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/5.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Beanie(Grey)</h5>
          <h4 class="p-price">359.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/6.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hoodie(Maroon)</h5>
          <h4 class="p-price">1699.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

       <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/7.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Canvas Shoes(Blue)</h5>
          <h4 class="p-price">1099.00 Rs</h4>
          <button class="buy-btn">Add to cart</button>
      </div> -->

     <!-- 
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/8.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hoodie(Indigo)</h5>
          <h4 class="p-price">1699.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/9.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Backpack(Green)</h5>
          <h4 class="p-price">1699.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/10.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Watch(Kodex)</h5>
          <h4 class="p-price">900.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/11.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hat(Teal)</h5>
          <h4 class="p-price">999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/12.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Sneakers(White)</h5>
          <h4 class="p-price">1299.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/13.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Watch(Marble)</h5>
          <h4 class="p-price">1359.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/14.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Ankle Boot(Brown)</h5>
          <h4 class="p-price">1200.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/15.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Cap(Grey)</h5>
          <h4 class="p-price">999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/16.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Shirt(Pink)</h5>
          <h4 class="p-price">999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/17.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Jacket(Adventurer)</h5>
          <h4 class="p-price">1359.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/18.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Cap(Simpson)</h5>
          <h4 class="p-price">900.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/19.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Hoodie(Black)</h5>
          <h4 class="p-price">999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/22.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">School Bag(Sky Blue)</h5>
          <h4 class="p-price">699.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="item-fluid mb-3" src="img/featured/21.jpg" alt="">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Coat(Matte Black)</h5>
          <h4 class="p-price">1999.00 Rs</h4>
          <button class="buy-btn">Buy Now</button>
      </div> -->






      
      


      <!-- <nav aria-label="...">
          <ul class="pagination mt-5">
            <li class="page-item disabled">
              <a class="page-link">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item " aria-current="page">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav> -->
        </div>



      
  </div>
</section>

  <!-- <section id="featured" class="my-5 py-5">
    <div class="container  mt-5 py-5">
        <h2 class="font-weight:bold">Our Featured Products</h2>
        <hr >
        <p STYLE="font-style:italic">Below is our featured and latest products at  <SPAN STYLE="font-weight:bold"> DASHIN </SPAN>.</p>
    </div>
    <div class="row mx-auto container">
        <div  onclick="window.location.href='sproduct.html' " class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/shop/1.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">T-shirt(Navy)</h5>
            <h4 class="p-price">999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div onclick="window.location.href='sproduct.html' "  class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/3.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Laptop Bag(Blue)</h5>
            <h4 class="p-price">1299.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/4.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Beanie(Pink)</h5>
            <h4 class="p-price">359.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/5.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Beanie(Grey)</h5>
            <h4 class="p-price">359.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/6.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Hoodie(Maroon)</h5>
            <h4 class="p-price">1699.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/7.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Canvas Shoes(Blue)</h5>
            <h4 class="p-price">1099.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/8.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Hoodie(Indigo)</h5>
            <h4 class="p-price">1699.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/9.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Backpack(Green)</h5>
            <h4 class="p-price">1699.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>

        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/10.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Watch(Kodex)</h5>
            <h4 class="p-price">900.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/11.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Hat(Teal)</h5>
            <h4 class="p-price">999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/12.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Sneakers(White)</h5>
            <h4 class="p-price">1299.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/13.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Watch(Marble)</h5>
            <h4 class="p-price">1359.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>

        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/14.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Ankle Boot(Brown)</h5>
            <h4 class="p-price">1200.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/15.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Cap(Grey)</h5>
            <h4 class="p-price">999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/16.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Shirt(Pink)</h5>
            <h4 class="p-price">999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/17.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Jacket(Adventurer)</h5>
            <h4 class="p-price">1359.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>

        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/18.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Cap(Simpson)</h5>
            <h4 class="p-price">900.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/19.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Hoodie(Black)</h5>
            <h4 class="p-price">999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/22.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">School Bag(Sky Blue)</h5>
            <h4 class="p-price">699.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="item-fluid mb-3" src="img/featured/21.jpg" alt="">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Coat(Matte Black)</h5>
            <h4 class="p-price">1999.00 Rs</h4>
            <button class="buy-btn">Buy Now</button>
        </div>

        <nav aria-label="...">
            <ul class="pagination mt-5">
              <li class="page-item disabled">
                <a class="page-link">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item " aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>




        
    </div>
  </section> -->



  <!--Footer-->
  <footer class="mt-5 py-5">
    <div class="container mx-auto">
        <div class="row pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <a class="navbar-brand"><h5>DASHIN</h5></a>
                <p class="pt-3">The copyright notice usually includes the © symbol (copyright symbol), the year of publication, and the name of the copyright owner.</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase list-unstyled">
                    <li><a href="men.html">Men</a></li>
                    <li><a href="women.html">Women</a></li>
                    <li><a href="kids.html">Kids</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3 " >
                <h5 class="pb-2">Contact-Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>123 STREET NAME, MUMBAI, INDIA</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>(123) 456-7890</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>mail@example.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5 class="pb-2">Social</h5>
                <div class="row">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/1.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/2.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/3.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/4.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/5.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="row container mx-auto">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <img src="img/payment.png" alt="">
            </div>
            <div class="col-lg-4 col-md-6 col-12 text-nowrap mb-2">
                <p>DASHIN eCommerce &copy; 2024. All Rights Reserved.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>                    
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>



   
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

