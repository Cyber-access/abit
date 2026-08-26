<?php
include ('config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO student(name, email, age, gender, phone) VALUES('$name', '$email', '$age', '$gender', '$phone')";
    $sql = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
        echo "Student added successfully";
    } else {
        echo "Error adding student";
    }   
}
?>
<form method="POST"> 
    <input type="text" name="name" placeholder="Enter student name">
    <br>
    <input type="email" name="email" placeholder="Enter student email">
    <br>
    <input type="text" name="age" placeholder="Enter student age">
    <br>
    <input type="text" name="phone" placeholder="Enter student phone">
    <br>
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option> 
        <option value="other">Other</option>    
    </select>
    <br> <br>   
    <input type="submit" name="submit" value="Add Student">
</form>
<table border="1px solid black" width="100%">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Gender</th>
    </tr>
<?php
$mysql=mysqli_query($con,"SELECT * FROM student");
while($data=mysqli_fetch_assoc($mysql)){
    ?>
    <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['age'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['gender'];?></td>
        <td><a href="delete.php?id=<?php echo $data['id'];?>">Delete</a></td>
        <td><a href="edit.php?id=<?php echo $data['id'];?>">Edit</a></td>
        <td><a href="update.php?id=<?php echo $data['id'];?>">Update</a></td>
    </tr>
<?php
}

    
?>
</table>