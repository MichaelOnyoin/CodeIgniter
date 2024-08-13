<!DOCTYPE html>
<html>  
    <head>  
        <title>PHP login system</title>  
        
        <link rel = "stylesheet" type = "text/css" href = "login1.css">  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/login1.css">
    </head>  
    <body>  
        <div id = "frm">  
            <h1>Login</h1>  
            <form name="f1" action = "processLogin" onsubmit = "return validation()" method = "POST">  
                <p>  
                    <label> email: </label>  
                    <input type = "text" id ="email" name  = "email" />  
                </p>  <br>
                <p>  
                    <label> Password: </label>  
                    <input type = "password" id ="pass" name  = "pass" />  
                </p>  
                <p>     
                    <input type =  "submit" id = "btn" value = "Login" />  
                </p>  
            </form>  
        </div>  
        // validation for empty field   
        <script>  
                function validation()  
                {  
                    var id=document.f1.email.value;  
                    var ps=document.f1.pass.value;  
                    if(id.length=="" && ps.length=="") {  
                        alert("email Name and Password fields are empty");  
                        return false;  
                    }  
                    else  
                    {  
                        if(id.length=="") {  
                            alert("email Name is empty");  
                            return false;  
                        }   
                        if (ps.length=="") {  
                        alert("Password field is empty");  
                        return false;  
                        }  
                    }                             
                }  
            </script>  
    </body>     
    </html>  