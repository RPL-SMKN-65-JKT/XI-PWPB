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
                <h1>Add Book</h1>

                <div class="date">
                    <input type="date">
                </div>

        <div class="add-container">
            <form action="POST" class="form" action="/storebooklist" enctype="multipart/form-data">
                @csrf
                <div class="cover-box">
                <label>Cover Buku</label>
                <input type="file" class="form-control" name="cover" accept="image/*" onchange="document.getElementById('output').src = window.URL.createdObjectURL(this.file[0])" required>
                </div>
                <div class="column">
                <div class="input-box">
                    <label>Judul</label>
                    <input type="text" name="judul" placeholder="Tulis Judul Buku Disini" required />
                </div>
                <div class="input-box">
                    <label>Deskripsi</label>
                    <input type="text" name="judul" placeholder="Tulis Deskripsi/Sinopsis Disini" required />
                </div>
                </div>
                <div class="select-box">
                    <select>
                        <option hidden>Genre</option>
                        <option for="genre" value="romace" name="genre">Romance</option>
                        <option for="genre" value="comic" name="genre">Comic</option>
                        <option for="genre" value="novel" name="genre">Novel</option>
                        <option for="genre" value="fiction" name="genre">Fiction</option>
                        <option for="genre" value="nonfiction" name="genre">Non-Fiction</option>
                        <option for="genre" value="inspiration" name="genre">Inspiration</option>
                        <option for="genre" value="religious" name="genre">Religious</option>
                        <option for="genre" value="mystery" name="genre">Mystery</option>
                        <option for="genre" value="action" name="genre">Action</option>
                        <option for="genre" value="thriller" name="genre">Thriller</option>
                        <option for="genre" value="horror" name="genre">Horror</option>
                        <option for="genre" value="western" name="genre">Western</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
<style>
  .form-container {
  background: var(--color-white);
  padding: var(--card-padding);
  border-radius: var(--card-border-radius);
  margin-top: 1rem;
  margin-left: 80px;
  box-shadow: var(--box-shadow);
  transition: all 300ms ease;
  }
  
  .form-container:hover{
  box-shadow: none;
  }
  .form-group {
  margin-bottom: 20px;
  }
  label {
  display: block;
  margin-bottom: 5px;
  font-size: 15px;
  font-weight: bold;
  }
  input[type="text"],
  input[type="email"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  }
  input[type="file"] {
  margin-top: 5px;
  }
  input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  }
  .cover {
  width: 300px;
  height: 400px;
  object-fit: cover;
  margin-bottom: 10px;
  }
  </style>
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
        </script>
    </body>
</html>