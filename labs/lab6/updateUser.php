<?php
session_start();
//not logged in
if(!isset($_SESSION[username])){
    header("Locateion: index.php");
    
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <body>
         <form method="get">
            First Name: 
            <input type="text" name="fName" required value/><br>
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
    </body>
</html>