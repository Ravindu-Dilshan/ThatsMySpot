<?php
require_once(dirname(__DIR__).'./model/parking.cls.php');
class ParkingLogView extends ParkingLog
{
	public function viewParkingLog($isDate,$from,$to){
        $result = $this->getAllParking();
        if($isDate){
            $result = $this->getAllParkingByDate($from,$to);
        }
		$data = null;
        if($result==false){
            $data = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No Users Added</div>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
                <td><b>'.$row['PID'].'</b></td>
                <td>'.$row['plate'].'</td>
                <td>'.$row['place'].'</td>
                <td>'.$row['in_time'].'</td>
                <td>'.$row['out_time'].'</td>
                <td>'.$row['amount'].'</td>
                <td>'.$row['nameUser']."(".$row['UID'].")".'</td>
                <td>'.$row['telephoneUser'].'</td>
                <td>'.$row['emailUser'].'</td>
            </tr>';
 			}
		}
		return $data;
    }
    
    public function viewAmountByMonthLocation($place){
        $this->setPlace($place);
		return $this->getAmountByMonthLocation();
    }
    
    public function viewAmountByMonth(){
		return $this->getAmountByMonth();
    }
    public function viewCurrentAmount($isYear){
        $result = $this->getCurrentMonthAmount();
        if($isYear){
            $result = $this->getCurrentYearAmount();
        }
        if($result==false){
			$data = 'Error Getting Amount';
		}
		else{
		  $data = $result;
        }
        return $data;
	}
}
 ?>