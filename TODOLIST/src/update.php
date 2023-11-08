<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/TODOLIST/src/");
require_once(ROOT."lib_db/lib.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");

$arr_err_msg = [];
$conn = null;
$http_method = $_SERVER["REQUEST_METHOD"]; // 메소드 확인
$today = date("Y-m-d");


try {
    if(!my_db_conn($conn)){
        throw new Exception("DB ERROR");
    }

    if($http_method === "GET"){
        
        $id = isset($_GET["id"]) ? $_GET["id"] : "";

        if($id === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
        }

    } else if($http_method === "POST"){
        
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $title = isset($_POST["category_id"]) ? $_POST["category_id"] : "";
        $category_id = isset($_POST["category_id"]) ? $_POST["category_id"] : "";
        $detail = isset($_POST["detail"]) ? $_POST["detail"] : "";
        $date = isset($_POST["date"]) ? $_POST["date"] : "";
        
        if($id === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if($category_id === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if($date === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        $arr_param = [
            "category_id" => $category_id
            ,"title" => $title
            ,"detail" => $detail
            ,"date" => $date
            ,"id" => $id
        ];

        $conn->beginTransaction();
        if(!db_update($conn, $arr_param)){
            throw new Exception("DB UPDATE ERROR");
        }
        $conn->commit();
        
        header("Location: detail.php/?id={$id}");
        exit();
    } 
    var_dump($id);

    $arr_id = [
        "id" => $id
    ];
    // 게시글 조회
    $result = id_select($conn, $arr_id);

    //게시글 조회 예외처리
	if($result === false){
		throw new Exception("DB SELECT ID EROOR");
	//게시글 조회 에러
	} else if(!count($result) === 1){
	//게시글 조회 count 에러
	throw new Exception("DB Error : PDO Select_id count,".count($result));
	}

    var_dump($result);
    $item = $result[0];


} catch (Exception $e) {
    // if($http_method === "POST") {
	// 	$conn->rollBack();
	// }
	// header("Location: update.php/?id={$id}");
	// exit;
    
} finally {
    db_destroy_conn($conn);
}



?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="TODOLIST/src/CSS/common.css">
</head>
<body>

    <?php require_once("header.php"); ?>
    <main>
        <?php require_once("side.php"); ?>

    <form action="/TODOLIST/src/update.php" method="POST">
        <div class="update-date">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="date" name="date" value="<?php echo $today?>">
        </div>
        <div class="update-title">
            <label for="title" required>제목</label>
            <input type="text" id="title" name="title" value="<?php echo $item["title"]; ?>">
        </div>
        <div class="update-category">
            <select name="category_id" required>
                <option value="" selected disabled hidden>선택해주세요</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="update-memo">
            <textarea name="detail" id="detail" cols="30" rows="10"><?php echo $item["detail"]; ?></textarea>
        </div>
        <button type="submit">수정완료</button>
        <a href="/TODOLIST/src/detail.php/?id=<?php echo $id; ?>">취소하기</a>
    </form>
</body>
</html>