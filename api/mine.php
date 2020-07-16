<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['token'])){
        if($_GET['token'] =="123456"){
            if($_GET['url'] =="auth"){
                $cars = array (
                    array("Volvo",22,18),
                    array("BMW",15,13),
                    array("Saab",5,2),
                    array("Land Rover",17,15)
                  );
                echo json_encode($cars);
            }
        }else{
            echo "token invalid";
        }
    }else{
        echo "token error";
    }
}else{
    http_response_code(405);
}
?>