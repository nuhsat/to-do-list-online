<?php
    include 'db_connect.php';

    $postdata = file_get_contents("php://input");
    $id_todo = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $id_todo = $request->id_todo;
        
        $q = mysqli_query($connect, "DELETE FROM todo_list WHERE id_todo='$id'");

        $data =array(
            'message' => "Delete To Do List Succses",
            'status' => "200"
        );
    }
    echo json_encode($data);

?>