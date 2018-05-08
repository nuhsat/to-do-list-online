<?php
    include 'db_connect.php';

   $postdata = file_get_contents("php://input");
   $id ="";
   $nama = "";
   $email = "";
   if (isset($postdata)) {
       $request = json_decode($postdata);
       $id = $request->id;
       $nama = $request->nama;
       $email = $request->email;
    

        $q = mysqli_query($connect, "UPDATE user SET nama_user='$nama', email_user='$email' WHERE id_user='$id_user'");

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
    echo json_encode($data);

?>