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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                    <a href="memberlist" class="active">
                        <span class="material-icons-sharp">person_outline</span>
                        <h3>Member List</h3>
                    </a>
                    <a href="booklist">
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
                <h1>Petugas Panel</h1>

                <div class="date">
                    <input type="date">
                </div>
                <br>
                <br>
                <table id="memberlist" class="order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>NIS</th>
                            <th>Joined Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Faiz Novascotia</td>
                            <td>12 RPL</td>
                            <td>00256</td>
                            <td>19-02-2023</td>
                            <th>
                                <form method="POST" action="">
                                <a href="" type="button"><span class="material-symbols-outlined">edit</span></a>
                                <a href="" type="button"><span class="material-symbols-outlined">visibility</span></a>
                                <!-- {{ method_field('DELETE') }}
                                {{ csrf_field() }} -->
                                <button type="submit"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Judul Buku</th>
                            <th>Kelas</th>
                            <th>NIS</th>
                            <th>Start date</th>
                            <th>Return date</th>
                        </tr>
                    </tfoot>
                </table>
            </main>

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
            </div>
        </div>
        <script src="resources/js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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

            new DataTable('#memberlist');
        </script>
    </body>
</html>