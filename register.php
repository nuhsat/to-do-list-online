<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $nama = "";
    $email ="";
    $alamat = "";
    $password = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
    
        $encrypt_password = md5($password);

        $query_regis = mysqli_query($connect, "SELECT nama_user FROM user WHERE email_user='$email'");
 
        if(mysqli_num_rows($query_regis)){
            $data =array(
                'message' => "Email Already Taken!",
                'status' => "409"
            );
        }
        else{
            $query_register = mysqli_query($connect,"INSERT INTO user (nama_user, email_user, password_user) VALUES ('$nama', '$email', '$encrypt_password') ");
         
            if($query_register){
                $query = mysqli_query($connect, "SELECT id_user,nama_user,email_user FROM user WHERE email_user='$email' AND password_user='$password_user'");

                if(mysqli_num_rows($query)){        
                    $result = mysqli_fetch_assoc($query);
                    
                    $data =array(
                        'message' => "Profile ada",
                        'data' => $result,
                        'status' => "200"
                    );
                }
                else{
                    $data =array(
                        'message' => "Profile gagal",
                        'status' => "404"
                    );

                }
            }
            else {
                $data =array(
                    'message' => "Register Failed!",
                    'status' => "404"
                ); 
            }

        }
        echo json_encode($data);
    }
?>
