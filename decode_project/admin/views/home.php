<?php require '../includes/header.php';?>
<?php require '../includes/navbar.php';?>
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
    if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        $user->delete_user_record($deleteId);
    }

?>
<div class="container-fluid">
        <h1 class="text-center text-uppercase">welcome back <?php echo $_SESSION['user_name']?></h1>
        <table class="table table-hover text-uppercase text-center">
            <thead class="text-uppercase text text-danger">
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Image</th>
                <th>More</th>
            </thead>
            <tbody>
                <?php
                $n = 1;
                $obj = $user->display_Data($_SESSION['user_name']);
                foreach ($obj as $c) {
                ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $c['first_name'].' '.$c['last_name'] ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['contact_number']; ?></td>
                    <td><img src="../uploads/<?php echo $c['image'] ?>" alt="image" height="150px" width="150px"></td>
                    <td class="text">
                        <a href="editprofile.php?editId=<?php echo $c['reg_id'] ?>"
                            class="btn btn-warning p-2"><i class="fa fa-pencil text-white"
                                aria-hidden="true"></i>Edit</a>&nbsp
                        <a href="home.php?deleteId=<?php echo $c['reg_id']; ?>"
                            class="btn btn-danger p-2" onclick="confirm('Are you sure want to delete this record')"><i
                                class="fa fa-trash text-white" aria-hidden="true"></i>Delete</a>
                    </td>
                </tr>
                <?php
                    $n++;
                }
                ?>
            </tbody>
        </table>
    </div>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<?php require '../includes/footer.php';?>   
