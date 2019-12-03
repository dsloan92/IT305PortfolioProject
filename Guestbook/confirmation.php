<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Valid Submission</title>
</head>
<body>


<?php

require('/home2/dsloangr/connect.php');
//var_dump($_POST);
/*array(8) { ["firstName"]=> string(9) "Testfirst" ["lastName"]=> string(8)
    "testlast" ["linkedIn"]=> string(10) "google.com"
    ["email"]=> string(13) "test@mail.com" ["mailingList"]=> string(15)
    "yes-mailingList" ["emailFormat"]=> string(4) "HTML"
    ["meet"]=> string(6) "meetup"
    ["comment"]=> string(16) "testing comments" }*/

//creating variables from post array
    $firstName = $_POST['firstName'];
    $lastName = $_POST["lastName"];
    $linkedIn = $_POST["linkedIn"];
    $email = $_POST["email"];
    $mailingList = $_POST["mailingList"];
    $meet = $_POST["meet"];
    $title = $_POST["title"];
    $company = $_POST['company'];
    $comment = $_POST["comment"];
    $commentMeet = $_POST["commentMeet"];

    include ("ssValidation.php");
    if ($isValid){
        //inserting information into database
        $firstName = mysqli_real_escape_string($cnxn, "$firstName");
        $lastName = mysqli_real_escape_string($cnxn, "$lastName");
        $linkedIn = mysqli_real_escape_string($cnxn, "$linkedIn");
        $email = mysqli_real_escape_string($cnxn, "$email");
        $mailingList = mysqli_real_escape_string($cnxn,"$mailingList");
        $meet = mysqli_real_escape_string($cnxn,"$meet");
        $title = mysqli_real_escape_string($cnxn,"$title");
        $company = mysqli_real_escape_string($cnxn,"$company");
        $comment = mysqli_real_escape_string($cnxn,"$comment");
        $commentMeet = mysqli_real_escape_string($cnxn,"$commentMeet");

        //sql statement for guestbook table
        $sql = "INSERT INTO guestbook (first_name, last_name, title, company, email, linkedin_URL, mailing_list,
                how_did_we_meet, how_did_we_meet_other, comments_questions)
                
                VALUES ('$firstName', '$lastName', '$title', '$company','$email', '$linkedIn', '$mailingList',
                 '$meet', '$commentMeet', '$comment');";

        $result = mysqli_query($cnxn, $sql);

        if ($result) {
            echo "<h2>Thank You For Your Submission!</h2>";
        }
    }
    //echo submission back to user
    echo "<div>First Name: " . $firstName . "</div>";
    echo "<div>Last Name: " . $lastName . "</div>";
    if (!empty($title)){
        echo "<div>Title: $title</div>";
    }
    if (!empty($company)){
        echo "<div>Company: $company</div>";
    }
    echo "<div>LinkedIn URL: " . $linkedIn . "</div>";
    echo "<div>Email: " . $email . "</div>";
    if($mailingList == "yes-mailingList") {
        echo "<div>Mailing List: YES</div>";
    }
    else{
        echo "<div>Mailing List: NO</div>";

    }
    echo "<div>How Did We Meet: " . $meet . "</div>";
    if ($meet =="meet-other"){
        echo "<div>Meetup Other: $commentMeet</div>";
    }
    echo "<div>Comments/Questions: " . $comment . "</div>";



?>

</body>
</html>