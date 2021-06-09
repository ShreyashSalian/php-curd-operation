<?php require '../includes/header.php';?>
<?php
session_start();
if (!isset($_SESSION['user_name']) || $_SESSION['user_name'] != true) {
    header('location: ../../views/login.php');
    exit();
}
?>
<?php
    require '../connection.php';
    $user = new User();
    if (isset($_GET['editId']) && !empty($_GET['editId'])) 
    {
        $editId = $_GET['editId'];
        $row = $user->display_user_by_id($editId);
    }
    if (isset($_POST['update'])) {
        //echo "hello";
        $user->update_user($_POST);
    }

   
?>
<div class="container mt-4">
    <h1 class="text-uppercase text-danger text-center">Update Your Profile</h1>
    <form action="editprofile.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstName" class="text-success">FIRST NAME</label>
            <input type="text" class="form-control" name="first_name" id="first_Name" value="<?php echo $row['first_name']; ?>">
            <small id="first_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">LAST NAME</label>
            <input type="text" class="form-control" name="last_name" id="last_Name" value="<?php echo $row['last_name']; ?>">
            <small id="last_name_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Only Alphabet</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="firstName" class="text-success">EMAIL</label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
            <small id="email_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter Proper Email</small>
                            <div class="valid-feedback bg">
        </div>

        <div class="form-group">
            <label for="firstName" class="text-success">CONTACT NUMBER</label>
            <input type="text" class="form-control" name="contact_number" id="contact_Number" value="<?php echo $row['contact_number']; ?>">
            <small id="contact_number_valid" class="form-text invalid-feedback text-danger text-uppercase font-weight-bold">Enter 10 Digit Mobile Number</small>
                            <div class="valid-feedback bg">
        </div>
        <div class="form-group">
            <label for="image" class="text-success">IMAGE</label>
            <input type="file" name="image" id="image" class="form-control" size="20" />
            <input type="hidden" name="hidden_file" value="<?php echo $row['image'] ?>" />
            <img src="../uploads/<?php echo $row['image'] ?>" height="100">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success p-2 mt-4" name="update" value="UPDATE" id="submit">
            <input type="hidden" name="reg_id" value="<?php echo $row['reg_id'];?>">
        </div>
        <a href="home.php" class="text-danger">GO BACK TO HOME!!!</a>
    </form>  
   
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<?php require '../includes/footer.php';?>