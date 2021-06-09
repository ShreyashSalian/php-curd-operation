<?php
// Notes : 
/*
    If we want to display record of the current login user then we have to pass the $name argument in display_data function.
    if we want to display all records then we can remove arguments from function and arguments passed from home.php pagr

    for update : 
        I hasve not update username on updating profile because username is unique;
*/

        // it display record of the user who has currently login.
        // if we want each records from database we can remove $name and where clause from below condition.


require 'config.php';

class User{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PWD;
    private $db_name = DB_NAME;
    private $admin_url = ADMIN_URL;
    private $url = URL;
    public $con;
    public $upload_file;
    public function __construct(){
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->db_name);

        if(!$this->con){
            echo "There is some error while connecting".mysqli_connect_error($this->con);
        }
    }
    public function insert_Data()
    {
        $first_name = mysqli_real_escape_string($this->con,$_POST['first_name']);  
        $last_name = mysqli_real_escape_string($this->con,$_POST['last_name']);   
        $user_name = mysqli_real_escape_string($this->con,$_POST['user_name']);   
        $email = mysqli_real_escape_string($this->con,$_POST['email']);   
        $contact_number = mysqli_real_escape_string($this->con,$_POST['contact_number']);   
        $password = mysqli_real_escape_string($this->con,$_POST['password']);    
        $files = $_FILES['image'];
        // ---- Check whether user already exits or not
        $select = "select * from registration where user_name = '$user_name'";
        $res = mysqli_query($this->con,$select);
        $data = mysqli_num_rows($res);
        if($data > 0){
            echo "User Name already Exists";
        }
        else{
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetmp = $files['tmp_name'];
            $fileext = explode('.', $filename);
            $filecheck = strtolower(end($fileext));
            $fileextstored = ['png', 'jpeg', 'jpg'];
            if (in_array($filecheck, $fileextstored)) {
                $destfile = '../admin/uploads/' . $filename;
                move_uploaded_file($filetmp, $destfile);
                $sql = "INSERT INTO registration(first_name,last_name,user_name,email,contact_number,password,image) VALUES('$first_name','$last_name','$user_name','$email','$contact_number','$pass','$filename')";
                $query = mysqli_query($this->con, $sql);
                if ($query) {
                    header('location:' . $this->url .'views/login.php');
                } else {
                    echo "Failed to add Users";
                }
            }
            else{
                echo "Please Enter the image(png,jpeg,jpg)";
            }
        } 
    }

    public function login_user($post)
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM registration WHERE user_name ='$user_name'";
        $query = mysqli_query($this->con,$sql);
        $num = mysqli_num_rows($query);
      
        if($num == 1)
        {
            // ----used to check from database-----
            while($row = mysqli_fetch_assoc($query)){
                if(password_verify($password,$row['password']))
                {
                    session_start();
                    $_SESSION['LoggedIn'] = true;
                    $_SESSION['user_name'] = $row['user_name'];
                    header('location:' . $this->admin_url .'views/home.php');
                   
                }
                else{
                    header('location:' . $this->url .'views/login.php');
                    echo "invalid password";
                }
            }
        }
        else{
            echo "No record Found";
        }
    }
    public function display_data($name)
    {
        //--------------------------------------------- $name refer to user name -------------------------
        // it display record of the user who has currently login.
        // if we want each records from database we can remove $name and where clause from below condition.
        $query = "select * from registration where user_name = '$name'";
        $result = mysqli_query($this->con, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No records Found";
        }
    }
    public function display_user_by_id($editId)
    {
        $sql = "select * from registration where reg_id = $editId";
        $query = mysqli_query($this->con, $sql);
        $num = mysqli_num_rows($query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                return $row;
            }
        }
        echo "No Records Found";
    }
    public function update_user($post){
        $first_name = mysqli_real_escape_string($this->con, $post['first_name']);
        $last_name = mysqli_real_escape_string($this->con, $post['last_name']);
        $email = mysqli_real_escape_string($this->con, $post['email']);
        $contact_number = mysqli_real_escape_string($this->con, $post['contact_number']);
        $id = mysqli_real_escape_string($this->con, $post['reg_id']);
        $hid_file = $_POST['hidden_file'];
        $upload_file = $hid_file;

        if (isset($_FILES['image'])) {
            $files = $_FILES['image'];
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetmp = $files['tmp_name'];
            $fileext = explode('.', $filename);
            $filecheck = strtolower(end($fileext));
            $fileextstored = ['png', 'jpeg', 'jpg'];
            if (in_array($filecheck, $fileextstored)) {
                //unlink('../uploads/' . $hid_file);
                $destfile = '../uploads/' . $filename;
                move_uploaded_file($filetmp, $destfile);
                // Remove the old image and update it with new one
                $upload_file = $filename;
            }
        }
        if (!empty($id) && !empty($post)) {
            $query = "update registration set first_name = '$first_name', last_name = '$last_name', email = '$email', contact_number = '$contact_number',image = '$upload_file' where reg_id = '$id'";
            $sql = mysqli_query($this->con, $query);
            if ($sql) {
                header('location:' .  $this->admin_url .'views/home.php');
            } else {
                echo "Sorry could not update data";
            }
        } else {
            echo "There is no records";
        }
    }
    function delete_user_record($deleteId)
    {
        //$path = "../uploads" . $image;
        // remove the image
        //$remove = unlink('admin/uploads/' . $image);
        $sql = "delete from registration where reg_id = $deleteId";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            header('location:' .  $this->admin_url .'views/home.php');
        } else {
            echo "Sorry could not update data";
        }
        // if ($query && $remove) {
        //     header('location:' . ADMIN_PROFILE);
        // } else {
        //     echo "Records does not delete try again";
        // }
        // // if image is not found in the uploads
        // if ($remove == false) {
        //     echo "image can't be deleted";
        // }
    }

}


?>