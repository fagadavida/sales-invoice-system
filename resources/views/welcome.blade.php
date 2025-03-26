<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS</title>
    <link rel="stylesheet" href="assets/css/login.css"/>
</head>
<body>
    <div class="login-container">

        <form class="login-form" action="{{ route('products.index')}}" id="login-for" method="g">
               @csrf
               <section style="display:flex;flex-direction:column;align-items:center;justify-content:center; width:100%;">
                   <h2 class="login-title"> Sign in</h2>
                   <div style="width:100px">
                       <img src="/images/user.png" />
                   </div>
                   <p>Point of Sole software</p>
              </section>

               <label for="Username">
                   <input type="text" id="Username" placeholder="Username" name="">
                   <span>Username</span>
               </label>
               <label for="Password">
                   <input type="password" id="Password" placeholder="Not required" name="">
                   <span>Password</span>
               </label>

                   <button type="submit" >Login</button>

           </form>

<p style="color: red; font-weight: 700; margin-top: 20px;">Sir, this is a mock login. Click on login to proceed</p>
       </div>
</body>
</html>
