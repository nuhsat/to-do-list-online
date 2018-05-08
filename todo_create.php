<?php

  include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_user ="";
    $judul = "";
    $deskripsi ="";
    $duedate = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_user = $request->id_user;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $duedate = $request->duedate;
        
        $query_regis = mysqli_query($connect, "SELECT judul FROM todo_list WHERE id_user='$id_user'");
 
        if(mysqli_num_rows($query_regis)>=20){
            $data =array(
                'message' => "Maksimal To Do List!",
                'status' => "409"
            );
        }
        else{
            $query_register = mysqli_query($connect,"INSERT INTO todo_list (id_user, judul, deskripsi, duedate) VALUES ('$id_user', '$judul', '$deskripsi', '$duedate') ");
         
            if($query_register){
            
                $data =array(
                    'message' => "Create To do List Success!",
                    'status' => "200"
                );
            }
            else {
                $data =array(
                    'message' => "Create To do List Failed!",
                    'status' => "404"
                ); 
            }
        }

        

    
        echo json_encode($data);
    }
?>
