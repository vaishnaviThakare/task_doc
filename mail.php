<?php  
include "db_connect.php"
?>

<?php   
    $Date = date("Y-m-d");
echo "The current server timezone is: $Date  ";
    $mod_date = date('Y-m-d', strtotime($Date.  ' + 1 days'));
echo "The server timezone is:  $mod_date  ";

    $newDate = $mod_date;
    echo "The new date server timezone is:  $newDate  ";
    $sendMail = false;
    $sqlCommand1 = "SELECT * FROM task_list WHERE end_date='$newDate'" ;
    $sqlCommand = "SELECT task_list.end_date , users.firstname , users.lastname , users.email , task_list.assign_to  , task_list.task_name FROM users INNER JOIN task_list  on task_list.assign_to = CONCAT(users.firstname ,' ' ,users.lastname)";
    $query = mysqli_query($conn,$sqlCommand) or die("Could not connect to mysql".mysqli_error($conn));
    $count = mysqli_num_rows($query) or die("Could not connect to mysql".mysqli_error($conn));
   
       
if ($count >= 1){
        while($row = mysqli_fetch_array($query)){
        $newline = "\n";
            //echo $row['firstname'] .$newline ;
            //echo $row['email'].$newline;
            //echo $row['task_name'].$newline;
            //echo $row['end_date'].$newline;

           $firstname = $row["firstname"];
           $lastname = $row["lastname"];
           $email = $row["email"];
           $task =$row["task_name"];
           $end_date = $row["end_date"];

           $sql = "INSERT INTO mail  VALUES ('$firstname','$lastname','$email','$task','$end_date')";
         
            if(mysqli_query($conn, $sql)){
                echo "data stored in a database successfull";
        } else{
            echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
        }
    $mid = mysqli_insert_id($conn);
    $search_output = "

 Hii , " .$firstname.' ' .$lastname."
                    Your work ".$task." is due tomorrow. ";

            $sendMail = true;
        }

}

if($sendMail){  
    $admin = "SELECT * FROM mail" ;
    $queryAdmin = mysqli_query($conn , $admin) or die("Could not connect to mysql".mysqli_error($conn));
    $adminCount = mysqli_num_rows($queryAdmin);
    $recipients = array();
        if ($count >= 1){
            while($row = mysqli_fetch_array($queryAdmin)){
            $subject = 'Reminder';
            $msg = $search_output;
            echo $msg;
            $to = ($row["email"]);
            mail($to, $subject, $msg);
            
            }   
        }
}

?>





