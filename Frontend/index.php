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

            <div id="message" class="login-card-header">
                <h1>Sign In</h1>
            </div>

            <form id="login_form" class="login-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Enter Username" name="username" id="username_form" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" name="password" id="password_form"
                     required>
                </div>
                <button id="login_button" type="button" onclick="loginHandler()">Sign In</button>
            </form>

            <div class="login-card-footer">
                Don't have an account? <a href="../Frontend/create_account.php">Create a free account.</a>
            </div>
        </div>
    </div>
    <script src="functions.js" type="text/javascript" ></script>
</body>

</html>