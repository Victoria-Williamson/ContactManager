
var url = "http://localhost:8000/";
//    Sign In UI -> Create Account UI
function needAccount()
{
    console.log(url + "pages/login_page/signup_page.php");
    document.location = url + "pages/login_page/signup_page.php";
    
}
//    Create Account UI -> Sign In UI
function hasAccount()
{
    document.location = url + "pages/login_page/login_page.php";
}
// Allows the User to Log into their account 
function doLogin(ext)
{
    console.log("Document Location ", document.location);
    // Get all the neccessary values
    
   
    var username = document.getElementById("username-"+ ext).value;
    var password = document.getElementById("password-" + ext).value;

    document.getElementById("username-" + ext).innerHTML = "";
    document.getElementById("password-" + ext).innerHTML = "";

    // Check that the login credentials are correct


    // If the credentials are correct allow the user to be logged in
    // and access the contact page
    console.log("User: " + username + "Found, Logging in...");
    document.location = url + "pages/contact_page/contact_page.php";
}

function doSignUp()
{

}

function doLogOut()
{

}

function doForgotPassword()
{

}