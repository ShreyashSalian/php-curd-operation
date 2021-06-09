<?php require '../includes/header.php';?>
<?php
    require '../admin/connection.php';
    $user = new User();

    if(isset($_POST['submit'])){
        $user->insert_Data($_POST);
    }
?>
<div class="container mt-4">
    <h1 class="text-uppercase text-danger text-center bg-dark p-3">Registration form</h1>
    <div class="container text">
        <div class="alert alert-success alert-dismissible fade text-uppercase text-center" role="alert" id="success">
            <strong class="text-uppercase">Great </strong> Your Form is submitted!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade text-uppercase text-center" role="alert" id="failure">
            <strong class="text-uppercase">Sorry </strong> Your Form is not submitted!!! Please Fill All the Details
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstName" class="text-success">FIRST NAME</label>
            <input type="text" class="form-control" name="first_name" id="first_Name">
            <small id="first_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">LAST NAME</label>
            <input type="text" class="form-control" name="last_name" id="last_Name">
            <small id="last_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">USER NAME</label>
            <input type="text" class="form-control" name="user_name" id="user_Name">
            <small id="user_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">EMAIL</label>
            <input type="text" class="form-control" name="email" id="email">
            <small id="email_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Email</small>
                            <div class="valid-feedback bg">
        </div>

        <div class="form-group">
            <label for="firstName" class="text-success">CONTACT NUMBER</label>
            <input type="text" class="form-control" name="contact_number" id="contact_Number">
            <small id="contact_number_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter 10 Digit Mobile Number</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName"class="text-success">PASSWORD</label>
            <input type="password" class="form-control" name="password" id="password">
            <small id="password_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Password</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">CONFIRM PASSWORD</label>
            <input type="password" class="form-control" name="confirm_Password" id="confirm_password">
            <small id="confirm_password_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Confirm Password</small>
                            <div class="valid-feedback bg">
        </div>

        <div class="form-group">
            <label for="firstName" class="text-success">IMAGE</label>
            <input type="file" class="form-control" name="image" id="image">
            <small id="image_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Image</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success p-2 mt-4" name="submit" value="REGISTER" id="submit">
        </div>
        <a href="login.php" class="text-danger">HAVE A ACCOUNT !</a>
    </form>  
   
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="../assets/js/registration.js"></script>
<?php require '../includes/footer.php';?>   
