<?php
require_once(dirname(__DIR__).'/model/user.cls.php');
class UserView extends User
{
	public function viewUsers(){
		$result = $this->getAllUsers();
		$data = null;
        if($result==false){
			$data = '
					<tr>
					<td colspan="8"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Users Added to View</div></td>
					</tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['UID'].'</b></td>
				<td>'.$row['nameUser'].'</td>
				<td>'.$row['emailUser'].'</td>
				<td>'.$row['telephoneUser'].'</td>
				<td>'.$row['accessUser'].'</td>
				<td><button type="button" id="btnViewUser" class="btn btn-primary btn-sm" data-toggle="modal"
						data-target="#userUpdateModal">Update</button>
				</td>
				<td><button type="submit" class="btn btn-danger btn-sm confirm_dialog"
						onclick="if(confirm(\'Are You Sure!\')){window.location = \'script/user.inc.php?btnDelete=&id='.$row['UID'].'\';}">
						<i class="fas fa-trash-alt"></i></button></td>
			</tr>';
 			}
		}
		return $data;
	}

	public function viewUsersLog(){
		$result = $this->getAllUsers();
		$data = null;
        if($result==false){
            $data = '<tr>
					<td colspan="5"><div class="alert alert-danger w-100 text-center m-auto" role="alert">No Users Added to View</div></td>
					</tr>';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
			$data = $data.'
			<tr>
				<td><b>'.$row['UID'].'</b></td>
				<td>'.$row['nameUser'].'</td>
				<td>'.$row['emailUser'].'</td>
				<td>'.$row['telephoneUser'].'</td>
				<td>'.$row['accessUser'].'</td>
			</tr>';
 			}
		}
		return $data;
	}

	public function viewUser($id){
		$this->setUID($id);
		$result = $this->getUser();
		$data = null;
        if($result==false){
			$data = '<div class="alert alert-danger text-center m-3" role="alert">Please Login</div>';
		}
		else{
		  $data = mysqli_fetch_assoc($result);
		}
		return $data;
	}

}