<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Petugas Control Panel</title>
        <!---MATERIAL CDN--->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Two+Tone" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="tema/css/petugas.css">
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                    <div class="logo">
                        <img src="tema/img/65.png">
                        <h2>65<span class="primary"> LIBRARY</span></h2>
                    </div>
                    <div class="close" id="close-btn">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>

                <div class="sidebar">
                    <a href="petugas">
                        <span class="material-symbols-outlined">grid_view</span>
                        <h3>Panel</h3>
                    </a>
                    <a href="memberlist">
                        <span class="material-icons-sharp">person_outline</span>
                        <h3>Member List</h3>
                    </a>
                    <a href="booklist" class="active">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Book List</h3>
                    </a>
                    <a href="rentlist">
                        <span class="material-icons-sharp">receipt_long</span>
                        <h3>Rent List</h3>
                    </a>
                    <a href="notif">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Notifications</h3>
                        <span class="message-count">13</span>
                    </a>
                    <a href="accountinfo">
                        <span class="material-icons-sharp">settings</span>
                        <h3>Account Info</h3>
                    </a>
                    <a href="#">
                        <span class="material-icons-sharp">logout</span>
                        <h3>Logout</h3>
                    </a>
                </div>
            </aside>
            <main>
                <h1>Booklist</h1>
                <div class="date">
                    <input type="date">
                </div>
                
            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>Spitfirefaiz</b></p>
                            <small class="text-muted">Petugas</small>
                        </div>
                        <div class="profile-photo">
                            <img src="tema/img/spitfire.png">
                        </div>
                    </div>
                </div>
                <!-- <div class="add-book">
                    <a href="">
                        <span class="material-symbols-outlined">add_box</span><p>Add Book</p>
                    </a>
                </div>
                <div class="list-toggler">
                    <span class="material-symbols-outlined" href="booklisttable">list</span>
                    <span class="material-symbols-outlined active">grid_view</span>
                </div> -->
            </div>
            <br>
            <br>
                <h1>Comic</h1>
                <hr width="400px;" 
                color="#7380ec" 
                size="8" >
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
                <br>
                <br>
                <h1>Comic</h1>
                <hr width="400px;" 
                color="#7380ec" 
                size="8" >
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
                <br>
                <br>
                <h1>Comic</h1>
                <hr width="400px;" 
                color="#7380ec" 
                size="8" >
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
                <br>
                <br>
                <h1>Comic</h1>
                <hr width="400px;" 
                color="#7380ec" 
                size="8" >
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <i id="right-button" class="fa-solid fa-angle-right"></i>
                </div>
                <br>
                <br>
                <h1>Comic</h1>
                <hr width="400px;" 
                color="#7380ec" 
                size="8" >
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carousel">
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li class="card">
                        <div class="booklist">
                            <div class="booklist-content">
                                <img src="tema/img/jujutsu.png" alt="">
                                <div class="middle">
                                    <div class="left">
                                        <br>
                                        <h1>Jujutsu Kaisen</h1>
                                        <p>djsajdkajkakj</p>
                                        <br>
                                        <button><span class="material-symbols-outlined">edit_square</span></button>
                                        <button><span class="material-symbols-outlined">visibility</span></button>
                                        <button><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </main>
        </div>
        <style>
            .wrapper {
  max-width: 1300px;
  width: 100%;
  position: relative;
  margin-top: 10px;
}
.wrapper i {
  top: 50%;
  height: 50px;
  width: 50px;
  cursor: pointer;
  font-size: 1.25rem;
  position: absolute;
  text-align: center;
  line-height: 50px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 3px 6px rgba(0,0,0,0.23);
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}
.wrapper i:active{
  transform: translateY(-50%) scale(0.85);
}
.wrapper i:first-child{
  left: -22px;
}
.wrapper i:last-child{
  right: -22px;
}
.wrapper .carousel{
  display: grid;
  grid-auto-flow: column;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 16px;
  border-radius: 8px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}
