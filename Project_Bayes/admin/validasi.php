<?php
define('SITE_ROOT','C:/xampp/htdocs/SPK_Android'); //definisi variabel global site root untuk path
function validfile(){
    //klo file tidak empty, cek validasi
    if(!empty($_FILES["file"])){
        //set tipe file yang diperbolehkan
        $allowedExt= array("jpg","JPEG","JPG","png","PNG","gif","GIF","bmp","BMP");
        $extention= explode(".",$_FILES["file"]["name"]); 
        $extention= $extention[count($extention)-1];
        //cek kalo file size tidak melebihi ukuran maksimal yang ditetapkan
        //dan tipe file sesuai dg tipe yg diperbolehkan
        if (($_FILES["file"]["size"]<10000000) && in_array($extention,$allowedExt)){
            //cek kalo ada error
            if ($_FILES["file"]["error"]>0){
                echo 'error'.$_FILES["file"]["error"].'<br>';
            }
            else {
                if(move_uploaded_file($_FILES["file"]["tmp_name"], '../img/upload/'.$_FILES["file"]["name"])){
                    return TRUE;
                }
             else {
                 return FALSE;
             }
            }
        }
        else { //kalo file terlalu besar dan tipe tidak sesuai
            return FALSE;
        }
    }
    else { //filenya kosong
        return FALSE;
    }
}
?>
