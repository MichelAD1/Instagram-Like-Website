<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href="logos/instagram.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Instagram</title>
</head>
<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="logos/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
            </div>
            <form class="login-card-form" action="../Backend/check_user.php" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Enter Username" name="username" id="usernameForm" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" name="password" id="passwordForm"
                     required>
                </div>
                <div class="form-item-other">
                    <a href="#">I forgot my password</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="#">Create a free account.</a>
            </div>
        </div>
    </div>

</body>

</html>