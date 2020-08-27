<?php
require_once(dirname(__DIR__).'./model/payment.cls.php');
class PaymentView extends Payment
{
	public function viewPaymentsByUser($id){
		$this->setUID($id);
		$result = $this->getAllByUser();
		$data = null;
        if($result==false){
            $data = '<div class="alert alert-success text-center mt-5 mx-3" role="alert">Yay !!! No More Payments</div>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$badge = "";
			$button = "";
			if($row['status'] == 'Not Paid'){$badge ='badge-danger';
			$button = '<div class="row no-gutters align-items-center">
				<div class="col mt-2">
					<a type="button" class="btn btn-primary btn-sm"
					href="payment_log.php?PID='.$row['PID'].'">Pay</a>
				</div>
			</div>';}
			else{$badge = 'badge-success';}
			$data = $data.'
			<div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body vehicleView">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPtype">
                                            '.$row['in_time'].'
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            '.$row['place'].'</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPplate">
                                            '.$row['plate'].'
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                                                id="UPcolor">Rs.'.$row['amount'].'
                                                <span class="badge '.$badge .'">'.$row['status'].'</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-money-bill fa-4x"></i>
                                    </div>
                                </div>
                                '.$button.'
                            </div>
                        </div>
                    </div>';
 			}
		}
		return $data;
	}

	public function viewPaymentsLog(){
		$result = $this->getAllPayments();
		$data = null;
        if($result==false){
            $data = '
					<tr>
					<td colspan="10"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Payments Added to View</div></td>
					</tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['PID'].'</b></td>
				<td>'.$row['amount'].'</td>
				<td>'.$row['nameUser']."(".$row['UID'].")".'</td>
				<td>'.$row['telephoneUser'].'</td>
				<td>'.$row['emailUser'].'</td>
				<td>'.$row['place'].'</td> 
				<td>'.$row['plate'].'</td> 
				<td>'.$row['in_time'].'</td>
				<td>'.$row['out_time'].'</td>
				<td>'.$row['status'].'</td> 
			</tr>';
 			}
		}
		return $data;
	}

	public function viewAmount($id){
		$this->setPID($id);
		$result = $this->getPaymentAmount();
		$data = null;
        if($result==false){
			$data = 'Error Getting Amount';
		}
		else{
		  $data = $result;
		}
		return $data;
	}

	public function viewUnpaidCount($id){
		$this->setUID($id);
		$result = $this->getUnpaidCount();
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