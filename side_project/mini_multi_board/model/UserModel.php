<?php

namespace model;

class UserModel extends ParentsModel{
	public function getUserInfo( $arrUserInfo, $pwFlg = false ) {
		$sql =
			" SELECT "
			."		* "
			." FROM user "
			." WHERE "
			." u_id = :u_id ";

			$prepare = [
				":u_id" => $arrUserInfo["u_id"]
			];
		
		// PW 추가처리
		if($pwFlg) {
			$sql .= " AND u_pw = :u_pw ";
			$prepare[":u_pw"] = $arrUserInfo["u_pw"];
		}

		try{
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;

		}catch(Exception $e){
			echo "UserModel->getUserInfo Error".$e->getMessage();
			exit();
		}
	}
}