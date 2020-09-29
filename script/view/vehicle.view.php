<?php
/*This handles all the vehicle views*/
require_once(dirname(__DIR__).'/model/vehicle.cls.php');
class VehicleView extends Vehicle
{
	public function viewVehiclesByUser($id){
		$this->setUID($id);
		$result = $this->getAllByUser();
		$data = null;
        if($result==false){
            $data = '<div class="alert alert-danger text-center m-4" role="alert">No Vehicles Added</div>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body vehicleView">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPtype">
                                            '. $row['type'].'
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Plate
                                            Number:</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPplate">
                                            '.$row['plate'].'
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                                                id="UPcolor">'.$row['color'].'</div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-car fa-4x"></i>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-2">
                                        <a type="button" id="btnViewVehicel" class="btn btn-primary btn-sm"
                                            href="vehicle_manage.php?VID='.$row['VID'].'">Update</a>
                                            <!-- find a way to remove on click -->
                                        <button type="submit" class="btn btn-danger btn-sm confirm_dialog"
                                            onclick="if(confirm(\'Are You Sure!\')){window.location = \'../script/vehicle.inc.php?btnDelete=&id='.$row['VID'].'\';}">
                                            <i class="fas fa-trash-alt"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>';
 			}
		}
		return $data;
	}
//TODO
	public function viewVehicleLog(){
		$result = $this->getVehicleLog();
		$data = null;
        if($result==false){
            $data = '<tr>
                    <td colspan="7"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Vehicles Added to View</div></td>
                    </tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['VID'].'</b></td>
				<td>'.$row['plate'].'</td>
				<td>'.$row['color'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['nameUser']."(".$row['UID'].")".'</td>
				<td>'.$row['emailUser'].'</td>
				<td>'.$row['telephoneUser'].'</td>
			</tr>';
 			}
		}
		return $data;
	}

	public function viewVehicle($id){
		$this->setVID($id);
		$result = $this->getByID();
		$data = null;
        if($result==false){
			$data = '<div class="alert alert-danger text-center m-3" role="alert">Wrong ID</div>';
		}
		else{
		  $data = mysqli_fetch_assoc($result);
		}
		return $data;
    }
    
    public function viewByPlate($plate){
		$this->setPlate($plate);
		$result = $this->getVehicleByPlate();
		$data = null;
        if($result==false){
			$data = 'Please Register To the System';
		}
		else{
		  $data = mysqli_fetch_assoc($result);
		}
		return $data;
    }
    
    public function lastRow(){
		$result = $this->getLastInserted();
		$data = null;
        if($result==false){
			$data = 'Error';
		}
		else{
		  $data = $result;
		}
		return $data;
	}

}
 ?>