<?php

    session_start();
    include_once('../API/DBCRUDAPI.php');
    $DBCRUDAPI = new DBCRUDAPI();

    if(isset($_POST['loginUser']) ){

        $username = $_POST['username'];
        $password  = md5($_POST['password']);
        // echo $password;

        $whereClause = "username='".$username."'AND password='".$password."'";
        $DBCRUDAPI->selectleftjoinauth($whereClause);
         $data = $DBCRUDAPI->sql;
        $res = array();
        while($datass = mysqli_fetch_assoc($data)){
            $_SESSION['userFullname'] = strtoupper($datass['user_fname']." ".$datass['user_mname']." ".$datass['user_lname']);
            $_SESSION['userRoleName'] = $datass['display_name'];
            $_SESSION['userEmail'] = $datass['email'];
            $_SESSION['userProfile'] = $datass['user_profile'];
            $res[] = $datass;
        }
        echo json_encode($res);
    }else if(isset($_POST['logoutUser'])){
        session_destroy();
    }

?>