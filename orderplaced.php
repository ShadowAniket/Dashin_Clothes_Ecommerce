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

?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Dashin</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="css/stylechckout.css">
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
        $select_user = mysqli_query($conn, "SELECT  * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
?>


    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container">
          <a style="font-weight:bold" class="navbar-brand" href="linktoboldhere">DASHIN</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link active" href="index.html"> <?php echo $fetch_user['name']; ?></a>
              </li>
              <li><a href=""></a></li>
    

              <li class="nav-item">
                <a class="nav-link active" href="newindex.php">Home</a>
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
  <br>
  <br>
  <br>
  <section id="thank-you">
    <div class="container">
        <h1><span>Thank you <?php echo $fetch_user['name']; ?>, for Shopping</span><br> at DASHIN</h1>
        <p>Your order has been received and is being processed.<br> We will notify you when your order ships in the mail.</p>
        <h4>Come visit us again soon!</h4>
        <button class="btn btn-primary">Continue Shopping 
            <a href="products.php"><i class="fa fa-arrow-right"></i></a>
        </button>
    </div>
</section>

 <!-- <section id="checkout" class="container py-5">
    
        <div class="row">
            <div class="col-md-6">
                <h2>Billing Information</h2>
                
                <form>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email address">
                    </div>
                    <div class="form-group">
                        <label for="Baddress">Billing Address</label>
                        <input type="Baddress" class="form-control" id="Baddress" placeholder="Enter your billing address">
                    </div>
                    <div class="form-group">
                        <label for="City">City</label>
                        <input type="City" class="form-control" id="City" placeholder="Enter your city">
                    </div>
                    <div class="form-group">
                        <label for="State">State</label>
                        <input type="State" class="form-control" id="State" placeholder="Enter your State">
                    </div>
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="Country" class="form-control" id="Country" placeholder="Country">
                    </div>
                    
                </form>
            </div>
            <div class="col-md-6">
                <h2>Payment Information</h2>
                
                <form>
                    <div class="form-group">
                        <label for="CardHolderName">CardHolder Name</label>
                        <input type="text" class="form-control" id="expiryDate" placeholder="fullName">
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">Credit Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="Enter your card number">
                    </div>
                   
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="password" class="form-control" id="cvv" placeholder="123">
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="text-center mt-4"> 
           <button class="btn btn-primary">Place Order</button>
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