.carousel::-webkit-scrollbar {
  display: none;
}
.carousel.no-transition {
  scroll-behavior: auto;
}
.carousel.dragging {
  scroll-snap-type: none;
  scroll-behavior: auto;
}
.carousel.dragging .booklist-content {
  cursor: grab;
  user-select: none;
}
.carousel :where(.booklist-content, .img) {
  display: flex;
  justify-content: center;
  align-items: center;
}
.carousel .booklist-content {
  scroll-snap-align: start;
  height: 550px;
  width: 300px;
  list-style: none;
  background: #fff;
  cursor: pointer;
  padding-bottom: 15px;
  flex-direction: column;
  border-radius: 8px;
}

@media screen and (max-width: 900px) {
  .wrapper .carousel {
    grid-auto-columns: calc((100% / 2) - 9px);
  }
}

@media screen and (max-width: 600px) {
  .wrapper .carousel {
    grid-auto-columns: 100%;
  }
}

.right{
    margin-top: 1.4rem;
}

.right .top{
    display: flex;
    justify-content: end;
    margin-top: -60px;
}

.right .top button{
    display: none;
}

.right .theme-toggler{
    background: var(--color-light);
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 1.6rem;
    width: 4.2rem;
    cursor: pointer;
    border-radius: var(--border-radius-1);
}

.right .theme-toggler span{
    font-size: 1.2rem;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.right .theme-toggler span.active{
    background: var(--color-primary);
    color: white;
    border-radius: var(--border-radius-1);
}

.right .top .profile{
    display: flex;
    gap: 2rem;
    text-align: right;
}
        </style>
        <script src="resources/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const sideMenu = document.querySelector("aside");
            const menuBtn = document.querySelector("#menu-btn");
            const closeBtn = document.querySelector("#close-btn");
            const themeToggler = document.querySelector(".theme-toggler");

            menuBtn.addEventListener('click', () => {
                sideMenu.style.display = 'block';
            })

            closeBtn.addEventListener('click', () => {
                sideMenu.style.display = 'none';
            })

            themeToggler.addEventListener('click', () => {
                document.body.classList.toggle('dark-theme-variables');

                themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
                themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
            })

            const wrapper = document.querySelector(".wrapper");
            const carousel = document.querySelector(".carousel");
            const firstCardWidth = carousel.querySelector(".card").offsetWidth;
            const arrowBtns = document.querySelectorAll(".wrapper i");
            const carouselChildrens = [...carousel.children];

            let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

            // Get the number of cards that can fit in the carousel at once
            let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

            // Insert copies of the last few cards to beginning of carousel for infinite scrolling
            carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
                carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
            });

            // Insert copies of the first few cards to end of carousel for infinite scrolling
            carouselChildrens.slice(0, cardPerView).forEach(card => {
                carousel.insertAdjacentHTML("beforeend", card.outerHTML);
            });

            // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");

            // Add event listeners for the arrow buttons to scroll the carousel left and right
            arrowBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
                });
            });

            const dragStart = (e) => {
                isDragging = true;
                carousel.classList.add("dragging");
                // Records the initial cursor and scroll position of the carousel
                startX = e.pageX;
                startScrollLeft = carousel.scrollLeft;
            }

            const dragging = (e) => {
                if(!isDragging) return; // if isDragging is false return from here
                // Updates the scroll position of the carousel based on the cursor movement
                carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
            }

            const dragStop = () => {
                isDragging = false;
                carousel.classList.remove("dragging");
            }

            const infiniteScroll = () => {
                // If the carousel is at the beginning, scroll to the end
                if(carousel.scrollLeft === 0) {
                    carousel.classList.add("no-transition");
                    carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
                    carousel.classList.remove("no-transition");
                }
                // If the carousel is at the end, scroll to the beginning
                else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
                    carousel.classList.add("no-transition");
                    carousel.scrollLeft = carousel.offsetWidth;
                    carousel.classList.remove("no-transition");
                }

                // Clear existing timeout & start autoplay if mouse is not hovering over carousel
                clearTimeout(timeoutId);
                if(!wrapper.matches(":hover")) autoPlay();
            }

            const autoPlay = () => {
                if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
                // Autoplay the carousel after every 2500 ms
                timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
            }
            autoPlay();

            carousel.addEventListener("mousedown", dragStart);
            carousel.addEventListener("mousemove", dragging);
            document.addEventListener("mouseup", dragStop);
            carousel.addEventListener("scroll", infiniteScroll);
            wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
            wrapper.addEventListener("mouseleave", autoPlay);
        </script>
    </body>
</html>