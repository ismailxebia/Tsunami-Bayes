<?php
session_start();
$field = array('email','password');
$error = array();
$msg = array();

if(isset($_POST['login'])){
    foreach($field as $f){
        if(!isset($_POST[$f]) or !$_POST[$f]){
            $error[] = $f; //$error = array('username','password');
            $msg[$f] = $f.' harus diisi';
        }  else {
            if(!preg_match('%[a-zA-Z0-9_]%', $_POST[$f]))
            $error[] = $f;
            $msg[$f] = $f.' hanya alfabet dan angka yang diperbolehkan';
        }    
    }
}
function isValid($fieldName,$msg,$error){
    if(isset($_POST['login'])){
        if($fieldName == 'email'){
            if (in_array('email',$error))
            return $msg[$fieldName];
        }
        if($fieldName == 'password'){
            if (in_array('password',$error))
            return $msg[$fieldName];
        }
    }
}
function isError($error){
    if($error){
        echo "<script>
            $(document).ready(function(){
                $('.dropdown-toggle').dropdown('toggle');
               
            });
            
        </script>";
    }else{
        //cek ke database
        if(isset($_POST['login'])){
			
          $email = $_POST['email'];
                        $password = $_POST['password'];
                        //select username dan password dr db 
                        $sql = "SELECT * FROM tb_user WHERE email='$email' AND password='$password' AND status_admin='Y'";
                        $result = mysql_query($sql)or die(mysql_error());
                        $num = mysql_num_rows($result);
						
                        //bila ada yg cocok, berarti user terdaftar
                        if($num > 0){
                            $data = mysql_fetch_assoc($result);
                        //set $_SESSION['isAdmin'] = TRUE
                            $_SESSION['isAdmin'] = TRUE;
                            $_SESSION ['id_pakar'] = $data['id_user'];
                            //$_SESSION['hak_akses'] = $data ['Hak_Akses'];
                            //echo "heheh";
							echo '<script> window.location.href="index.php" </script>';
                        }  

            else{
                 echo "<script>
                        $(document).ready(function(){
                            $('.dropdown-toggle').dropdown('toggle');       
                        });
                        </script>
                        <p class='text-warning'>Email tidak terdaftar</p>";
            
            }
        }
    }
}

 