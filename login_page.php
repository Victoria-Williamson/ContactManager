<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Necessary Style Sheets -->
        <script src="/endpoints/endpoints.js"></script>
        <link rel="stylesheet" href="/components/create_account_mobile/create_account_mobile.css">
        <link rel="stylesheet" href="/components/sign_in_mobile/sign_in_mobile.css">
        <link rel="stylesheet" href="/components/user_auth_desktop/user_auth_desktop.css">
        <link rel="stylesheet" href="./pages/login_page/styles.css">
        <title>Welcome to Contact Manager</title>
    </head>
    <body>
        <!-- Desktop user authentication UI breakpoint at 750px -->
        <div id="auth-desktop">
        <div id="content">
            <div id="auth">
            <div id="user-auth-card">
        <div id="card-sign-in">
       
            <text class="header"> Sign In</text>
            <div id="alert-signin-desktop" class="alert-msg">
        </div>  
            <div class="form">
                <label for="username">Email</label>
                <input id="username-signin-desktop" type="text" value="" placeholder="email@domain.com" name="email">
              </div>
              <div class="form">
                <label for="password">Password</label>
                <input id="password-signin-desktop" type="text" value="" placeholder="Password" name="name">
              </div>
              
              <div id="sign-in-btns">
                <button id="sign-in" onclick='doLogin("signin-desktop")'> Sign In </button>
                <a style="font-size: smaller"> Forgot Password? </a> </text>
              </div>
            
    </div>
    <div id="card-sign-up">
    <text class="header" style="color: white;"> Create An Account</text>
        <div id="alert-signup-desktop" class="alert-msg">
        </div>  
        <div class="form">
            <label for="firstname">Firstname</label>
            <input id="firstname-signup-desktop" type="text" value="" placeholder="John" name="name">
          </div>
          <div class="form">
            <label for="lastname">Email</label>
            <input id="lastname-signup-desktop" type="text" value="" placeholder="Doe" name="lastname">
          </div>
        <div class="form">
            <label for="username">Email</label>
            <input id="username-signup-desktop" type="text" value="" placeholder="email@domain.com" name="email">
          </div>
          <div class="form">
            <label for="password">Password</label>
            <input id="password-signup-desktop" type="text" value="" placeholder="Password" name="name">
          </div>
          <div class="form">
            <label for="password">Confirm Password</label>
            <input id="password-confirm-signup-desktop" type="text" value="" placeholder="Password" name="password">
          </div>
          <div class="form">
            <label for="number">Phone Number</label>
            <input id="number-signup-desktop" type="text" value="" placeholder="555-555-5555" name="number">
          </div>
            <button id="sign-up" onclick="doSignUp('signup-desktop')"> Sign Up </button>  
            
            
    </div>
    </div>
            </div>
        </div>
        </div>
    <!-- UI for mobile user authentication -->
    <div id="auth-mobile">
        <!-- UI for mobile user sign in -->
        <div id="auth-mobile-signIn" style="display: block;">
           
        
        <div id="card-sign-in-mobile">
        <text class="header"> Sign In</text>
            <div id="alert-signin-mobile" class="alert-msg">
        </div>  
            <div class="form">
                <label for="username">Email</label>
                <input id="username-signin-mobile" type="text" value="" placeholder="email@domain.com" name="email">
              </div>
              <div class="form">
                <label for="password">Password</label>
                <input id="password-signin-mobile" type="text" value="" placeholder="Password" name="name">
              </div>
              
              <div id="sign-in-btns">
                <button id="sign-in" onclick='doLogin("signin-mobile")'> Sign In </button>
                <a style="font-size: smaller"> Forgot Password? </a> </text>
              </div>
       
         <text> Need an account? <button onclick="needAccount()"> Sign Up now</button> </text>
    </div>
        </div>
    </div>
   
       
       
    </body>
    </html>