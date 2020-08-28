<?php
require_once(dirname(__DIR__).'./model/place.cls.php');
class PlaceView extends Place
{
	public function viewPlaces(){
		$result = $this->getAllPalce();
		$data = null;
        if($result==false){
            $data = '
					<tr>
					<td colspan="8"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Locations Added to View</div></td>
					</tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['PID'].'</b></td>
				<td>'.$row['namePlace'].'</td>
				<td>'.$row['latitude'].'</td>
				<td>'.$row['longtitude'].'</td>
				<td>'.$row['current']."/".$row['available'].'</td>
				<td><button type="button" id="btnViewPlace" class="btn btn-primary btn-sm"
						data-toggle="modal" data-target="#placeUpdateModal">Update</button>
				</td>
				<td><button type="submit" class="btn btn-danger btn-sm confirm_dialog"
						onclick="if(confirm(\'Are You Sure!\')){window.location = \'script/place.inc.php?btnDelete=&id='.$row['PID'].'\';}">
						<i class="fas fa-trash-alt"></i></button></td>
			</tr>';
 			}
		}
		return $data;
	}

	public function viewPlaceForUser(){
		$result = $this->getAllPalce();
		$data = null;
        if($result==false){
            $data = '<div class="alert alert-danger text-center m-4" role="alert">No Places Added</div>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$badge = "";
			if($row['current'] == $row['available'] || $row['current'] >= $row['available']){
				$badge = '<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Available
				</div>';
			}else{
				$badge = '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available
				</div>';
			}
			$data = $data.'
			<div class="col-xl-3 col-md-6 mb-4">
                    <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'.$row['namePlace'].'
                                    </div>
                                    '.$badge.'
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        '.$row['current']."/".$row['available'].'</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-map-marker fa-4x"></i>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col mt-2">
                                    <a class="h8 btn btn-group btn-dark text-white"
                                        href="https://map.google.com/maps?q='.$row['latitude'].','.$row['longtitude'].'">Location</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
 			}
		}
		return $data;
	}

	public function viewPlaceLog(){
		$result = $this->getAllPalce();
		$data = null;
        if($result==false){
            $data = '
					<tr>
					<td colspan="4"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Locations Added to View</div></td>
					</tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['PID'].'</b></td>
				<td>'.$row['namePlace'].'</td>
				<td>'."(".$row['latitude'].", ".$row['longtitude'].")".'</td>
				<td>'.$row['current']."/".$row['available'].'</td>
			</tr>';
 			}
		}
		return $data;
	}

	public function viewPlaceRaw(){
		return $this->getAllPalce();
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