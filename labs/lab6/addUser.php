<?php
session_start();
//not logged on
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
function getDepartmentInfo(){
    include("../../dbConn.php");
    $sql = "SELECT deptName, departmentId from tc_department order by deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

?>

<html>
    <head>
        
    </head>
    
    <body>
        <h1> Admin: Add New User</h1>
        <br>
        <form method="get">
            First Name: 
            <input type="text" name="fName" required/><br>
            Last Name:
            <input type="text" name="lName" required/><br>
            Email:
            <input type="text" name="email"/><br>
            University ID Number:
            <input type="text" name="uniID"/><br>
            Phone Number:
            <input type="text" name="phone"/><br>
            Gender:
            <input type="radio" name="gender" value="M" id="genderM" required/>
            <label for="genderM">Male</label>
            <input type="radio" name="gender" value="F" id="genderF" required/>
            <label for="genderF">Female</label>
            <input type="radio" name="gender" value="O" id="genderO" required/>
            <label for="genderO">Other</label>
            <br>
            Role:
            <select name="role">
                <option value="">Select One</option>
                <option value ="faculty">Faculty</option>
                <option value="student">Student</option>
                <option value="staff">Staff</option>
            </select><br>
            Department:
            <select name="deptID">
                <option value="">Select One</option>
                <?php
                $departments = getDepartmentInfo();
                foreach ($departments as $record) {
                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                }
                ?>
            </select><br>
            <input type="submit" name="addUser" value="Add User!"/>
        </form>
        
        <?php
            if(isset($_GET[addUser])){
                include("../../dbConn.php");
                $fName = $_GET['fName'];
                $lName = $_GET['lName'];
                $email = $_GET['email'];
                $uniID = $_GET['uniID'];
                $gender = $_GET['gender'];
                $phone = $_GET['phone'];
                $role = $_GET['role'];
                $deptID = $_GET['deptID'];
                
                $namedParam = array();
                $namedParam[':fName'] = $fName;
                $namedParam[':lName'] = $lName;
                $namedParam[':email'] = $email;
                $namedParam[':uniID'] = $uniID;
                $namedParam[':gender'] = $gender;
                $namedParam[':phone'] = $phone;
                $namedParam[':role'] = $role;
                $namedParam[':deptID'] = $deptID;
                
                $sql = "INSERT INTO `tc_user`(`userId`, `firstName`, `lastName`, `email`, `universityId`, `gender`, `phone`, `role`, `deptId`) VALUES (NULL,:fname,:lName,:email,
                :uniID,:gender,:phone,:role,:deptID)";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }
        
        ?>
    </body>
</html>