<?php

/*  GuestBook Admin Page
    Original Author:    Dallas Sloan
    Last Modified by:   Dallas Sloan
    Creation Date:      11/30/2019
    Last Modified Date: 11/30/2019
    Filename:           admin.php
 */

//Start a session
session_start();
//If user is not logged in, reroute them to the login page
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('/home2/dsloangr/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook Admin Page</title>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body>
<div class = "container">
    <h3 class = text-center>Guestbook Admin Page</h3>
    <a class = "float-right text-danger" href="logout.php">Logout</a> <br>

    <h4 class = "text-center">DataTable</h4>


    <?php
    //defining SQL query
    $sql = "SELECT * from guestbook
            WHERE active =1;";

    //sending query to database
    $result = mysqli_query($cnxn, $sql);
    ?>

    <table id="guestbook-table" class = "table">
        <thead>
        <tr>
            <th>Guestbook ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Title</th>
            <th>Company</th>
            <th>Email</th>
            <th>LinkedIN</th>
            <th>Mailing List</th>
            <th>How Did We Meet?</th>
            <th>Comments/Questions</th>
            <th>Date Added</th>
        </tr>
        </thead>

        <tbody>
        <?php
        //adding the results to the table
        while ($row = mysqli_fetch_assoc($result)) {
            $guestbookID = $row["id"];
            $firstName = $row["first_name"];
            $lastName = $row["last_name"];
            $title = $row["title"];
            $company = $row["company"];
            $email = $row["email"];
            $linkedIN = $row["linkedin_URL"];
            $mailingList = $row["mailing_list"];
            if ($mailingList == "yes-mailingList") {
                $mailingList = "YES";
            } else {
                $mailingList = "NO";
            }
            $meet = $row["how_did_we_meet"];
            $meetOther = $row["how_did_we_meet_other"];
            $comments = $row["comments_questions"];
            $dateAdded = $row["created"];

            echo "<tr>
                <td>$guestbookID</td>
                <td>$firstName</td>
                <td>$lastName</td>
                <td>$title</td>
                <td>$company</td>
                <td>$email</td>
                <td>$linkedIN</td>
                <td>$mailingList</td>
                <td>$meet: $meetOther</td>
                <td>$comments</td>
                <td>$dateAdded</td>
              </tr>";
        }
        ?>
        </tbody>
    </table>


    <a id = "add" href="guestbook.html">Guestbook Form</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        document.body.style.display = "block";
        var DTable = $('#guestbook-table');
        DTable.DataTable( {
            "order": [[ 0, 'desc' ]],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for Name: '+data[2] + ' ' +data[1];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                }
            }
        } );
    } );
</script>



</body>
</html>
