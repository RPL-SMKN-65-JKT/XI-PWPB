<?php
$data = file_get_contents("json/kereta.json");
$data = json_decode($data, true);

session_start();

if (!isset($_SESSION['username'])) {
   header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
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
                         <div class="dropdown-toggle">
                          <p class="m-0 text-grey"><?php echo "Selamat datang, ". $_SESSION['username']; ?></p>
                        <a href="logout.php">Logout</a>
                        </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container text-white">
        <h1 class="text-center fw-bold" data-aos="fade-up" data-aos-duration="1000">NAMA KERETA</h1>
    </div>
    <div class="container">
        <table class="table table-striped table-bordered table-condensed bg-white text-center" data-aos="fade-up" data-aos-duration="1000">
            <thead>
                <tr class="head">
                    <th class="text-white">&zwnj;No</th>
                    <th class="text-white">&zwnj;Nama KA</th>
                    <th class="text-white">&zwnj;Relasi Perjalanan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($a = 0; $a < count($data); $a++){
                    print "<tr>";
                    print "<th>".$data[$a]["no"]."</th>";
                    print "<td>".$data[$a]["nama"]."</td>";
                    print "<td>".$data[$a]["relasi"]."</td>";
                    print "</tr>";
                }
                ?>
            </tbody>
        </table>
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