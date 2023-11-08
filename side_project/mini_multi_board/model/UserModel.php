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

	// 유저 정보 insert
	public function addUserInfo( $arrAddUserInfo ){
			try {
				$sql = "	INSERT INTO "
				."				user ( "
				."				 u_id "
				."				,u_pw "
				."				,u_name) "
				."			VALUES ( "
				."				 :u_id "
				."				,:u_pw "
				."				,:u_name) ";
	
				$prepare = [
					":u_id" => $arrAddUserInfo["u_id"]
					,":u_pw" => $arrAddUserInfo["u_pw"]
					,":u_name" => $arrAddUserInfo["u_name"]
				];
	
				$stmt = $this->conn->prepare($sql);
				$result = $stmt->execute($prepare);
				return $result;
			} catch(Exception $e) {
				echo "UserModel->addUserInfo Error : ".$e->getMessage();
				exit();
			}
	}

	// protected function getUserId( $inputIdData ) {
	// 	$sql =
	// 		" SELECT "
	// 		."	u_id "
	// 		." FROM user "
	// 		." WHERE u_id = :u_id";

	// 		$prepare = [
	// 			":u_id" => $inputIdData["u_id"]
	// 		];

	// 	try{
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute($prepare);
	// 		$result = $stmt->fetchAll();
	// 		return $result;

	// 	}catch(Exception $e){
	// 		echo "UserModel->getUserId Error".$e->getMessage();
	// 		exit();
	// 	}
	// }
}