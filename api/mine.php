<?php
//date_default_timezone_set('Asia/Colombo');
//$date = date('m/d/Y h:i:s a', "1595400778");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['token'])){
        if($_GET['token'] =="123456"){
            session_start();
            require_once('../script/controller/place.control.php');
            if($_GET['url'] =="vehicle_in"){
                if(isset($_GET['plate']) && isset($_GET['place']) && isset($_GET['PID'])){
                    $plate = $_GET['plate'];
                    $location = $_GET['place'];
                    require_once('../script/view/vehicle.view.php');
                    $vehicel = new VehicleView();
                    $row = $vehicel->viewByPlate($plate); 
                    if(is_array($row)){
                        $uid = $row['UID'];
                        $item = array('INTIME' => time(),
                        'PLACE' => $_GET['place'],
                        'PID' => $_GET['PID'],
                        'UID' => $uid);

                        $input = unserialize(file_get_contents('data.txt'));
                        $tempArray = $input;
                        $tempArray[$plate] = array();
                        if(isset($input[$plate])){
                            //print_r($input[$plate]);
                            echo "Already Parked in";
                            exit();
                        }
                        array_push($tempArray[$plate], $item);
                        file_put_contents('data.txt', serialize($tempArray));

                        $file = fopen("authentication.csv","a");
                        $line = array($plate, time() , 1, $location);
                        fputcsv($file, $line);
                        fclose($file);

                        $place = new PlaceController();
                        $place->updatePlaceCurrent($_GET['PID'],"in");

                        //echo json_encode($tempArray);
                        echo "Success";
                    }else{
                        $file = fopen("unauthorized.csv","a");
                        $line = array($plate, time() , 1, $location);
                        fputcsv($file, $line);
                        fclose($file);
                        echo $row;
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
                        require_once('../script/controller/parking.control.php');

                        $place = $input[$plate][0]['PLACE'];
                        $intime = $input[$plate][0]['INTIME'];
                        $in = date('Y-m-d H:i:s', $intime);
                        $out = date('Y-m-d H:i:s', time());
                        $amount = time() - $intime;
                        $uid = $input[$plate][0]['UID'];
                        $pid = $input[$plate][0]['PID'];

                        $parking = new ParkingLogController();
                        $add = $parking->createParkingLog($plate,$place,$in,$out,$amount,$uid);
                        if($add = "Success"){
                            unset($input[$plate]);
                            file_put_contents('data.txt', serialize($input));
                            $place = new PlaceController();
                            $place->updatePlaceCurrent($_GET['PID'],"out");
                        }
                        echo $add;
                        //echo json_encode($input);
                    }else{
                        echo "not parked in";
                    }
                }else{
                    echo "no plate";
                }
            }
            elseif($_GET['url'] =="get_place_info"){
                require_once('../script/view/place.view.php');
                $place = new PlaceView();
                $result = $place->viewPlaceRaw();
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
                            "longt" => $row['longtitude'],
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