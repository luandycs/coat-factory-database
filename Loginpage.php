<?php
include_once './includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Coat Factory Database Project Loginpage</title>
<link href="PageLayout.css" rel="stylesheet" />  

<script>
    function clientValidation(form) {
     // Validate the signup form   
     if (form.id == "Signup") 
     { 
        var signup_errors = 0;
    
      // first name and last name ñ only alphabetical 
      nameFilter = /^[a-zA-Z]+$/;   
    if (nameFilter.test(form.elements["firstname"].value ) == false) 
    { form.elements["firstname"].style.backgroundColor = "red";     
    signup_errors++;   } 
    else form.elements["firstname"].style.backgroundColor = "white";
     
    if (nameFilter.test(form.elements["lastname"].value ) == false) 
    { form.elements["lastname"].style.backgroundColor = "red";     
    signup_errors++;   } 
    else form.elements["lastname"].style.backgroundColor = "white"; 
    
      // email address -- <alphanumeric>@< alphanumeric >.< alphanumeric > 
      emailFilter = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[09]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;   
    if (emailFilter.test(form.elements["address"].value) == false) 
    {     form.elements["address"].style.backgroundColor = "red";     
    signup_errors++  ;   }
    else form.elements["address"].style.backgroundColor = "white";
    
      // password1 ñ minimum 8 characters 
       if (form.elements["password1"].value.length < 8) 
    {     form.elements["password1"].style.backgroundColor = "red";     
    signup_errors++;   }
    else form.elements["password1"].style.backgroundColor = "white";
    
      // password2 ñ must match password1  
    if (form.elements["password2"].value.length < 8) 
    {     form.elements["password2"].style.backgroundColor = "red";     
    signup_errors++;   }
    else form.elements["password2"].style.backgroundColor = "white";
    
    if (form.elements["password1"].value !== form.elements["password2"].value) 
    {  form.elements["password1"].style.backgroundColor = "red";     
    form.elements["password2"].style.backgroundColor = "red";     
    signup_errors++;   } 
    else {form.elements["password1"].style.backgroundColor = "white"; form.elements["password2"].style.backgroundColor = "white";} 
    
      // if error exists, disable submit button 
     if (signup_errors > 0)     
    form.elements["signupSubmit"].disabled = true;   
    else {     
    form.elements["signupSubmit"].disabled = false;     
    alert("Signup successful!");   }   
    return signup_errors; // return the # of errors we have ñ used by submitForm() 
    }
    
     // Validate the login form  
       else 
      {  
         var login_errors = 0;
         login_errors = 0;
    //if LoginUsername is empty
    if (form.elements["LoginUsername"].value.length <= 0) 
    { login_errors++;
    form.elements["LoginUsername"].style.backgroundColor = "red";
    } else
    form.elements["LoginUsername"].style.backgroundColor = "white";
    
    //if LoginPassword is empty
    if (form.elements["LoginPassword"].value.length <= 0) 
    { login_errors++;
    form.elements["LoginPassword"].style.backgroundColor = "red";
    } else
    form.elements["LoginPassword"].style.backgroundColor = "white";
    
    // if error exists, disable submit button 
     if (login_errors > 0)     
    form.elements["loginSubmit"].disabled = true;   
    else {form.elements["loginSubmit"].disabled = false;     
    alert("Login successful!");   }   
    return login_errors; // return the # of errors we have ñ used by submitForm() 
      }
    }
    
    // Check form for errors and "submit" 
    function submitForm(form) 
    { errors = clientValidation(form);   
    if (errors == 0)     
    alert("Form " + form.id + " submitted"); } 
    </script>

</head>
<body>

<div class="header">
<a href="Homepage.php">
<h1>The Coat Factory</h1>
</a>
</div>

<div class="page">
<div class="navbar">
<ul>
  <li><a href="Homepage.php" class="Home">Home</a></li>
  <li><a href="Loginpage.php" class="Login">Login</a></li>
</ul>
</div>

<div class="main">  
    <!-- This Form is for signing up for the website -->
    <div id="Sign">
    <h1>Signup</h1>
    <form action="process-login.php" method="post">
    <input type="hidden" name="Signup" value="1"/>
     <label for="firstname">First Name:</label>
     <input type="text" id="firstname" name="firstname"/><br><br>
     <label for="lastname">Last Name:</label>
     <input type="text" id="lastname" name="lastname"/><br><br>
     <label for="username">Username:</label>
     <input type="text" id="Username" name="Username"/><br><br>
     <label for="email">Email Address:</label>
     <input type="email" id="address" name="address"/><br><br>
     <label for="password">Password:</label>
     <input type="password" id="password1" name="password1"/><br><br>
     <label for="verify">Verify Password:</label>
     <input type="password" id="password2" name="password2"/><br><br>
    <input type="submit"/>
    <input type="reset"/>
    </form>
    </div>
    `
    <!-- This Form is for the user to login to the website -->
    <div id="Log">
    <h1>Login</h1>
    <form action="process-login.php" method="post">
    <label for="LoginUsername">Username:</label>
    <input type="text" id="username" name="username"/><br><br>
    <label for="LoginPassword">Password:</label>
    <input type="password" id="password" name="password"/><br><br>
    <input type="submit"/>
    </form>
    </div>
    </div>

    <button class="buttonAdmin" id="AdminAccessButton">Administrator Access</button>
    <script type="text/javascript">
        document.getElementById("AdminAccessButton").onclick = function () {
            location.href = "../a/AdministratorAccess/AdminLoginpage.html";
        };
    </script>
    <div class="footer">
<h2>
CSI 3450 Database Design Project<br>
The Coat Factory<br>
Darius Banks<br>
Andy Lu
</h2>
</div>
</div>

</body>
</html>