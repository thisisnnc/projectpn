<?php



// studentID
if (empty($_POST["studentID"])) {
    $errorMSG = "กรุณากรอกรหัสนักศึกษา ";
} else {
    $name = $_POST["studentID"];
}
// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "กรุณากรอกชื่อและนามสกุล ";
} else {
    $email = $_POST["name"];
}

// grade
if (empty($_POST["grade"])) {
    $errorMSG .= "กรุณากรอกเกรดเฉลี่ย";
} else {
    $msg_subject = $_POST["grade"];
}


// parent_income
if (empty($_POST["parent_income"])) {
    $errorMSG .= "กรุณากรอกรายได้ผู้ปกครอง ";
} else {
    $message = $_POST["parent_income"];
}

// volunteer
if (empty($_POST["volunteer"])) {
    $errorMSG .= "กรุณากรอกจำนวนจิตอาสา ";
} else {
    $message = $_POST["volunteer"];
}


// parent_income
if (empty($_POST["parent_income"])) {
    $errorMSG .= "กรุณากรอกเบอร์ติดต่อ ";
} else {
    $message = $_POST["parent_income"];
}