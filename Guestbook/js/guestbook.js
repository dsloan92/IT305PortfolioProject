//document.getElementById("guestbook-form").onsubmit = validate;
var $emailList = $("#mailingList");



function showfield(name){
    var otherText = document.getElementById("other-block");

    if(name === "meet-other"){
         otherText.style.display = "block";
    }
    else{
        otherText.style.display = "none";
    }
}

function validate(){

    let isValid = true;

    //Clearing error messages
    let errors = document.getElementsByClassName("err");
    for (var i=0; i<errors.length; i++){
        errors[i].style.visibility = "hidden";
    }

    //first name error check
    let first = document.getElementById("firstName").value;
    console.log(first);
    if (first === ""){
        let errFirst = document.getElementById("err-fname");
        errFirst.style.visibility = "visible";
        isValid = false;
    }

    //last name error check
    let last = document.getElementById("lastName").value;
    console.log(last);
    if (last === ""){
        let errLast = document.getElementById("err-lname");
        errLast.style.visibility = "visible";
        isValid = false;
    }

    //checking email
    let email = document.getElementById("email").value;
    let mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email !="") {
        if (!email.match(mailFormat)) {
            let errEmail = document.getElementById("err-email");
            errEmail.style.visibility = "visible";
            isValid = false;
        }
    }

    if ($emailList.is(":checked") && email === ""){
        let $errEmailList = $("#err-email-list");
        $errEmailList.css("visibility","visible");
        isValid = false;
    }


    let linkedIn = document.getElementById("linkedIn").value;
    if (linkedIn !=""){
        var urlregex = new RegExp(/^((https?):\/\/)?([w|W]{3}\.)+[a-zA-Z0-9\-\.]{3,}\.[a-zA-Z]{2,}(\.[a-zA-Z]{2,})?$/
        );
        if (!linkedIn.match(urlregex)){
            let errLinkedIn = document.getElementById("err-linkedIn");
            errLinkedIn.style.visibility = "visible";
            isValid = false;
        }

    }

    let meet = document.getElementById("meet").value;
    if (meet ==="none"){
        let errMeet = document.getElementById("err-meet");
        errMeet.style.visibility = "visible";
        isValid = false;
    }

    let meetText = document.getElementById("other-meet").value;
    if (meetText ==="" && meet === "meet-other"){
        let errMeetText = document.getElementById("err-meet-text");
        errMeetText.style.visibility = "visible";
        isValid = false;

    }


    return isValid;

}

$emailList.change(function(){
    if ($emailList.is(":checked")){
        $("#email-formats").css("visibility", "visible");
    }
    else
        $("#email-formats").css("visibility", "hidden");

});

