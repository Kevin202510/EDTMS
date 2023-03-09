<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_GET['getData'])){
        $DBCRUDAPI->select("documents","*");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            $reciever_id = $_POST["reciever_id"];
            $file_document_name = $_POST["file_document_name"];
            $sender_id = $_POST["sender_id"];
            $isRestricted = $_POST["isRestricted"];

            $DBCRUDAPI->insert('documents',['sender_id'=>$sender_id,'reciever_id'=>$reciever_id,'file_document_name'=>$file_document_name,'isRestricted'=>0]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){
            
            $doc_id = $_POST["doc_id"];
            $reciever_id = $_POST["reciever_id"];
            $file_document_name = $_POST["file_document_name"];
            $sender_id = $_POST["sender_id"];
            $isRestricted = $_POST["isRestricted"];

            $DBCRUDAPI->update('documents',['sender_id'=>$sender_id,'reciever_id'=>$reciever_id,'isRestricted'=>$isRestricted,'file_document_name'=>$file_document_name],"doc_id='$doc_id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }else if(isset($_POST['delete'])){
            
            $doc_id = $_POST["doc_id"];

            $DBCRUDAPI->delete('documents',"doc_id='$doc_id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }

        }
    }


?>