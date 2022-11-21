<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href="logos/instagram.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Instagram</title>
</head>
<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="logos/logo.png" alt="logo">
            </div>
            <div id="message" class="login-card-header">
                <h1>My Details</h1>
            </div>
            <form class="login-card-form" id="update_form" enctype="multipart/form-data">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Edit username" name="username" id="username_form">
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">account_box</span>
                    <input type="text" placeholder="Edit full name" name="full_name" id="fullname_form">
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">badge</span>
                    <input type="text" placeholder="Edit bio" name="bio" id="bio_form">
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">image</span>
                    <label for="formFileMultiple" ></label>
                    <input type="file" placeholder="Choose your profile picture" name="profile_picture" id="profile_form" accept="image/*">
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Edit password" name="password" id="password_form">
                </div>
                <button id="update_button" type="button" onclick="updateHandler()">Update</button>
            </form>
        </div>
    </div>
    <script src="functions.js" type="text/javascript" ></script>
</body>

</html>