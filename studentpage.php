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


     <!-- สร้างคำร้อง-->
     <script>
     $(document).ready(function() {

         $('input').attr('readonly', true);
         $(':radio:not(:checked)').attr('disabled', true);

     });
     </script>

     <!-- จบสร้างคำร้อง   -->
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
                             <a class="nav-link" href="#header-wrap">
                                 หน้าหลัก
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#about">
                                 กำหนดการ
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#schedules">
                                 สร้างคำร้อง
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#pricing">
                                 ติดตามสถานะ
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#team">
                                 ข่าวประชาสัมพันธ์
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="#faq">
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

         <!-- เริ่ม ส่วน slide-->
         <div id="main-slide" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                 <li data-target="#main-slide" data-slide-to="1"></li>
                 <li data-target="#main-slide" data-slide-to="2"></li>
             </ol>
             <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img class="d-block w-100" src="assets/img/slider/slide1.jpg" alt="First slide">
                     <div class="carousel-caption d-md-block">
                         <p class="fadeInUp wow" data-wow-delay=".6s">WELCOME TO</p>
                         <h1 class="wow bounceIn heading" data-wow-delay=".4s">Tracking System <br>For e-Studentloan
                             <br>In Thammasat University
                         </h1>
                         <a href="#" class="fadeInLeft wow btn btn-common btn-lg"
                             data-wow-delay=".6s"><?php echo $_SESSION['name']; ?></a>
                     </div>
                 </div>
                 <div class="carousel-item">
                     <img class="d-block w-100" src="assets/img/slider/slide2.jpg" alt="Second slide">
                     <div class="carousel-caption d-md-block">
                         <p class="fadeInUp wow" data-wow-delay=".6s">WELCOME TO</p>
                         <h1 class="wow bounceIn heading" data-wow-delay=".4s">Tracking System <br>For e-Studentloan
                             <br>In Thammasat University
                         </h1>
                         <a href="#" class="fadeInLeft wow btn btn-common btn-lg"
                             data-wow-delay=".6s"><?php echo $_SESSION['name']; ?></a>
                     </div>
                 </div>
                 <div class="carousel-item">
                     <img class="d-block w-100" src="assets/img/slider/slide3.jpg" alt="Third slide">
                     <div class="carousel-caption d-md-block">
                         <p class="fadeInUp wow" data-wow-delay=".6s">WELCOME TO</p>
                         <h1 class="wow bounceIn heading" data-wow-delay=".4s">Tracking System <br>For e-Studentloan
                             <br>In Thammasat University
                         </h1>
                         <a href="#" class="fadeInUp wow btn btn-common btn-lg"
                             data-wow-delay=".8s"><?php echo $_SESSION['name']; ?></a>
                     </div>
                 </div>
             </div>
             <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
                 <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
                 <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
         <!-- จบส่วน slide -->

     </header>
     <!-- จบส่วน Header -->
     


     <!-- เริ่มส่วน About -->
     <section id="about" class="section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="section-title-header text-center">
                         <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">กำหนดการ</h1>
                         <p class="wow fadeInDown" data-wow-delay="0.2s">ตารางกำหนดการ การกู้ยืมเงินเพื่อการศึกษา กรอ.
                             และ กยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-xs-12 col-md-6 col-lg-4">
                     <div class="about-item">
                         <img class="img-fluid" src="assets/img/about/img1.jpg" alt="">
                         <div class="about-text">
                             <h3><a href="#">เทอม 1 รุ่น 1 ไม่ย้ายสถานที่ศึกษา</a></h3>
                             <p>กำหนดการกู้ยืมเงินเพื่อการศึกษา62</p>
                             <a class="btn btn-common btn-rm" href="assets/pdf/กำหนดการ.pdf">ดูเพิ่มเติม</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-xs-12 col-md-6 col-lg-4">
                     <div class="about-item">
                         <img class="img-fluid" src="assets/img/about/img2.jpg" alt="">
                         <div class="about-text">
                             <h3><a href="#">เทอม 1 รุ่น 2 รายใหม่,รายเก่า</a></h3>
                             <p>กำหนดการกู้ยืมเงินเพื่อการศึกษา62</p>
                             <a class="btn btn-common btn-rm" href="assets/pdf/กำหนดการ.pdf">ดูเพิ่มเติม</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-xs-12 col-md-6 col-lg-4">
                     <div class="about-item">
                         <img class="img-fluid" src="assets/img/about/img3.jpg" alt="">
                         <div class="about-text">
                             <h3><a href="#">เทอม 2</a></h3>
                             <p>กำหนดการกู้ยืมเงินเพื่อการศึกษา62</p>
                             <a class="btn btn-common btn-rm" href="assets/pdf/กำหนดการ.pdf">ดูเพิ่มเติม</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- About Section End -->

     <!-- Schedule Section Start สร้างคำร้อง -->

     <section id="schedules" class="schedule section-padding">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-12">
                     <div class="section-title-header text-center">
                         <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">สร้างคำร้อง</h1>
                         <p class="wow fadeInDown" data-wow-delay="0.2s">
                             สร้างคำร้องการกู้ยืมเงินเพื่อการศึกษา กรอ. และ กยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                     </div>
                 </div>
                 <div class="col-lg-7 col-md-12 col-xs-12">
                     <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                         <div class="form-wrapper">
                             <form action="สร้างคำร้อง.php" role="form" method="post" id="contactForm"
                                 name="contact-form" data-toggle="validator">
                                 <div class="row">
                                     <div class="col-md-12 form-line">
                                         <h7>ประเภททุน &nbsp</h7>
                                         <label class="radio-inline"><input type="radio" name="e-student_type" value="1"
                                                 <?php if ($_student_type == 1) {
                                                                                                                                    echo 'checked="checked"';
                                                                                                                                } ?>>&nbsp กรอ.รายเก่า &nbsp </label>
                                         <label class="radio-inline"><input type="radio" name="e-student_type" value="2"
                                                 <?php if ($_student_type == 2) {
                                                                                                                                    echo 'checked="checked"';
                                                                                                                                } ?>>&nbsp กรอ.รายใหม่ &nbsp </label>
                                         <label class="radio-inline"><input type="radio" name="e-student_type" value="3"
                                                 <?php if ($_student_type == 3) {
                                                                                                                                    echo 'checked="checked"';
                                                                                                                                } ?>>&nbsp กยศ.รายเก่า &nbsp </label>
                                         <label class="radio-inline"><input type="radio" name="e-student_type" value="4"
                                                 <?php if ($_student_type == 4) {
                                                                                                                                    echo 'checked="checked"';
                                                                                                                                } ?>>&nbsp กยศ.รายใหม่ &nbsp </label>
                                         <div class="form-group">
                                             <label for="student_id">รหัสนักศึกษา</label>
                                             <input type="tel" class="form-control" id="student_id" name="subject"
                                                 placeholder="รหัสนักศึกษา"
                                                 value=" <?php echo $_SESSION["studentID"] ?>">
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 form-line">
                                         <div class="form-group">
                                             <label for="student_name">ชื่อจริง-นามสกุล</label>
                                             <input type="text" class="form-control" id="name" name="Name"
                                                 value="<?php echo $_SESSION["name"] ?>">
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>

                                     <div class="col-md-6 form-line">
                                         <div class="form-group">
                                             <label for="grade">เกรดเฉลี่ย</label>
                                             <input type="text" class="form-control" id="grade" name="Grade"
                                                 value=" <?php echo $_grade; ?> ">
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 form-line">
                                         <div class="form-group">
                                             <label for="parent_income">รายได้ผู้ปกครอง/ปี(บาท)</label>
                                             <input type="text" class="form-control" id="parentincome" name="Parent"
                                                 value="<?php echo $_parent_income; ?> ">
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 form-line">
                                         <div class="form-group">
                                             <label for="volunteer">จำนวนจิตอาสา(ชั่วโมง)</label>
                                             <input type="text" class="form-control" id="volunteer" name="Volun"
                                                 value=" <?php echo $_volunteer; ?>">
                                             <div class="help-block with-errors"></div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 form-group">
                                         <label for="phone_number">เบอร์ติดต่อ</label>
                                         <input type="tel" class="form-control" id="phonenumber" name="tel"
                                             value="  <?php echo $_phone_number; ?>">
                                         <div class="help-block with-errors"></div>
                                     </div>
                                 </div>

                             </form>

                             <div class="form-submit">
                                 <form action="สร้างคำร้องใหม่.php"> <button class="btn btn-common"
                                         style=background-color:#E91E63> แก้ไขคำร้อง
                                     </button>
                                 </form>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Schedule Section End สร้างคำร้อง -->


         <!-- เริ่ม q&a -->
         <section id="faq" class="section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-title-header text-center">
                             <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">คำถามที่พบบ่อย?</h1>
                             <p class="wow fadeInDown" data-wow-delay="0.2s">
                                 คำถามที่พบบ่อยเกี่ยวกับการกู้ยืมเงินเพื่อการศึกษา กรอ. และ กยศ.</p>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                         <div class="accordion">
                             <div class="card">
                                 <div class="card-header" id="headingTwo2">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionTwo2"
                                         aria-expanded="false" aria-controls="questionTwo">
                                         <i class="lni-pencil"></i> นักเรียน นักศึกษา ที่มีประสงค์จะกู้ยืมเงิน
                                         เบื้องต้นต้องดำเนินการอย่างไร?
                                     </div>
                                 </div>
                                 <div id="questionTwo2" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#question">
                                     <div class="card-body">
                                         นักเรียน นักศึกษาต้องดำเนินการ ดังนี้ 1. นักเรียน นักศึกษา
                                         ต้องเข้าเว็บไซต์ของกองทุน www.studentloan.or.th
                                         อย่างสม่ำเสมอเพื่อให้ทราบระเบียบ ประกาศและหลักเกณฑ์ที่เกี่ยวข้อง
                                         รวมถึงข่าวสารต่างๆ ของกองทุน เช่น กำหนดการให้กู้ยืมเงินประจำปีการศึกษา
                                         ขอบเขตการให้กู้ยืมเงิน
                                         เป็นต้น 2. นักเรียน นักศึกษา (ที่ยังไม่มีรหัสผ่าน)
                                         ต้องเข้าไปลงทะเบียนขอรหัสผ่าน (Pre-register) ในระบบ e-studentloan
                                         เพื่อยื่นขอกู้ยืมเงินให้แล้วเสร็จภายในระยะเวลาที่กองทุนกำหนด 3.
                                         แสดงตนกับถานศึกษาที่เข้าศึกษา
                                         เพื่อจัดทำแบบคำขอกู้ยืมเงินต่อสถานศึกษาเพื่อพิจารณาคัดเลือกต่อไป
                                     </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingOne">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionOne"
                                         aria-expanded="true" aria-controls="collapseOne">
                                         <i class="lni-pencil"></i>
                                         ผู้กู้ยืมจะติดตามเรื่องการโอนเงินค่าครองชีพด้วยตนเองได้อย่างไร?
                                     </div>
                                 </div>
                                 <div id="questionOne" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#question">
                                     <div class="card-body">
                                         ผู้กู้ยืมสามารถตรวจสอบสถานะการโอนเงินของตนเองได้ ดังนี้ <br> 1.
                                         เว็บไซต์ของกองทุนที่ www.studentloan.or.th โดยเลือกตรวจสอบยอดหนี้
                                         (ธนาคารกรุงไทย) หรือ (ธนาคารอิสลามแห่งประเทศไทย) <br> 2. แอปพลิเคชันเป๋าตัง
                                         โดยสามารถตรวจสอบข้อมูลเงินกยศ.
                                         และชำระยอดเงินกู้ได้ทันที
                                         โดยไม่มีการเรียกเก็บค่าธรรมเนียมการใช้บริการแต่อย่างใด<br> 3.
                                         ติดต่อสถานศึกษาโดยขอเลขที่ใบนำส่งของชุดเอกสารที่ส่งให้ธนาคาร
                                         เพื่อตรวจสอบกับธนาคารว่าได้รับเอกสารแล้วหรือไม่
                                         เพื่อที่จะสามารถประมาณการช่วงเวลาที่ธนาคารจะโอนเงินให้ได้
                                     </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingTwo">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionTwo"
                                         aria-expanded="false" aria-controls="questionTwo">
                                         <i class="lni-pencil"></i> กยศ. มีการคำนวนจำนวนเงินที่ต้องหักส่งอย่างไร?
                                     </div>
                                 </div>
                                 <div id="questionTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#question">
                                     <div class="card-body">
                                         กรณีเงื่อนไขชำระหนี้เป็นรายเดือน
                                         จำนวนเงินที่จะถูกหักในแต่ละเดือนเป็นจำนวนเงินที่ระบุในสัญญาที่ผู้กู้ยืมได้ตกลง
                                         <br> กรณีเงื่อนไขชำระหนี้เป็นรายปี จำนวนเงินที่ต้องหักนำส่งชำระหนี้แต่ละเดือน
                                         คำนวนจากยอดชำระตามตารางผ่อนชำระหนี้รายปีของผู้กู้ยืมตามสัญญา
                                         15 ปี โดยนำมาหารจ่ายรายเดือนก่อนวันครบกำหนดชำระหนี้ 5 กรกฎาคมของปีถัดไป
                                     </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingThree">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionThree"
                                         aria-expanded="false" aria-controls="questionThree">
                                         <i class="lni-pencil"></i> กยศ. กำหนดเงินเดือนขั้นต่ำเท่าไหร่จึงจะสามารถหักได้?
                                     </div>
                                 </div>
                                 <div id="questionThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#question">
                                     <div class="card-body">
                                         ตามกฎหมายไม่ระบุเงินเดือนขั้นต่ำ
                                         แต่ระบุให้นายจ้างมีหน้าที่หักตามจำนวนที่กองทุนแจ้ง
                                         กรณีที่ลูกหนี้รายใดสามารถหักได้ตามที่กองทุนแจ้ง
                                         ให้นายจ้างเป็นผู้หักเงินนำส่งกรมสรรพากร
                                         ส่วนลูกหนี้รายใดที่ไม่สามารถหักเงินเดือน เพื่อนำส่งกรมสรรพากรได้
                                         ให้นายจ้างดำเนินการแจ้งข้อมูลลูกหนี้ดังกล่าวกลับมายังกองทุน
                                         เพื่อให้กองทุนพิจารณาเป็นรายกรณีต่อไป </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                         <div class="accordion">
                             <div class="card">
                                 <div class="card-header" id="headingOne2">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionOne2"
                                         aria-expanded="true" aria-controls="collapseOne">
                                         <i class="lni-pencil"></i> บุคคลใดเป็นผู้รับรองรายได้?
                                     </div>
                                 </div>
                                 <div id="questionOne2" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#question">
                                     <div class="card-body">
                                         กรณีครอบครัวไม่มีรายได้ประจำหรือไม่มีบัตรสวัสดิการแห่งรัฐ ให้นักเรียน
                                         นักศึกษาผู้ขอกู้ยืมเงินจัดหาเจ้าหน้าที่ของรัฐ
                                         เจ้าหน้าที่ของรัฐผู้รับบำเหน็จบำนาญ สมาชิกสภาเขต สมาชิกสภากรุงเทพมหานคร
                                         ผู้ว่าราชการกรุงเทพมหานคร
                                         หรือหัวหน้าสถานศึกษาที่นักเรียนหรือนักศึกษาผู้ขอกู้ยืมเงินศึกษาอยู่
                                         เป็นผู้รับรองรายได้ ประกอบการพิจารณาด้วย </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingThree">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionFour"
                                         aria-expanded="false" aria-controls="questionFour">
                                         <i class="lni-pencil"></i> เมื่อต้องการยกเลิกการกู้ยืม ให้เป็นสถานะ
                                         "ไม่เคยยื่นกู้" ต้องทำอย่างไร?
                                     </div>
                                 </div>
                                 <div id="questionFour" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#question">
                                     <div class="card-body">
                                         ผู้กู้ต้องไปติดต่อสถานศึกษาที่เคยยื่นกู้ให้ดำเนินการยกเลิกสัญญา
                                         และแบบยืนยันการลงทะเบียนในระบบ e-studentloan <br> 1.ขอแบบฟอร์มการยกเลิกสัญญา
                                         และแบบยืนยันการลงทะเบียน จากสถานศึกษา <br> 2.ผู้บริหารสถานศึกษาและผู้กู้ยืม
                                         เซ็นชื่อในเอกสาร <br>
                                         3.นำแบบฟอร์มการคืนเงินจากสถานศึกษาไปชำระเงินที่ธนาคารกรุงไทยเพื่อชำระยอดปิดบัญชี
                                         <br> 4.เขียนคำร้อง แจ้งรายละเอียดเหตุผลในการยกเลิกสถานะการกู้ยืม หมายเหตุ
                                         ส่งสำเนาใบเสร็จการชำระเงินพร้อมเอกสารข้างต้น
                                         ผู้อำนวยการฝ่ายบริหารโครงการภาครัฐ เบอร์แฟกซ์ 0 2256 8198 ยืนยันการส่งแฟกซ์
                                         โทร. 0 2208 8699
                                     </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingThree">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionFive"
                                         aria-expanded="false" aria-controls="questionFive">
                                         <i class="lni-pencil"></i>ดอกเบี้ยและค่าธรรมเนียมคิดอย่างไร (สำหรับผู้กู้ยืม)?
                                     </div>
                                 </div>
                                 <div id="questionFive" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#question">
                                     <div class="card-body">
                                         อัตราดอกเบี้ยร้อยละ 1 ตามสัญญากู้ยืมเดิม
                                         และการชำระหนี้ผ่านนายจ้างจะไม่มีค่าธรรมเนียมใดๆ หมายความว่า
                                         เงินที่ผู้ยืมถูกหักจากเงินเดือนจะนำไปลดหนี้ทั้งจำนวน </div>
                                 </div>
                             </div>
                             <div class="card">
                                 <div class="card-header" id="headingThree">
                                     <div class="header-title" data-toggle="collapse" data-target="#questionSix"
                                         aria-expanded="false" aria-controls="questionSix">
                                         <i class="lni-pencil"></i> บุคคลใดเป็นผู้ค้ำประกันในสัญญากู้ยืมเงิน?
                                     </div>
                                 </div>
                                 <div id="questionSix" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#question">
                                     <div class="card-body">
                                         ผู้ค้ำประกันต้องเป็นผู้บรรลุนิติภาวะ ดังนี้ บิดา มารดา หรือผู้ใช้อำนาจปกครอง
                                         หรือคู่สมรส
                                         หรือบุคคลที่ประกอบอาชีพมีรายได้น่าเชื่อถือตามที่คณะกรรมการพิจารณาให้กู้ยืมประจำสถานศึกษา
                                         กำหนด ให้เป็นผู้ค้ำประกันได้ </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- จบ q&a -->


         <!-- Ticket Pricing Area Start ติดตามสถานะ-->
         <section id="pricing" class="section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-title-header text-center">
                             <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">ติดตามสถานะ</h1>
                             <p class="wow fadeInDown" data-wow-delay="0.2s">ติดตามสถานะการกู้ยืมเงินเพื่อการศึกษา กรอ.
                                 และ กยศ. มหาวิทยาลัยธรรมศาสตร์</p>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
                         <div class="price-block-wrapper wow fadeInLeft" data-wow-delay="0.2s">
                             <div class="icon">
                                 <i class="lni-comments"></i>
                             </div>
                             <div class="colmun-title">
                                 <h5>สถานะการกู้</h5>
                             </div>
                             <div class="pricing-list">
                                 <ul>
                                     <li><?php if ($pass == true) {
                                                    echo "  มีสิทธิ์ผ่านการกู้ รอการพิจารณาจากเจ้าหน้าที่";
                                                } else {
                                                    echo "  ไม่มีสิทธิ์ผ่านการกู้ รอพิจารณาจากเจ้าหน้าที่";
                                                } ?></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <?php if ($count != 0) { ?>
                     <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
                         <div class="price-block-wrapper wow fadeInUp" data-wow-delay="0.3s">
                             <div class="icon">
                                 <i class="lni-user"></i>
                             </div>
                             <div class="colmun-title">
                                 <h5>ข้อมูลผู้กู้</h5>
                             </div>
                             <div class="pricing-list">
                                 <ul>
                                     <!-- แสดงข้อมูลการกู้ -->
                                     <br>
                                     ประเภทกองทุน : <?php
                                                            if ($_sutdent_type == 1) {
                                                                echo "กรอ.รายใหม่";
                                                            } else if ($_sutdent_type == 2) {
                                                                echo "กรอ.รายเก่า";
                                                            } else if ($_sutdent_type == 3) {
                                                                echo "กยศ.รายใหม่";
                                                            } else if ($_sutdent_type == 4) {
                                                                echo "กยศ.รายเก่า";
                                                            }
                                                            ?><br>
                                     รหัสนักศึกษา : <?php echo $_SESSION['studentID']; ?><br>
                                     ชื่อ-นามสกุล : <?php echo $_SESSION['name']; ?><br>
                                     เกรดเฉลี่ย : <?php echo $_grade; ?><br>
                                     รายได้ผู้ปกครอง/ปี(บาท) : <?php echo $_parent_income; ?><br>
                                     จำนวนจิตอาสา(ชั่วโมง) : <?php echo $_volunteer; ?><br>
                                     เบอร์ติดต่อ : <?php echo $_phone_number; ?><br>
                                     </p>
                                 </ul>
                             </div>

                         </div>
                     </div>
                     <?php } ?>
                     <div class="col-lg-4 col-sm-6 col-xa-12 mb-3">
                         <div class="price-block-wrapper wow fadeInRight" data-wow-delay="0.4s">
                             <div class="icon">
                                 <i class="lni-list"></i>
                             </div>
                             <div class="colmun-title">
                                 <h5>ติดตามสถานะ</h5>
                             </div>
                             <div class="pricing-list">
                                 <ul>
                                     <li><i class="lni-check-mark-circle"></i><span class="text">1.ส่งใบสมัคร</span>
                                     </li>
                                     <li><i class="lni-check-mark-circle"></i><span class="text">2.ประกาศรายชื่อ</span>
                                     <li><i class="lni-check-mark-circle"></i><span
                                             class="text">3.ทำสัญญาการกู้ยืม</span>
                                     </li>
                                     <li><i class="lni-check-mark-circle"></i><span
                                             class="text">4.บันทึกค่าเล่าเรียน<br>&nbsp &nbsp &nbsp/ค่าครองชีพ</span>
                                     </li>
                                     <li><i class="lni-close"></i><span class="text">5.เซ็นต์แบบยืนยัน</span>
                                     </li>
                                 </ul>
                             </div>
                             <!--ปุ่ม-->
                             <div class="col-xs-12">
                                 <a href="รายละเอียดสถานะ.php" class="btn btn-common">ดูรายละเอียดสถานะ</a>
                             </div>
                         </div>
                     </div>
         </section>
         <!-- Ticket Pricing Area End -->


         <!-- ข่าว Section Start -->
         <section id="team" class="section-padding text-center">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-title-header text-center">
                             <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">ข่าวประชาสัมพันธ์</h1>
                             <p class="wow fadeInDown" data-wow-delay="0.2s">
                                 ข่าวประชาสัมพันธ์เกี่ยวกับการกู้ยืมเงินเพื่อการศึกษา กรอ. และ กยศ.
                                 มหาวิทยาลัยธรรมศาสตร์</p>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-1.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-1.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="ccol-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-2.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-2.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="ccol-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-3.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-3.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="ccol-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-4.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-4.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="ccol-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-5.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-5.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                     <div class="ccol-md-6 col-sm-6 col-lg-4">
                         <div class="gallery-box">
                             <div class="img-thumb">
                                 <img class="img-fluid" src="assets/img/gallery/img-6.jpg" alt="">
                             </div>
                             <div class="overlay-box text-center">
                                 <a class="lightbox" href="assets/img/gallery/img-6.jpg">
                                     <i class="lni-plus"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row justify-content-center mt-3">
                     <div class="col-xs-12">
                         <a href="#" class="btn btn-common">ดูข่าวทั้งหมด</a>
                     </div>
                 </div>
             </div>
             <!-- ข่าว Section End -->



             <!-- Subscribe Area Start -->
             <div id="subscribe" class="section-padding">
                 <div class="container">
                     <div class="row justify-content-md-center">
                         <div class="col-md-10 col-lg-7">
                             <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                                 <h2 class="subscribe-title">ติดตามสถานะผู้กู้</h2>
                                 <form class="text-center form-inline">
                                     <input class="mb-20 form-control" name="email"
                                         placeholder="ค้นหาจากรหัสนักศึกษา หรือ ชื่อจริง-นามสกุล">
                                     <button type="submit" class="btn btn-common sub-btn" data-style="zoom-in"
                                         data-spinner-size="30" name="submit" id="submit">
                                         <span class="ladda-label"><i class="lni-check-box"></i> ติดตาม</span>
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Subscribe Area End -->

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
             <script src="assets/js/map.js"></script>
             <script type="text/javascript" &npbs
                 src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>

 </body>

 </html>