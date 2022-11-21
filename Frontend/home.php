<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css"/>
    <link rel="icon" href="logos/instagram.png" type="image/x-icon"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Instagram</title>
</head>
<body onload="homeHandler()">
<div class="container">
  <div class="all flex-row">
    <div class="menu flex-column">
      <div class="flex-row label-wrapper">
        <img src="logos/instagram.png" style='height:20px; width:20px;margin-top:10px;'/>
        <h3 style='margin-left:12px; margin-top:-23px'class="insta-writing">Instagram</h3>
      </div>
      <div id="profile_pic">
      <img src='../Backend/profile-pic/' alt='' style='border-radius: 50%; height:80px; width:80px;margin-left:120px;margin-top:20px;'>
      </div>
      <div id="infos"class="profil-info">
        <div id="texts_infos"><h2 class="username">Username</h2>
        <h3 class="username">Full Name</h3>
        <p class="bio">Bio</p></div>
        <div class="menu-elements">
          <div class="icons">
          <span class="material-symbols-outlined">home</span>
            <div class="feed-writing"> 
            <a id="home_profile"href="../Frontend/home.php" class="feed-writing">Feed</a>
            </div>
          </div>
          <div class="icons">
          <span class="material-symbols-outlined">settings</span>
            <a id="edit_profile" href="../Frontend/edit_profile.php" class="feed-writing">Edit Profile</a>
          </div>
          <div class="icons">
          <span class="material-symbols-outlined">manage_accounts</span>
            <a id="my_profile" href="../Frontend/my_profile.php" class="feed-writing">My Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="right-page">
    <div class="top-bar">
      <div class="cover-post">
        <button class="button post-new"> <a id="post_img"href="../Frontend/create_post.php">Create New Post</a> </button>
      </div>
    </div>
    <hr class="hr-new">
    <div class="right-of-page">
      <div class="right-middle">
     <div class="featured">
        <div class="featured-header">
        <h2 class="featured-stories"> Latest Feed</h2>
         <div class="icon-two">
        <div class="icon3"></div>
        </div>
        </div>
        <div id="posts">
                
        </div>
    </div>
  </div>
</div>
<script src="functions.js" type="text/javascript" ></script>
</body>
</html>
