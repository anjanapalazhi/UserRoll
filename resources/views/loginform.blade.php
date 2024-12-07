<!DOCTYPE html>  
<html>  
<head>  
    <title>Login Form</title>  
    <link rel="stylesheet" type="text/css" href="styles.css">  

    
</head>  
<body> 
    <form action="{{ route('login') }}" method="post">  
        
      @csrf
        <div class="container">  
            <label for="email"><b>Username</b></label>  
            <input type="email" placeholder="Enter Username" name="email" required>  
      
            <label for="password"><b>Password</b></label>  
            <input type="password" placeholder="Enter Password" name="password" required>  
      
            <button type="submit">Login</button>  
            
        </div>  
      
    </form>


</body>  
</html>  