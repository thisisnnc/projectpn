<?php
    
/////////////ส่วนลบไฟล์
include_once 'data.php';
if(isset($_POST['codeletepiclinede']))
{ 
$uid3=$_GET['codeletepiclinede'];
//echo"$uid";
$name3=$_GET['file_name'];
///จัดการลบข้อมูลในdatabase
if($uid3==''){

}else{
$strSQL3 = "DELETE FROM file_qrline WHERE file_name='$file_name'";
$delete="uploadsQRline/$id/"; //ใช้ในการทดสอบ
@unlink($delete);
echo"$delete";
$objQuery3 = mysql_query($strSQL3);
}
if($objQuery3==''){

}else{
	echo "ข้อมูลของท่านได้ถูกลบไปแล้วครับ";
}
}
/////////////ส่วนลบไฟล์
?>