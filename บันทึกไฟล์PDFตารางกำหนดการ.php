<?php
include_once 'data.php';
if(isset($_POST['submitaddfile']))
{   

 $file = $_FILES['fileToUpload']['name'];
    $file_loc = $_FILES['fileToUpload']['tmp_name'];
 $file_size = $_FILES['fileToUpload']['size'];
 $file_type = $_FILES['fileToUpload']['type'];
 $folder="uploads/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO file(file_name,type,size) VALUES('$final_file','$file_type','$new_size')";
  mysqli_query($conn,$sql);
  echo "ไฟล์ ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ได้รับการอัปโหลด" ;

 }
 else
 {
  echo  "ขออภัยเกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
		
		}
   }
   
?>