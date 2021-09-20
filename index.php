
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Necessary Style Sheets -->
        <script src="/js/endpoints.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Maven+Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/components/create_account_mobile/create_account_mobile.css">
        <link rel="stylesheet" href="/components/sign_in_mobile/sign_in_mobile.css">
        <link rel="stylesheet" href="/components/user_auth_desktop/user_auth_desktop.css">
        <link rel="stylesheet" href="/css/login.css">
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
            <div class="form">
                <label for="username-desktop">Email</label>
                <input id="username-desktop" type="text" value="" placeholder="email@domain.com" name="email">
              </div>
              <div class="form">
                <label for="password">Password</label>
                <input id="password-desktop" type="text" value="" placeholder="Password" name="name">
              </div>
              <div id="sign-in-btns">
                <button id="sign-in" onclick='doLogin("desktop")'> Sign In </button>
               
              </div>
            
    </div>

    <div id="card-sign-up">
        <text class="header" style="color: white;"> Create An Account</text>
        <div class="form">
            <label for="email">Email</label>
            <input id="username-desktop" type="text" value="" placeholder="email@domain.com" name="email">
          </div>
          <div class="form">
            <label for="password">Password</label>
            <input id="password-desktop" type="text" value="" placeholder="Password" name="name">
          </div>
          <div class="form">
            <label for="password">Confirm Password</label>
            <input id="password-check-desktop" type="text" value="" placeholder="Password" name="password">
          </div>
          <div class="form">
            <label for="number">Phone Number</label>
            <input id="number-desktop" type="text" value="" placeholder="555-555-5555" name="number">
          </div>
            <button id="sign-up" onclick='doSignUp("desktop")'> Sign Up </button>
            
            
    </div>
    </div>
            </div>
        </div>
        </div>
    <!-- UI for mobile user authentication -->
    <div id="auth-mobile">
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
            <button onclick="hasAccount()"><text > Have an account? </text>
              <text id="switch" > Sign in now  </button>
</div>  
</div>
    </body>
    </html>
