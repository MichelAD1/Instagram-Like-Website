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
                <h1>Create Post</h1>
            </div>
            <form class="login-card-form" id="signup_form" enctype="multipart/form-data">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-outlined">image</span>
                    <label for="formFileMultiple" ></label>
                    <input type="file" placeholder="Choose your profile picture" name="post_image" id="post_image_form" accept="image/*" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">chat</span>
                    <input type="text" placeholder="Enter Caption" name="caption" id="caption_form"
                     required>
                </div>
                <button id="signup_button" type="button" onclick="createPostHandler()">Create</button>
            </form>
        </div>
    </div>
    <script src="functions.js" type="text/javascript" ></script>
</body>

</html>