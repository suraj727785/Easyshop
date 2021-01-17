<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/signupstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Register</title>
</head>

<body>

<div class="signup-page">
<form class="signup" action="" method="post"  autocomplete="off" enctype="multipart/form-data">
  <h1>Create account</h1>
  <h2>Please let us know about your Shop</h2>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shopname" id="shopname" required />
    <label class="signup__label" for="shopname">Shop Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shoptype" id="shoptype" required />
    <label class="signup__label" for="shoptype">Shop Type</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shopowner" id="shopowner" required />
    <label class="signup__label" for="shopowner">Shop Owner's Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="owneruser" id="owneruser" required />
    <label class="signup__label" for="owneruser">Shop Owner's Username</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="address" id="address" required />
    <label class="signup__label" for="address">Shop Address</Address></label>
  </div>

  <input class="submit_button"type="submit" name="signup" id="btn-login" value="Register">
</form>
</div>