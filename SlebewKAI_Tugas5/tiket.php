<?php 

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
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://booking.kai.id/css/slick.css" rel="stylesheet">
    <link href="https://booking.kai.id/css/print.css" rel="stylesheet">
    <link href="https://booking.kai.id/css/jquery.flexdatalist.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://booking.kai.id/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="https://booking.kai.id/css/custom.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        
        <link rel="icon" href="img/kai.png" sizes="192x192">
        <title>SLEBEW TIKET KAI</title>
        <meta name="description" content="SLEBEW TIKET KAI">
        <meta name="image" src="img/kai.png">
        <!-- Custom Styles -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <h3 class="fw-bold text-white text-center" data-aos="fade-up" data-aos-duration="1000">PESAN TIKET</h3>
            <div class="container-xxl">
                <div class="container py-5 px-lg-5">
                    <div class="row g-4">
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s"  data-aos="fade-up" data-aos-duration="1000">
                            <div class="feature-item bg-light rounded text-center p-4">
                                <form method="GET" action="https://booking.kai.id" accept-charset="UTF-8" class="booking" id="searchticket" data-toggle="validator" role="form" autocomplete="off">
                                    <p class="m-0 text-dark">Stasiun Asal<br></p>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-train fa" aria-hidden="true"></i></span>
                                        <input type="text" name="origination" value="" id="origination" class="form-control letter" placeholder="Stasiun Asal..."
                                            data-data="https://booking.kai.id/api/stations2"
                                            data-search-in='["name","code","cityname"]'
                                            data-min-length="1"
                                            data-value-property="code"
                                            data-text-property="name"
                                            data-visible-properties='["name","code"]'
                                            data-selection-require="true">
                                    </div>
                                    <p class="m-0 text-dark">Stasiun Tujuan<br></p>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-train fa" aria-hidden="true"></i></span>
                                        <input type="text" name="destination" value="" id="destination" class="form-control letter" placeholder="Stasiun Tujuan..."
                                            data-data="https://booking.kai.id/api/stations2"
                                            data-search-in='["name","code","cityname"]'
                                            data-min-length="1"
                                            data-value-property="code"
                                            data-text-property="name"
                                            data-visible-properties='["name","code"]'
                                            data-selection-require="true">
                                    </div>
                                    <p class="m-0 text-dark">Tanggal Berangkat<br></p>
                                    <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-check fa" aria-hidden="true"></i></span>
                                        <input type="text" name="tanggal" value="" id="departure_dateh" class="form-control no-type" data-error="Mohon diisi tanggal" required="required" onkeypress="return: false;">
                                    </div>
                                    <p class="m-0 text-dark">Dewasa<br></p>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="dewasa"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>

                                        <input class="form-control input-number number" name="adult" min="1" max="10" id="dewasa" type="text" value="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="dewasa"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                   <p class="m-0 text-dark">Bayi<br></p>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="infant"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>

                                        <input class="form-control input-number number" name="infant" min="0" max="10" id="infant" type="text" value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="infant"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                    <span class="tooltiptext">
                                        Tidak bisa melebihi penumpang dewasa
                                    </span>
<hr>
                                 <div class="col-md-3">
                                   <input class="btn sample btn-sample btn-search-booking" name="submit" type="submit" value="Cari &amp; Pesan Tiket">
                                </div>
                              </form>
                        </div>
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
        <script>
        BASE_URL = "https://booking.kai.id"+"/";
    </script>
    <script src="https://booking.kai.id/js/apps.js"></script>
    <script src="https://booking.kai.id/js/jquery-3.3.1.min.js"></script>
    <script src="https://booking.kai.id/js/bootstrap.min.js"></script>
    <script src="https://booking.kai.id/js/bootstrap-datepicker.min.js"></script>
    <script src="https://booking.kai.id/js/jquery.flexdatalist.min.js"></script>
    <script src="https://booking.kai.id/js/bootstrap-validate.js"></script>
    <script src="https://booking.kai.id/js/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script src="https://booking.kai.id/js/slick.min.js"></script>
    <script src="https://booking.kai.id/js/inputValidate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <!-- Inputmask -->
    <script src="https://booking.kai.id/js/inputmask/inputmask.js"></script>
    <script src="https://booking.kai.id/js/inputmask/jquery.inputmask.bundle.js"></script>
    <script src="https://booking.kai.id/js/inputmask/inputmask.numeric.extensions.js"></script>
    <script type="text/javascript">
    $(function() {
        let maxval = 4;
        //data list for station
        $('#origination, #destination').flexdatalist({
            minLength: 2,
            valueProperty: 'code',
            selectionRequired: true,
            visibleProperties: ["name","code"],
            searchIn: ['name','city','code','cityname'],
            groupBy: 'cityname',
            data: 'https://booking.kai.id/api/stations2'
        });

        //init slick slider/slick date
        let setCenter = '';
        $(".anotherdate").slick({
            centerMode: (setCenter==1 ? true : false),
            prevArrow: '<button class="prev btnx"><i class="fas fa-arrow-circle-left"></i></button>',
            nextArrow: '<button class="next btnx"><i class="fas fa-arrow-circle-right"></i></button>',
            slidesToScroll: 1,
            slidesToShow: 5,
            centerPadding: '60px',
            focusOnSelect:true,
            initialSlide: 0,
            responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
                }
            },
            {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
                }
            }]
        });
        $( "#accordion .panel-title" ).click(function() {
            $( this ).toggleClass( "current" );
            $(".top-column span").css("opacity","1");
        });

        localStorage.removeItem("captcha");

        //set max value and min value for passenger
        $('#dewasa').on('change keyup', function(){
            $('#infant').attr('max', $(this).val());
            //set infant number to 0
            if( Number($('#infant').val()) > Number($(this).val()) ) {
                $('#infant').val('0');
                $('.hidden-infant-slick').val( $('#infant').val() );
            }

            /* set hidden value for slick
             * if field adult & infant change
             */
            $('.hidden-adult-slick').val( $(this).val() );
        });
        $('#infant, .btn-number').on('click change keyup', function(){
            maxval = $('#dewasa').val();
            $('#infant').inputmask("numeric", {
                mask: "99",
                rightAlign: false,
                min: 0,
                max: maxval,
                default: 0
            });

            /* set hidden value for slick
             * if field adult & infant change
             */
            $('.hidden-infant-slick').val( $('#infant').val() );
        });
        // $('#infant').change();
        $('#dewasa').inputmask("numeric", {
            mask: "99",
            rightAlign: false,
            min: 1,
            max: 10
        });
    });

    APP.initDate( $('#departure_dateh').val(), '2020,1,01',  [["01","01","Tahun Baru Masehi"],["02","01","Tahun Baru Imlek"],["02","28","Isra Mi'raj"],["03","3","Hari Raya Nyepi"],["04","15","Wafat Isa Al Masih"],["05","01","Hari Buruh"],["05","02","Hari Raya Idul Fitri"],["05","03","Hari Raya Idul Fitri"],["05","16","Hari Waisak"],["05","26","Kenaikan Isa Almasih"],["06","01","Hari Lahir Pancasila"],["07","09","Idul Adha"],["07","30","Tahun Baru Islam H 1444"],["08","17","Hari Kemerdekaan RI"],["10","08","Maulid Nabi Muhammad SAW"],["12","24","Cuti Bersama Hari Natal"],["12","25","Hari Natal"]]);
    APP.showDate( $('#departure_dateh').val() );
    APP.addPassengerVal('.btn-number');
    APP.filterSchedule();
    APP.noAllowType();
</script>
    </body>
</html>
