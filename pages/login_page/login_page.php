
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Necessary Style Sheets -->
        <script src="../../endpoints/user_auth.js"></script>
        <link rel="stylesheet" href="../../components/create_account_mobile/create_account_mobile.css">
        <link rel="stylesheet" href="../../components/sign_in_mobile/sign_in_mobile.css">
        <link rel="stylesheet" href="../../components/user_auth_desktop/user_auth_desktop.css">
        <link rel="stylesheet" href="styles.css">
        <title>Welcome to Contact Manager</title>
    </head>
    <body>
        <!-- Desktop user authentication UI breakpoint at 750px -->
        <div id="auth-desktop">
        <div id="content">
            <div id="auth">
            <?php 
        include('../../components/user_auth_desktop/user_auth_desktop.html')?>
            </div>
        </div>
        </div>
    <!-- UI for mobile user authentication -->
    <div id="auth-mobile">
        <!-- UI for mobile user sign in -->
        <div id="auth-mobile-signIn" style="display: block;">
            <button onclick="needAccount()"></button>
        <div id="auth" onclick="needAccount()">
        <div id="card-sign-in-mobile">
       
       <text class="header"> Sign In</text>
       <div class="form">
           <label for="username">Username</label>
           <input id="username-mobile" type="text" value="" placeholder="insert your username" name="username">
         </div>
         <div class="form">
           <label for="password">Password</label>
           <input id="password-mobile" type="text" value="" placeholder="Password" name="name">
         </div>
         <div id="sign-in-btns">
           <button id="sign-in-mobile" onclick='doLogin("mobile")'> Sign In </button>
           <a> Forgot Password? </a> </text>
         </div> 
       
         <text> Need an account? <button onclick="needAccount()"> Sign Up now</button> </text>
    </div>
        </div>
    </div>
    <!-- UI for mobile user create -->
<div id="auth-mobile-create" style="display: none;">
<div id="card-sign-up-mobile">
        <text class="header"> Create An Account</text>
        <div class="form">
            <label for="email">Email</label>
            <input id="email" type="text" value="" placeholder="email@domain.com" name="email">
          </div>
          <div class="form">
            <label for="password">Password</label>
            <input id="password" type="text" value="" placeholder="Password" name="name">
          </div>
          <div class="form">
            <label for="password">Confirm Password</label>
            <input id="password" type="text" value="" placeholder="Password" name="password">
          </div>
          <div class="form">
            <label for="number">Phone Number</label>
            <input id="number" type="text" value="" placeholder="555-555-5555" name="number">
          </div>
            <button id="sign-up-mobile"> Sign Up </button>
            <text> Have an account? <button onclick="hasAccount()"> Sign In now</button> </text>
            
    </div>
</div>

</div>

       
       
    </body>
    </html>