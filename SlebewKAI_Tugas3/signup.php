<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: menu.php");
}

if (isset($_POST['submit'])) {
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 
 if (strip_tags($username) == $username) {
 if ($password == $cpassword) {
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
   $sql = "INSERT INTO users (username, email, password)
     VALUES ('$username', '$email', '$password')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
    $username = "";
    $email = "";
    $_POST['password'] = "";
    $_POST['cpassword'] = "";
   } else {
    echo "<script>alert('Eror bund nih')</script>";
   }
  } else {
   echo "<script>alert('Email itu udah ada bund')</script>";
  }
  
 } else {
  echo "<script>alert('Salah passwordnya bund')</script>";
 }
} else {
     echo "<script>alert('Eror tags html')</script>";
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="img/kai.png" sizes="192x192">
    <title>SLEBEW TIKET KAI</title>
    <meta name="description" content="SLEBEW TIKET KAI">
    <meta name="image" src="img/kai.png">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
    <meta name="theme-color" content=#123abc>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg p-3 mb-3 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.html">
                <img src="img/kai.png" alt="" width="25" height="25" class="d-inline-block align-text-top"> SLEBEW TIKET KAI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link activate" aria-current="page" href="index.php">Rumah</a>
                            <a class="nav-link" href="rute.html">Rute</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-xxl">
                <div class="container py-5 px-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s"  data-aos="fade-up" data-aos-duration="1000">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-user text-primary mb-4"></i>
                                <h5 class="mb-3 fw-bold">Register</h5>
                                <form action="" method="POST">
                                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                                <br>
                                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                                <br>
                                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                                <br>
                                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                                <hr>
                                <button name="submit" class="btn orange fw-bold m-1">Register</button>
                                </form>
                                <p class="m-0 text-dark">Anda sudah punya akun? <a href="index.php">Login </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <footer class="section bg-footer blue">
   <div class="container">
           <h6 class="footer-heading text-center text-uppercase text-white">&#9400; SLEBEW KAI</h6>
       </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
       <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
       <script>
           AOS.init();
        </script>
</body>
</html>
