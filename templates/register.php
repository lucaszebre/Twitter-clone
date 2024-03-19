



  <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Register - mymeetic</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="../assets/register.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
    <body class="flex bg-gray-50 dark:bg-gray-900 min-h-[1200px]  mb-15 mt-13 overflow-x-hidden	 flex-col w-full h-screen  justify-center items-center overflow-none-y">
    
    <?php 
  session_start();
   

if($_SESSION["login"]){
  header('location:/index.php');
  exit();

}




?>

<div class="flex flex-col items-center justify-center w-screen h-screen  px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold  text-blue-300  dark:text-white">
          <img class="w-16 h-16 mr-2" src="../assets/twitter.png" alt="logo-twitter">
          Twitter   
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create and account
              </h1>
              <form id="registration" method="post" action="../src/includes/register.inc.php" class="space-y-4 md:space-y-6" >
                  
                  <div>
                      <label for="at_user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@username</label>
                      <input type="text"  name="at_user_name" id="at_user_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kihura" >
                        <span class="error text-red-500"></span>
                    </div>
                    <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">username</label>
                      <input type="text"  name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="manismeat" >
                        <span class="error text-red-500"></span>
                    </div>
                  <div>
                      <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                      <input type="date"  name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jolie" >
                        <span class="error text-red-500"></span>
                    </div>
                  <div>
                      <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                      <input type="text"  name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paris" >
                        <span class="error text-red-500"></span>
                    </div>
                 
                   
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" >
                        <span class="error text-red-500"></span>
                    </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <span class="error text-red-500"></span>
                    </div>
                  <div>
                      <label for="conpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                      <input type="password" name="conpassword" id="conpassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <span class="error text-red-500"></span>
                    </div>
                 
                  <div class="flex items-start">
                      <div class="flex flex-col items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                        <label  id="errorterms" for="terms" class="font-light text-red-500 dark:text-gray-300"><a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#"></a></label>
                    </div>
                      <div class="ml-3 text-sm">
                        <label  for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                      </div>

                  </div>
                  <button  id="submit" name="submit" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="../index.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                  </p> 
                  <?php
                  $error=$_GET["error"];

                  $message;
                  if($error=="emptyInput"){
                    $message= "You need to fill all the input";
                    
                  }else if($error=="passwordnotthesame"){
                    $message= "Password need to be the same";
                  }else if ($error=="alreadyregister"){
                    $message= "You are already register my g!";
                  } else if ($error=="useralreadyregister"){
                    $message= "You are already register my g!";
                  }  else if ($error=="usernametake"){
                    $message= "The username is already take!";
                  } 
                  // echo $message;
                  // echo $error;
                  if(!empty($message))
                  {

                  
                  ?>
                 

                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">
                    <?php echo $message ?>
                    
                     </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                  <?php
                  }
                  ?>
              </form>
          </div>
      </div>
  </div>

      

    
    </body>
    
</html>
