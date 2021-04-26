 <!-- connectdb-->
 <?php session_start();
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "trackkingsystem";

    $objConnect = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_select_db($objConnect, "trackkingsystem");
    mysqli_set_charset($objConnect, "utf8");
    mysqli_query($objConnect, "SET NAMES UTF8");
    $student_id = "";

    if (isset($_SESSION['studentID']) && !empty($_SESSION['studentID'])) {
        $student_id = $_SESSION["studentID"];
    }

    $select = "SELECT * FROM user_info WHERE Student_ID = '$student_id'";
    $objQuerySelect = mysqli_query($objConnect, $select);
    $_student_type = 1;
    $_grade = null;
    $_parent_income = null;
    $_volunteer = null;
    $_phone_number = "";
    $count = 0;
    while ($row = mysqli_fetch_assoc($objQuerySelect)) {
        $_student_type = $row['Estudentloan_Type'];
        $_grade = $row['Grade'];
        $_parent_income = $row['Parent_Income'];
        $_volunteer = $row['Volunteer'];
        $_phone_number = $row['Phone_Number'];
        $count++;
    }
    ?>
 <!-- end connecdb -->

 <!-- แสดงข้อมูล   -->
 <?php
    mysqli_select_db($objConnect, "trackkingsystem");
    mysqli_set_charset($objConnect, "utf8");
    mysqli_query($objConnect, "SET NAMES UTF8");


    $select = "SELECT * FROM user_info WHERE Student_ID = '$student_id'";
    $objQuerySelect = mysqli_query($objConnect, $select);
    $grade = true;
    $parent_income = true;
    $volunteer = true;
    $pass = false;
    $_grade;
    $_parent_income;
    $_volunteer;
    $_sutdent_type;
    $_phone_number;
    $count = 0;
    while ($row = mysqli_fetch_assoc($objQuerySelect)) {
        if ($row['Grade'] < 1.90) {
            $grade = false;
        }
        if ($row['Parent_Income'] > 300000) {
            $parent_income = false;
        }
        if ($row['Volunteer'] < 36) {
            $volunteer = false;
        }
        if ($grade && $parent_income && $volunteer) {
            $pass = true;
        }
        $_grade = $row['Grade'];
        $_parent_income = $row['Parent_Income'];
        $_volunteer = $row['Volunteer'];
        $_sutdent_type = $row['Estudentloan_Type'];
        $_phone_number = $row['Phone_Number'];
        $count++;
    }
    if ($count == 0) {
        $pass = false;
    }
    ?>
 <!-- จบแสดงข้อมูล -->


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <title>Tracking System For e-Studentloan In TU</title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
     <!-- Icon -->
     <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
     <!-- Slicknav -->
     <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
     <!-- Nivo Lightbox -->
     <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css">
     <!-- Animate -->
     <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
     <!-- Main Style -->
     <link rel="stylesheet" type="text/css" href="assets/css/main.css">
     <!-- Responsive Style -->
     <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
     <script type="text/javascript" src="jquery.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


 </head>

 <body>
     <?php
        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
        ?>
     <!-- เริ่มส่วน header -->
     <header id="header-wrap">
         <!-- เริ่ม Navbar  -->
         <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
             <div class="container">
                 <!-- เมนูสำหรับ dekstop -->
                 <div class="navbar-header">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                         aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                         <span class="icon-menu"></span>
                         <span class="icon-menu"></span>
                         <span class="icon-menu"></span>
                     </button>
                     <a href="studentpage.php" class="navbar-brand"><img src="assets/img/logosystem.png" alt=""></a>
                 </div>
                 <div class="collapse navbar-collapse" id="main-navbar">
                     <ul class="navbar-nav mr-auto w-100 justify-content-end">
                         <li class="nav-item active">
                             <a class="nav-link" href="studentpage.php">
                                 หน้าหลัก
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="studentpage.php">
                                 กำหนดการ
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#schedules">
                                 สร้างคำร้อง
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="studentpage.php">
                                 ติดตามสถานะ
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="studentpage.php">
                                 ข่าวประชาสัมพันธ์
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="studentpage.php">
                                 คำถามที่พบบ่อย
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="logout.php">
                                 ออกจากระบบ
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>

             <!-- เมนูสำหรับ mobile -->
             <ul class="mobile-menu">
                 <li>
                     <a class="page-scrool" href="#header-wrap">หน้าหลัก</a>
                 </li>
                 <li>
                     <a class="page-scrool" href="#about">กำหนดการ</a>
                 </li>
                 <li>
                     <a class="page-scroll" href="#schedules">สร้างคำร้อง</a>
                 </li>
                 <li>
                     <a class="page-scroll" href="#faq">คำถามที่พบบ่อย</a>
                 </li>
                 <li>
                     <a class="page-scroll" href="#pricing">ติดตามสถานะ</a>
                 </li>
                 <li>
                     <a class="page-scroll" href="#team">ข่าวประชาสัมพันธ์</a>
                 </li>
                 <li>
                     <a class="page-scroll" href="#logout">ออกจากระบบ</a>
                 </li>
             </ul>
             <!-- จบ เมนูสำหรับ mobile -->

         </nav>
         <!-- จบส่วน Navbar -->

         <!--สถานะทั้งหมด-->
         <section id="schedules" class="schedule section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-title-header text-center">
                             <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">สถานะทั้งหมด</h1>
                             <p class="wow fadeInDown" data-wow-delay="0.2s">รายละเอียดสถานะการกู้ยืมเงิน กรอ. และ กยศ.
                                 มหาวิทยาลัยธรรมศาสตร์</p>
                         </div>
                     </div>
                 </div>
                 <div class="schedule-area row wow fadeInDown" data-wow-delay="0.3s">
                     <div class="schedule-tab-title col-md-3 col-lg-3 col-xs-12">
                         <div class="table-responsive">
                             <ul class="nav nav-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" id="monday-tab" data-toggle="tab" href="#monday"
                                         role="tab" aria-controls="monday" aria-expanded="true">

                                         <div class="item-text">
                                             <h4>1. ส่งใบสมัคร</h4>
                                         </div>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab"
                                         aria-controls="tuesday">
                                         <div class="item-text">
                                             <h4>2. ประกาศรายชื่อ</h4>
                                         </div>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#wednesday"
                                         role="tab" aria-controls="wednesday">
                                         <div class="item-text">
                                             <h4>3. ทำสัญญาการกู้ยืม</h4>
                                         </div>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab"
                                         aria-controls="thursday">
                                         <div class="item-text">
                                             <h4>4. บันทึกค่าเล่าเรียน/ค่าครองชีพ</h4>
                                             <h5>*นักศึกษาต้องกรอกข้อมูล</h5>
                                         </div>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#friday" role="tab"
                                         aria-controls="friday">
                                         <div class="item-text">
                                             <h4>5. เซ็นต์แบบยืนยัน</h4>
                                         </div>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <div class="schedule-tab-content col-md-9 col-lg-9 col-xs-12 clearfix">
                         <div class="tab-content" id="myTabContent">
                             <div class="tab-pane fade show active" id="monday" role="tabpanel"
                                 aria-labelledby="monday-tab">
                                 <div id="accordion">
                                     <div class="card">
                                         <div id="headingOne">
                                             <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne" aria-expanded="false"
                                                 aria-controls="collapseOne">
                                                 <div class="images-box">
                                                     <img class="img-fluid" src="assets/img/speaker/speakers-1.jpg"
                                                         alt="">
                                                 </div>
                                                 <h4>รายการเอกสารกู้ยืมเงินเพื่อการศึกษา</h4>
                                                 <h5 class="name">เอกสารทั้งหมด</h5>
                                             </div>
                                         </div>
                                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                             <div class="card-body">
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> แบบคำขอกู้ยืมเงิน TU1 พร้อมติดรูปถ่าย
                                                     สวมใส่ชุดนักศึกษา ขนาด 1.5 นิ้ว จำนวน 1
                                                     รูป</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> ใบเกรดพิมพ์จาก www. reg.tu.ac.th นศ.ชั้นปีที่ 1/2562
                                                     ใช้สำเนาใบเกรด
                                                     มัธยมศึกษาตอนปลาย </p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> เอกสารรับรองรายได้
                                                     (พร้อมทั้งสำเนาบัตรประตัวตัวข้าราชการ/รัฐวิษาหกิจฯ
                                                     ของผู้รับรองรายได้)
                                                     (เฉพาะ นศ.ที่ประสงค์จะกู้ยืม)</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> สำเนาบัตรประจำตัวประชาชน และสำเนาทะเบียนบ้านของ นศ.
                                                     และบิดามารดา หรือผู้ปกครอง
                                                     จำนวน 1 ชุด
                                                 </p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> สำเนาใบเปลี่ยนชื่อ-สกุล(ถ้ามี)</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> แผนผังแสดงที่ตั้งของบ้าน/ที่อยู่อาศัยของ บิดา,มารดา
                                                     หรือผู้ปกครอง</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> ภาพถ่ายบ้านหรือที่พักของ บิดาหรือมารดาหรือผู้ปกครอง
                                                     ของผู้กู้ยืม</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> สำเนาใบมรณะบัตรของบิดา/มาดา(ถ้ามี)</p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1">
                                                     ฟอร์มแสดงความคิดเห็นของอาจารย์ที่ปรึกษา(นศ.ชั้นปีที่1/2562
                                                     ไม่ต้องแนบฟอร์มนี้)
                                                 </p>
                                                 <input class="form-check-input" type="checkbox" value=""
                                                     id="defaultCheck1">
                                                 <p class="text1"> สำเนาใบหน้าเลขที่บัญชีสมุดคู่ฝากธนาคารกรุงไทยฯ จำนวน
                                                     1 ชุด</p>
                                                 <input class="form-check-input" type="checkbox" name="radioNoLabel"
                                                     id="radioNoLabel1" value="" aria-label="...">
                                                 <p class="text1"> เอกสารอื่นๆ</p>
                                                 <div class="text-center">
                                                     <button type="button"
                                                         class="btn btn-outline-secondary">รอเอกสาร</button>
                                                     <button type="button"
                                                         class="btn btn-outline-success">ส่งเอกสารเสร็จสิ้น</button>
                                                     <button type="button"
                                                         class="btn btn-outline-danger">ยกเลิกเอกสาร</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                                 <div id="accordion2">
                                     <div class="card">
                                         <div id="headingOne1">
                                             <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne1" aria-expanded="false"
                                                 aria-controls="collapseOne1">
                                                 <div class="images-box">
                                                     <img class="img-fluid" src="assets/img/speaker/speakers-1.jpg"
                                                         alt="">
                                                 </div>
                                                 <h4>ประกาศรายชื่อผู้กู้</h4>
                                                 <h5 class="name"></h5>
                                             </div>
                                         </div>
                                         <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1"
                                             data-parent="#accordion2">
                                             <div class="card-body">
                                                 <form>
                                                     <p class="card-text">
                                                     <h5 class="text-center">
                                                         <?php echo $_SESSION['name']; ?>
                                                     </h5>
                                                     <h3 class="text-center">
                                                         <p class="text-center"><?php if ($pass == true) {
                                                                                        echo "มีสิทธิ์ผ่านการกู้";
                                                                                    } else {
                                                                                        echo "ไม่มีสิทธิ์ผ่านการกู้";
                                                                                    } ?></p>
                                                     </h3>
                                                     </p>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                                 <div id="accordion3">
                                     <div class="card">
                                         <div id="headingOne3">
                                             <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne3" aria-expanded="false"
                                                 aria-controls="collapseOne3">
                                                 <div class="images-box">
                                                     <img class="img-fluid" src="assets/img/speaker/speakers-1.jpg"
                                                         alt="">
                                                 </div>
                                                 <h4>สถานะทำสัญญาการกู้ยืม</h4>
                                                 <h5 class="name"></h5>
                                             </div>
                                         </div>
                                         <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3"
                                             data-parent="#accordion3">
                                             <div class="card-body">
                                                 <h5 class="text-center">
                                                     <?php echo $_SESSION['name']; ?>
                                                 </h5>
                                                 <div class="text-center">
                                                     <button type="button"
                                                         class="btn btn-outline-secondary">รอทำสัญญา</button>
                                                     <button type="button"
                                                         class="btn btn-outline-success">ทำสัญญาเสร็จสิ้น</button>
                                                     <button type="button"
                                                         class="btn btn-outline-danger">ยกเลิกสัญญา</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                 </div>
                             </div>
                             <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                                 <div id="accordion4">
                                     <div class="card">
                                         <div id="headingOne">
                                             <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne4" aria-expanded="false"
                                                 aria-controls="collapseOne4">
                                                 <div class="images-box">
                                                     <img class="img-fluid" src="assets/img/speaker/speakers-1.jpg"
                                                         alt="">
                                                 </div>
                                                 <h4>นักศึกษาผู้กู้บันทึกค่าเล่าเรียน/ค่าครองชีพ</h4>
                                                 <h5 class="name"></h5>
                                             </div>
                                         </div>
                                         <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion4">
                                             <div class="card-body">
                                                 <div class="c">
                                                     <div class="row form-group">
                                                         <label class="col-md-3 control-label"
                                                             for="feemoney">ค่าเล่าเรียน /เทอม (บาท)</label>
                                                         <div class="col-md-3">
                                                             <div class="input-group">
                                                                 <span class="input-group-addon">
                                                                     <i class="glyphicon glyphicon-user"></i>
                                                                 </span>
                                                                 <input id="feemoney" name="feemoney" placeholder=""
                                                                     class="form-control input-md" type="text">
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="row form-group">
                                                         <label class="col-md-3 control-label"
                                                             for="cost_of_living">ค่าครองชีพ /เดือน (บาท)</label>
                                                         <div class="col-md-3">
                                                             <div class="input-group">
                                                                 <span class="input-group-addon">
                                                                     <i class="glyphicon glyphicon-user"></i>
                                                                 </span>
                                                                 <input id="cost_of_living" name="cost_of_living"
                                                                     placeholder="" class="form-control input-md"
                                                                     type="text">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="text-center">
                                                         <button type="button"
                                                             class="btn btn-outline-warning">แก้ไข</button>
                                                         <button type="button"
                                                             class="btn btn-outline-success">บันทึก</button>
                                                         <button type="button"
                                                             class="btn btn-outline-danger">ยกเลิก</button>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                                 <div id="accordion3">
                                     <div class="card">
                                         <div id="headingOne3">
                                             <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne3" aria-expanded="false"
                                                 aria-controls="collapseOne3">
                                                 <div class="images-box">
                                                     <img class="img-fluid" src="assets/img/speaker/speakers-1.jpg"
                                                         alt="">
                                                 </div>
                                                 <h4>สถานะเซ็นต์แบบยืนยัน</h4>
                                                 <h5 class="name"></h5>
                                             </div>
                                         </div>
                                         <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3"
                                             data-parent="#accordion3">
                                             <div class="card-body">
                                                 <h5 class="text-center">
                                                     <?php echo $_SESSION['name']; ?>
                                                 </h5>
                                                 <div class="text-center">
                                                     <button type="button"
                                                         class="btn btn-outline-secondary">รอเซ็นต์แบบยืนยัน</button>
                                                     <button type="button"
                                                         class="btn btn-outline-success">เซ็นต์แบบยืนยันเสร็จสิ้น</button>
                                                     <button type="button"
                                                         class="btn btn-outline-danger">ยกเลิก</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </section>
         <!--จบสถานะทั้งหมด-->


         <!-- Footer Section Start -->
         <footer class="footer-area section-padding">
             <div class="container">
                 <div class="row justify-content-md-center">
                     <class class="row">
                         <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                             <h3><img src="assets/img/logosystem.png" alt=""></h3>
                         </div>
                     </class>
                 </div>
             </div>
             <div class="container">
                 <div class="row justify-content-md-center">
                     <div class="row">
                         <!-- /.widget -->
                         <div class="widget">
                             <h5 class="widget-title">FOLLOW US ON</h5>
                             <ul class="footer-social">
                                 <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                 <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                 <li><a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a></li>
                                 <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </footer>
         <!-- Footer Section End -->
         <div id="copyright">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="site-info">
                             <p>ระบบติดตามสถานะการกู้ยืมเงินกรอ. และ กยศ. มหาวิทยาลัยธรรมศาสตร์ &nbsp Tracking
                                 System For e-Studentloan In Thammasat University</a>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Go to Top Link -->
         <a href="#" class="back-to-top">
             <i class="lni-chevron-up"></i>
         </a>

         <div id="preloader">
             <div class="sk-circle">
                 <div class="sk-circle1 sk-child"></div>
                 <div class="sk-circle2 sk-child"></div>
                 <div class="sk-circle3 sk-child"></div>
                 <div class="sk-circle4 sk-child"></div>
                 <div class="sk-circle5 sk-child"></div>
                 <div class="sk-circle6 sk-child"></div>
                 <div class="sk-circle7 sk-child"></div>
                 <div class="sk-circle8 sk-child"></div>
                 <div class="sk-circle9 sk-child"></div>
                 <div class="sk-circle10 sk-child"></div>
                 <div class="sk-circle11 sk-child"></div>
                 <div class="sk-circle12 sk-child"></div>
             </div>
         </div>
         
         <?php
        } else
             
    echo "<h1>กรุณาเข้าสู่ระะบบ</h1>"
            ?>
            
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="assets/js/jquery-min.js"></script>
         <script src="assets/js/popper.min.js"></script>
         <script src="assets/js/bootstrap.min.js"></script>
         <script src="assets/js/jquery.countdown.min.js"></script>
         <script src="assets/js/jquery.nav.js"></script>
         <script src="assets/js/jquery.easing.min.js"></script>
         <script src="assets/js/wow.js"></script>
         <script src="assets/js/jquery.slicknav.js"></script>
         <script src="assets/js/nivo-lightbox.js"></script>
         <script src="assets/js/main.js"></script>
         <script src="assets/js/form-validator.min.js"></script>
         <script src="assets/js/contact-form-script.min.js"></script>


 </body>

 </html>