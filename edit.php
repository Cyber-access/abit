<?php
include ('config.php');
$id = $_REQUEST['id'];
$sql = mysqli_query($con, "SELECT * FROM student WHERE id='$id'");
$data = mysqli_fetch_assoc($sql);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $phone = $_REQUEST['phone'];
    $mysql = mysqli_query($con, "UPDATE student SET name='$name', email='$email', age='$age', gender='$gender', phone='$phone' WHERE id='$id'");
    if(mysqli_affected_rows($con) > 0){
        header("Location: student.php");
    } else {
        echo "Something went wrong";
    }

}
?>
 <form method="POST"> 
    <input type="text" name="name" placeholder="Enter student name" value="<?php echo $data['name'];?>">
    <br>
    <input type="email" name="email" placeholder="Enter student email" value="<?php echo $data['email'];?>">
    <br>
    <input type="text" name="age" placeholder="Enter student age" value="<?php echo $data['age'];?>">
    <br>
    <input type="text" name="phone" placeholder="Enter student phone" value="<?php echo $data['phone'];?>">
    <br>
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="male" <?php if($data['gender'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if($data['gender'] == 'female') echo 'selected'; ?>>Female</option> 
        <option value="other" <?php if($data['gender'] == 'other') echo 'selected'; ?>>Other</option>    
    </select>
    <br> <br>
    <input type="text" name="phone" value="<?php echo $data['phone']; ?>">  
    <br>
    <input type="submit" name="submit" value="Submit">
 </form>