<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/TODOLIST/src/");
require_once(ROOT."lib_db/lib.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");

$arr_err_msg = [];
$conn = null;
$http_method = $_SERVER["REQUEST_METHOD"]; // 메소드 확인
$today = date("Y-m-d");

try{
    if(!my_db_conn($conn)){
        throw new Exception("DB ERROR");
    }

    if($http_method === "GET") {
        $date = isset($_GET["date"]) ? trim($_GET["date"]) : "";
    }
    
    else if($http_method === "POST") {
        $create_date = isset($_POST["date"]) ? trim ($_POST["date"]) : date("Y-m-d");
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $category = isset($_POST["category"]) ? trim($_POST["category"]) : "";
        $detail = isset($_POST["detail"]) ? trim($_POST["detail"]) : "";

        if($title === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
        }
        if($category === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "카테고리");
        }
        if($create_date === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "날짜");
        }
        if(count($arr_err_msg) === 0 ){
        $arr_param = [
            "create_at" => $create_date
            ,"title" => $title
            ,"category" => $category
            ,"detail" => $detail
        ];

        $conn->beginTransaction();

        if(!db_insert($conn, $arr_param)){
            throw new Exception("Insert Error");
        }
        $conn->commit();

        header("Location: list.php");
        exit;
        }
    }
} catch (Exception $e){
    if($conn !== null){
		$conn->rollBack();
	}
    header("Location: /TODOLIST/src/insert.php");
}finally{
    db_destroy_conn($conn); //DB 파기
};


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert</title>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="TODOLIST/src/CSS/common.css">
</head>
<body>
    <?php require_once("header.php"); ?>
    <main>
        <?php require_once("side.php"); ?>
    <div class="error">
        <?php
            foreach($arr_err_msg as $val){
        ?>
                <p class="error-in"><?php echo $val; ?></p><br>        
        <?php
            }
        ?>
    </div>
    <form action="#" method="POST">
        <div class="insert-date">
            <input type="date" name="date" value="<?php echo $today; ?>">
        </div>
        <div class="insert-title">
            <label for="title" id="title">제목</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="insert-category">
            <select name="category">
                <option value="" selected disabled hidden>카테고리 선택</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="insert-detail">
            <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
        </div>
            <button type="submit">입력</button>
            <a href="/TODOLIST/src/list.php">취소</a>
        </div>
    </form>
</body>
</html>