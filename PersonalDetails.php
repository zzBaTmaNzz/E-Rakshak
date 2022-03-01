<?php

if(isset($_POST['submit']))
{
    if(!empty($_POST['mb']))
    {
        $First_Name = $_POST['fname'];
        $Last_Name = $_POST['lname'];
        $DOB = $_POST['dob'];
        $Age = $_POST['age'];
        $Gender = $_POST['gender'];
        $Permanent_Address = $_POST['add'];
        $Mobile_Number = $_POST['mb'];
        $Pin_Code = $_POST['pc'];

        $con = mysqli_connect('localhost','root','root','erakshak');

        $query = mysqli_query($con,"SELECT * from personal_details WHERE Mobile_Number = '".$Mobile_Number."' ");

        if(mysqli_num_rows($query) == 0)
        {
            $sql = "INSERT INTO personal_details(First_Name, Last_Name, DOB, Age, Gender, Permanent_Address, Mobile_Number, Pin_Code ) VALUES ('$First_Name','$Last_Name','$DOB','$Age','$Gender','$Permanent_Address','$Mobile_Number','$Pin_Code')";
            $result = mysqli_query($con,$sql);

            if($result)
            {
                session_start();
                $_SESSION['personal'] = $Mobile_Number;
                header("Location: FIR Details.html");
            }
            else{
                echo "Failure";
            }



        }
        else{
            echo "That Mobile Number already exist! Try with another.";
        }
         

    }
    else{
        echo "All fields are required.";
    }
}

?>