<?php
    include 'db_connect.php';

   $postdata = file_get_contents("php://input");
   $id_user ="";
   $nama = "";
   $email = "";
   $password_old = "";
   $password_new = "";

    if (isset($postdata)) {
       $request = json_decode($postdata);
       $id_user = $request->id_user;
       $nama = $request->nama;
       $email = $request->email;
       $password_old = $request->password_old;
       $password_new = $request->password_new;
 
        $encrypt_password_old = md5($password_old);
        $encrypt_password_new = md5($password_new);
        
        $query_cek = mysqli_query($connect, "SELECT nama_user FROM user WHERE email_user='$email' AND password_user ='$encrypt_password_old' ");
        if(mysqli_num_rows($query_login)){
        
                $q = mysqli_query($connect, "UPDATE user SET nama_user='$nama', email_user='$email', password_user='$encrypt_password_new' WHERE id_user='$id_user'");

                if($q){
                    $data =array(
                        'message' => "Update Data Profile Succses",
                        'status' => "200"
                    );    
                }
                else{
                    $data =array(
                        'message' => "Update Data Profile Failed",
                        'status' => "404"
                    );    
                }
         }
         else {
                $data =array(
                    'message' => "Password Wrong",
                    'status' => "404"
                ); 
         }
        
        
        
        
    }
    echo json_encode($data);

?>
