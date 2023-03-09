<?php

    include_once('../../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    // $attributes = ["users.id","users.role_id","user_profile","isMale","roles.role_display_name","users.user_fname","users.user_mname","users.user_lname","users.address","users.contact","users.DOB","users.email","users.username","users.password","users.created_at"];
    if(isset($_GET['getData'])){
        $DBCRUDAPI->selectleftjoin("users","roles","id","role_id","WHERE (role_id!=1 && role_id !=2)");
        $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $res[] = $datass;
        }
        echo json_encode($res);
    }
    else{
        if(isset($_POST['addNew'])){
            $user_profile = $_FILES['file']['name'];
            $role_id = $_POST["role_id"];
            $user_fname = $_POST["user_fname"];
            $user_mname = $_POST["user_mname"];
            $user_lname = $_POST["user_lname"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];
            $DOB = $_POST["DOB"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            if(isset($_FILES['file']['name'])){

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/profiles/".$email."/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");

                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        $response = $location;
                    }
                }
            }
            

            $DBCRUDAPI->insert('users',['user_profile'=>$user_profile,'role_id'=>$role_id,'user_fname'=>$user_fname,'user_mname'=>$user_mname,'user_lname'=>$user_lname,'address'=>$address,'contact'=>$contact,'DOB'=>$DOB,'email'=>$email,'username'=>$username,'password'=>$password,]);

             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
            
        }else if(isset($_POST['update'])){

            $id = $_POST["id"];
            $logo = $_POST["logo"];
            $user_profile = $_FILES['file']['name'];
            $role_id = $_POST["role_id"];
            $user_fname = $_POST["user_fname"];
            $user_mname = $_POST["user_mname"];
            $user_lname = $_POST["user_lname"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];
            $DOB = $_POST["DOB"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = md5($_POST["password"]);

            $file_to_delete = "../../assets/images/profiles/".$email."/".$logo."";
            unlink($file_to_delete);

            if(isset($_FILES['file']['name'])){

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                /* Location */
                $location = "../../assets/images/profiles/".$email."/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");

                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        $response = $location;
                    }
                }
            }
            

            $DBCRUDAPI->update('users',['user_profile'=>$user_profile,'role_id'=>$role_id,'user_fname'=>$user_fname,'user_mname'=>$user_mname,'user_lname'=>$user_lname,'address'=>$address,'contact'=>$contact,'DOB'=>$DOB,'email'=>$email,'username'=>$username,'password'=>$password,],"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }
        }else if(isset($_POST['delete'])){
            
            $id = $_POST["id"];

            $DBCRUDAPI->delete('users',"id='$id'");
             if($DBCRUDAPI){
                echo json_encode(array("success"=>true));
            }else{
                echo json_encode(array("success"=>false));
            }

        }
    }


?>