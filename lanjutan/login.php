<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="style_login.css">
    </head>

    <body>
        <div style="color: black; position: absolute;left: 450px;top: 120px; 
        font-size: 30-x; background-color:white; align-items:center;">
        <h1>ADMIN PERPUSTAKAAN</h1>
        </div>
        <div class="container">
            <h1>Login</h1>
            <form method="post" action="cek_login.php">
                <label> Username</label> <br>
                <input type="text" name="user"> <br>
                <label for="">Password</label><br>
                <input type="password" name="pass">
                <button type="submit" name="submit">Log in</button>
            </form>
        </div>
    </body>
</html>