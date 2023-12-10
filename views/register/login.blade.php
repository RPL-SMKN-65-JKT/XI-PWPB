<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
   
   
    <title>Login Perpustakaan</title>
    @vite('resources/css/app.css')
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
 

    <section class="w-[900px] bg-white p-[25px] flex flex-col rounded-lg">
       @if (session()->has('failed')) 
       <script>
        Swal.fire({
            title: "Oops...",
            text: " {{session('failed')}}!",
            icon: "error"
            });
    </script>
     
       @endif 

     
      <header class="text-center font-bold text-2xl pb-5">Masuk</header>
      <p class="text-center pb-10 ">Masukkan informasi akun yang terdaftar untuk menjelajah perpustakaan!</p>
      <form action="" class="form" method="post">
        @csrf
          <div class="flex flex-col gap-1 "> 
            <div class="input-box text-center mb-5">
              <label for="username" class="font-bold flex ml-44 pb-2">Username</label>
              <input class="w-[531px] bg-[#F0F0F0] rounded-xl border border-[#D6D6D6]" name="username" type="text" placeholder="Buat Username" required />
            </div>
            <div class="input-box text-center">
              <label class="font-bold flex ml-44 pb-2">Password</label>
              <input class="w-[531px] p-3  bg-[#F0F0F0] rounded-xl border border-[#D6D6D6]"  name="password" type="password" id="password" placeholder="Buat Password" required />
            </div>
           
          </div>    
        </div>
        <button class="w-[531px] ml-40" type="submit" name="submit">Sign In</button>

        <p class="text-center p-10">Tidak punya akun?<a class="text-[#F637EC]" href="/register">Daftar sekarang!</a></p>
      </form>
    </section>
   
    
  </body>

  <style>
    /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: linear-gradient(108deg, #FDFF89 0%, #FFE91F 100%);
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;

  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form button {
  height: 55px;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  border-radius: 12px;
  background:rgb(253 224 71);
}
.form button:hover {
  
  background: linear-gradient(270deg, #FDFF89 0%, #FFE91F 100%);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
  </style>
</html>