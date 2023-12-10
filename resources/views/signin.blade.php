<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/signin.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>

  <div class="card">
    <h1>Sign in</h1>

    
    <form action="/signin" method="POST">
      @csrf
      <div class="mb-6">
        <label for="email" class="text-left pl-8 block mb-2 text-sm font-normal text-gray-500 dark:text-white">Email</label>
        <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email" required>
      </div>
      <div class="mb-6">
        <label for="password" class="text-left pl-8 block mb-2 text-sm font-normal text-gray-500 dark:text-white">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Password" required>
      </div>
      <div class="flex items-start justify-center mb-6">
        <div class="flex items-center  h-5">
          <input id="remember_me" type="checkbox" name="remember_me" class="w-4 h-4 border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
        </div>
        <label for="remember_me" id="label" class="ml-2 text-sm font-bold text-gray-900 dark:text-gray-300">Remember me</label>
      </div>
      @if (session('error'))
        <p class="text-red-600 text-lg">{{ session('error') }}</p>
      @endif
      <hr class="pb-8">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-xl text-2xl w-full h-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign In</button>
    </form>
    <h4>Belum mempunyai akun? <a href="/signup">Sign Up</a></h4>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>
</html>