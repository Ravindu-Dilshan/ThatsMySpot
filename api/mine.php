<?php
//date_default_timezone_set('Asia/Colombo');
//$date = date('m/d/Y h:i:s a', "1595400778");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['token'])){
        if($_GET['token'] =="123456"){
            session_start();
            if($_GET['url'] =="vehicle_in"){
                if(isset($_GET['plate']) && isset($_GET['place'])){
                    $plate = $_GET['plate'];
                    require_once('../script/class/vehicle.cls.php');
                    $vehicel = new Vehicle(null,$plate,null,null,null,null);
                    $result = $vehicel->getVehicleByPlate(); 
                    if($result!=false){
                        while($row = mysqli_fetch_assoc($result)){
                            $uid = $row['UID'];
                        }
                        $item = array('INTIME' => time(),
                        'PLACE' => $_GET['place'],
                        'UID' => $uid);

                        $input = unserialize(file_get_contents('data.txt'));
                        $tempArray = $input;
                        $tempArray[$plate] = array();
                        /*foreach ($tempArray as $value) {
                           if($value['PLATE'] == $plate){
                                echo json_encode($value['PLATE']);
                                exit();
                           }
                        }*/
                        array_push($tempArray[$plate], $item);
                        file_put_contents('data.txt', serialize($tempArray));

                        $file = fopen("authentication.csv","a");
                        $line = array($plate, time() , 1);
                        fputcsv($file, $line);
                        fclose($file);

                        echo json_encode($tempArray);
                    }elseif($result==0){
                        echo "Please Register To the System";
                    }else{
                        echo "db error";
                    }
                }else{
                    echo "no plate or place";
                }
            }
            elseif($_GET['url'] =="vehicle_out"){
                if(isset($_GET['plate'])){
                    $plate = $_GET['plate'];
                    $input = unserialize(file_get_contents('data.txt'));
                    if(isset($input[$plate])){
                        date_default_timezone_set('Asia/Colombo');
                        //$date = date('m/d/Y h:i:s a', "1595400778");
                        require_once('../script/class/parking.cls.php');

                        $place = $input[$plate][0]['PLACE'];
                        $intime = $input[$plate][0]['INTIME'];
                        $in = date('m/d/Y h:i:s a', $intime);
                        $out = date('m/d/Y h:i:s a', time());
                        $amount = time() - $intime;
                        $uid = $input[$plate][0]['UID'];

                        $parking = new ParkingLog(null,$plate,$place,$in,$out,$amount,$uid);
                        $add = $parking->addPlace();
                        unset($input[$plate]);
                        file_put_contents('data.txt', serialize($input));
                        echo $add;
                        echo json_encode($input);
                    }else{
                        echo "not parked in";
                    }
                }else{
                    echo "no plate";
                }
            }
            elseif($_GET['url'] =="get_place_info"){
                include('../script/class/place.cls.php');
                $place = new Place(null,null,null,null,null,null);
                $result = $place->getAllPalce();
                $place_arr=array();
                $place_arr["records"]=array();
                if($result==false){
                    echo "No records";
                    }else{
                    while($row = mysqli_fetch_assoc($result)){
                        $place_item=array(
                            "pid" => $row['PID'],
                            "name" => $row['namePlace'],
                            "lat" => $row['latitude'],
                            "long" => $row['longtitude'],
                            "available" => $row['available'],
                            "current" => $row['current']
                        );
                        array_push($place_arr["records"], $place_item);
                    }
                    http_response_code(200);
                    echo json_encode($place_arr);
                }
            }
            else{
                echo "no url";
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