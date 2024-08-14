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
    <title>Blog</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
        $select_user = mysqli_query($conn, "SELECT  * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
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

      <section id="blog-home" class="pt-5 mt-5 container">
       
            <h2 class="font-weight-bold pt-5">Blogs</h2>
            <hr>
       
      </section>
      
      <section id="blog-container" class="container pt-5">
        <div class="row">  
            <div class="post col-lg-6 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/1.jpg" alt="" >
                </div>
                <h3 class="text-center font-weight-normal pt-3">The best ways to change your Summer wardrobe into Autumn wardrobe</h3>
                <p class="text-center">Jan 21, 2024</p>
            </div>

            <div class="post col-lg-6 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/2.jpg" alt="" >
                </div>
                <h3 class="text-center font-weight-normal pt-3">Men's fashion in leather</h3>
                <p class="text-center">Mar 13, 2024</p>
            </div>

            <div class="post col-lg-6 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/3.jpg" alt="" >
                </div>
                <h3 class="text-center font-weight-normal pt-3">Youtuber and TV host Kristina Hershberger's journey through gaming keeps evolving</h3>
                <p class="text-center">June 26, 2023</p>
            </div>

            <div class="post col-lg-6 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/4.jpg" alt="" >
                </div>
                <h3 class="text-center font-weight-normal pt-3">The best ways to change your Winter wardrobe into Summer wardrobe</h3>
                <p class="text-center">Jan 22, 2024</p>
            </div>

            <div class=" col-lg-12 col-md-12 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/banner.webp" alt="" >
                </div>
            </div>

            <div class="post col-lg-4 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/1.webp" alt="" >
                </div>
                <h4 class=" font-weight-normal pt-3">The best ways to change your Summer wardrobe</h4>
                
            </div>

            <div class="post col-lg-4 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/3.webp" alt="" >
                </div>
                <h4 class=" font-weight-normal pt-3">Lenovo's smarter devices stoke professional passions</h4>
               
            </div>

            <div class="post col-lg-4 col-md-6 col-12 pb-5">
                <div class="post-img">
                    <img class="img-fluid w-100" src="img/blog/2.webp" alt="" >
                </div>
                <h4 class=" font-weight-normal pt-3">Take a 3-D tour through Microsoft's datacenter</h4>
               
            </div>
        </div>

       
        <h2 class="font-weight-bold pt-5">Blogs</h2>
        <hr>
   
        </section>

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
