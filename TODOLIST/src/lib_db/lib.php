<?php

// DB 접속
function my_db_conn( &$conn ){
	$db_host = "local"; //host
	$db_user = "root"; //user
	$db_pw = "php504"; //password
	$db_name = "hwiya_subject"; // DB name
	$db_charset = "utf8mb4"; //charset
	$db_dns = "mysql:host =" .$db_host.";dbname=".$db_name.";charset".$db_charset;

    try {
        $db_options = [
            //DB의 Prepared Statement 기능을 사용하도록 설정
            PDO::ATTR_EMULATE_PREPARES			=>false
            //PDO Exception을 Throws하도록 설정
            ,PDO::ATTR_ERRMODE					=>PDO::ERRMODE_EXCEPTION
            //연상배열로 Fetch를 하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE		=>PDO::FETCH_ASSOC
        ];

        $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
        return true;
    } catch ( Exception $e ) {
        echo $e->getMessage(); // Exception 메세지 출력
        $conn = null; //DB 파기
        return false;
    }
}

// DB 파기
function db_destroy_conn($conn){
	$conn = null;
}

// 오늘 TODOLIST 불러오기
function today_select(&$conn, &$arr_param){
    try{$sql = "    SELECT "
    ."              id "
    ."              ,title "
    ."              ,category_id "
    ."          FROM "
    ."              todolist "
    ."          WHERE "
    ."              create_at >= CURDATE() " 
    ."          AND "
    ."              delete_at IS NULL ";

    
    $arr_ps = [
        ":list_cnt" => $arr_param["list_cnt"]
        ,":offset" => $arr_param["offset"]
    ];

    if (!empty($arr_param["category_id"])) {
        $sql .= " AND category_id = :category_id ";
        $arr_ps[":category_id"] = $arr_param["category_id"];
    }
    
    $sql .="	ORDER BY "
    ."			    id DESC "
    ."	        LIMIT :list_cnt "
    ." 	        OFFSET :offset ";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_ps);
    $result = $stmt->fetchAll();
    return $result;
    
    } catch( Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생
    }
}

// 오늘 완료된 TODOLIST
function today_clear(&$conn, &$arr_param){
    try{$sql = "    SELECT "
    ."              id "
    ."              ,title "
    ."              ,category_id "
    ."          FROM "
    ."              todolist "
    ."          WHERE "
    ."              create_at >= CURDATE() " 
    ."          AND "
    ."              delete_at IS not NULL ";

    $arr_ps = [
        ":list_cnt" => $arr_param["list_cnt"]
        ,":offset" => $arr_param["offset"]
    ];

    if (!empty($arr_param["category_id"])) {
        $sql .= " AND category_id = :category_id ";
        $arr_ps[":category_id"] = $arr_param["category_id"];
    }
    
    $sql .="	ORDER BY "
    ."			    id DESC "
    ."	        LIMIT :list_cnt "
    ." 	        OFFSET :offset ";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_ps);
    $result = $stmt->fetchAll();
    return $result;
    
    } catch( Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생
    }
}

// TODOLIST COUNT
function todo_cnt(&$conn , &$arr_param){
    $sql =
    " 	SELECT "
    ."			COUNT(id) as cnt " //as 줘야 값을 가져오기 쉬움
    ."	FROM "
    ."			todolist "
    ."	WHERE "
    ."			delete_at IS NULL "
    ."	AND "
    ."			create_at >= CURDATE() "
    ;


    try {
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll();
		return (int)$result[0]["cnt"];

	} catch( Exception $e) {
		echo $e->getMessage(); 
		return false; 
	}
}

// 완료한 TODOLIST COUNT
function todo_clear_cnt(&$conn , &$arr_param){
    $sql =
    " 	SELECT "
    ."			COUNT(id) as cnt " //as 줘야 값을 가져오기 쉬움
    ."	FROM "
    ."			todolist "
    ."	WHERE "
    ."			delete_at IS not NULL "
    ."	AND "
    ."			create_at >= CURDATE() "
    ;


    try {
		$stmt = $conn->query($sql);
		$result = $stmt->fetchAll();
		return (int)$result[0]["cnt"];

	} catch( Exception $e) {
		echo $e->getMessage(); 
		return false; 
	}
}


// 오늘이 아닌 다른 날짜 TODOLIST 불러오기
function day_select(&$conn, &$arr_param){
    try{$sql = "    SELECT "
    ."              id "
    ."              ,title "
    ."              ,category_id "
    ."          FROM "
    ."              todolist "
    ."          WHERE "
    ."              create_at = :date " 
    ."          AND "
    ."              delete_at IS NULL "
    ."	        ORDER BY "
    ."			    id DESC "
    ."	        LIMIT :list_cnt "
    ." 	        OFFSET :offset ";

    $arr_ps = [
        ":date" => $arr_param["date"]
    ];

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_ps);
    $result = $stmt->fetchAll();
    return $result;
    
    } catch( Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생
    }
}

// ID값으로 항목 불러오기
function id_select( &$conn, &$arr_param ){
    $sql = "    SELECT "
    ."             category_id "
    ."             ,title "
    ."             ,detail "
    ."             ,create_at "
    ."          FROM "
    ."             todolist "
    ."          WHERE id = :id "
    ;

    $arr_ps = [
        ":id" => $arr_param["id"]
    ];
    try {
		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result;
	} catch (Exception $e){
		echo $e->getMessage();
		return false;
	}
}

// insert
function db_insert( &$conn, &$arr_param){
    try {
        $sql = " INSERT INTO "
        ."          todolist ( "
        ."             category_id "
        ."             ,title "
        ."             ,detail "
        ."             ,create_at "
        ."             ,revise_at) "
        ."       VALUES ( "
        ."              :category_id "
        ."             ,:title "
        ."             ,:detail "
        ."             ,:create_at "
        ."             ,now())";

        $arr_ps = [
            ":create_at" => $arr_param["create_at"]
            ,":title" => $arr_param["title"]
            ,":category_id" => $arr_param["category"]
            ,":detail" => $arr_param["detail"]
        ];
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}


// 업데이트
function db_update( &$conn, &$arr_param ){

    $sql = " UPDATE "
    ."          todolist "
    ."      SET "
    ."          category_id = :category_id "
    ."          ,title = :detail "
    ."          ,detail = :detail "
    ."          ,create_at = :date "
    ."          ,revise_at = NOW() "
    ."      WHERE "
    ."          id = :id ";

    $arr_ps = [
        ":category_id" => $arr_param["category_id"]
        ,":title" => $arr_param["title"]
        ,":detail" => $arr_param["detail"]
        ,":date" => $arr_param["date"]
        ,":id" => $arr_param["id"]
    ];


    try{
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result;
    }catch(Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        return false;
    }

}

// 삭제

function db_delete(&$conn, &$arr_param){
    $sql = " UPDATE "
    ."          todolist "
    ."      SET "
    ."          delete_at = NOW() "
    ."      WHERE "
    ."          id = :id "
    ;

    $arr_ps = [
        "id" => $arr_param["id"]
    ];

    try{
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result;
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
}