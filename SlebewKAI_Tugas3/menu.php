<?php 

session_start();

if (!isset($_SESSION['username'])) {
   header("location:index.php");
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
        
        <link rel="shortcut icon" href="favicon.ico">
        <title>SLEBEW TIKET KAI</title>
        <meta name="description" content="SLEBEW TIKET KAI">
        <meta name="image" src="img/kai.png">
        <!-- Custom Styles -->
        <link rel="stylesheet" href="css/style.css">
        
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
        <meta name="theme-color" content=#123abc>
    </head>
    <body class="bg-black">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg p-3 mb-3 sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="index.php">
                <img src="img/kai.png" alt="" width="25" height="25" class="d-inline-block align-text-top"> SLEBEW TIKET KAI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link activate" aria-current="page" href="index.php">Rumah</a>
                        <a class="nav-link" href="rute.html">Rute</a>
                        <div class="dropdown-toggle">
                          <p class="m-0 text-grey"><?php echo "Selamat datang, ". $_SESSION['username']; ?></p>
                        <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <h2 class="fw-bold text-white text-center" data-aos="fade-up" data-aos-duration="1000"><?php echo "Selamat datang, ". $_SESSION['username']; ?></h2>
            <div class="container-xxl">
                <div class="container py-5 px-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s"  data-aos="fade-up" data-aos-duration="1000">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <i class="fa fa-3x fa-ticket-alt text-primary mb-4"></i>
                                <h5 class="mb-3 fw-bold">Pesen Tiket KAI</h5>
                                <p class="m-0 text-dark">Klik di sini buat dapetin tiket kamu!<br></p>
                                <hr>
                            <a href="tiket.php"><button type="button" class="btn orange fw-bold m-1">Pencet</button></a>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s"  data-aos="fade-up" data-aos-duration="1000">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <i class="fa fa-3x fa-user text-primary mb-4"></i>
                            
                            <h5 class="mb-3 fw-bold">About Kelompok</h5>
                            <p class="m-0 text-dark">Klik di sini buat liat Kelompok SLEBEW!<br></p>
                            <hr>
                        <a href="about.php"><button type="button" class="btn orange fw-bold m-1">Pencet</button></a>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s"  data-aos="fade-up" data-aos-duration="1000">
                    <div class="feature-item bg-light rounded text-center p-4">
                    <i class="fa fa-3x fa-train text-primary mb-4"></i>
                        <h5 class="mb-3 fw-bold">Nama KAI</h5>
                        <p class="m-0 text-dark">Klik di sini buat liat KAI<br></p>
                        <hr>
                    <a href="list.php"><button type="button" class="btn orange fw-bold m-1">Pencet</button></a>
                </div>
            </div>
            </div>
        </div>
    </div>
        <div class="scroll-right">
        <div class="inner">
        <img src="img/keretaapi.gif" alt="Kereta Api">
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
