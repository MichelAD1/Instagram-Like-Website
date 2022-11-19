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
            <div class="login-card-header">
                <h1>Sign Up</h1>
            </div>
            <form class="login-card-form" action="../Backend/edit_user.php" method="post" enctype="multipart/form-data">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person</span>
                    <input type="text" placeholder="Enter Username" name="username" id="usernameForm" 
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">account_box</span>
                    <input type="text" placeholder="Enter Full Name" name="full_name" id="fullnameForm"
                     autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">badge</span>
                    <input type="text" placeholder="Enter A Small Introduction About Yourself" name="bio" id="bioForm"
                     autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">image</span>
                    <label for="formFileMultiple" ></label>
                    <input type="file" placeholder="Choose your profile picture" name="profile_picture"  accept="image/*" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" name="password" id="passwordForm"
                     required>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

</body>

</html>