<?php
/**
 * GuestBook Server Side validation
 * Original Author:    Dallas Sloan
 * Last Modified by:   Dallas Sloan
 * Creation Date:      11/30/2019
 *  Filename:          ssValidation.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//creating valid variable
$isValid = true;

//function creations

//creating function to validate standard textboxes
function validateStandardInput($id, $field){
    global $isValid;
    if (!empty($id)){
        return;
    }
    else{
        echo "<p>Valid $field must be entered"."\r\n</p>";
        $isValid = false;
    }
}

// validating email
function validateEmail($id, $field){
    global $isValid;
    if (!empty($id) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$id)){
        return;
    }
    else{
        echo "<p>Valid Email must be entered for $field</p>";
        $isValid = false;

    }
}

//validating url address
function validateURL($id){
    global $isValid;
    if (preg_match('/^((https?):\/\/)?([w|W]{3}\.)+[a-zA-Z0-9\-\.]{3,}\.[a-zA-Z]{2,}(\.[a-zA-Z]{2,})?$/',$id)){
        return;
    }
    else{
        echo "<p>Valid LinkedIn URL must be entered</p>";
        $isValid = false;
    }
}

//validate drop-down
function validateDropdown($id, $field){
    global $isValid;
    if ($id != "none") {
        return;
    } else {
        echo "<p>Please Select Valid $field Option</p>";
        $isValid = false;
    }
}

//calling validate functions to validate form
validateStandardInput($firstName, "First Name");
validateStandardInput($lastName, "Last Name");
validateDropdown($meet, "How Did We Meet");

//if user checks mailing list checkbox, valid email must be submitted
if ($mailingList == "yes-mailingList") {
    validateEmail($email, "email");
}
//if email is supplied, must be valid email
if (!empty($email)){
    validateEmail($email, "email");
}

//if linkedIn is supplied must be valid
if (!empty($linkedIn)){
    validateURL($linkedIn);
}

if (!$isValid){
    Echo "<h3>Please Navigate Back to the Volunteer Form and Correct Any Errors Displayed Above</h3>";

}


