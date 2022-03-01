<?php

if(isset($_POST['submit']))
{
    if(!empty($_POST['desc']))
    {
        $Type = $_POST['FT'];
        $Date = $_POST['date'];
        $Desc = $_POST['desc'];
        $Time = $_POST['IT'];
        $Location = $_POST['loc'];

        $con = mysqli_connect('localhost','root','root','erakshak');
        
        $sql = "INSERT INTO fir_details(FIR_Type, Incident_Date, Incident_Description, Incident_Time, Incident_Location) VALUES ('$Type','$Date','$Desc','$Time','$Location')";
        $result = mysqli_query($con,$sql);

        if($result)
        {
            session_start();
            $_SESSION['fir'] = $Time;
            header("Location: Document.html");
        
        }
        else{
            echo "Failure";
        }
    }
    else{
        echo "All fields are required.";
    }
}

?>