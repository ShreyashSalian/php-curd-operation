<?php require '../includes/header.php';?>
<?php

require '../admin/connection.php';
$user = new User();
if (isset($_POST['submit'])) {
    $user->login_user($_POST);
}

?>
<div class="container">
    <h1 class="text-danger text-uppercase bg-dark p-2 text-center mt-4">Login Form</h1>
    <form method="post" action="login.php">
        <div class="form-group">
            <label for="firstName" class="text-success">USER NAME</label>
            <input type="text" class="form-control" name="user_name" id="user_name">
            <small id="user_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">PASSWORD</label>
            <input type="password" class="form-control" name="password" id="password">
            <small id="password_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Password</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success p-2 mt-4" name="submit" value="LOGIN" id="submit" >
        </div>
        <a href="registration.php" class="text-success">Not a Member Click here!</a>
    </form>

</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<?php require '../includes/footer.php';?>   
