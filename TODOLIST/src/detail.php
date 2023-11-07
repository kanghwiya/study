<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/TODOLIST/src/");
require_once(ROOT."lib_db/lib.php");

$conn = null;
$method = $_SERVER["REQUEST_METHOD"];

try{

    if(!my_db_conn($conn)){
        throw new Exception("DB ERROR");
    }
    
    if($method === "GET") {

        $id = isset($_GET["id"]) ? $_GET["id"] : "";
    
        if( $id === "" ){
            throw new Exception("ERROR : NO id");
        }

    } else {

        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $delete_at = isset($_POST["deleteAt"]) ? $_POST["deleteAt"] : "";


        if($delete_at === "Ture") {

        $arr_delete_id = [
            "id" => $id
        ];
tg



        db_delete($conn, $arr_delete_id);

        } else if($delete_at === "False") {
            header("Location: detail.php/?id={$id}");
        }
    }
    


    $arr_param = [
        "id" => $id
    ];

    $result = id_select($conn, $arr_param);
    
    $item = $result[0];


} catch( Exception $e) {
    
} finally {
    db_destroy_conn($conn);
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세페이지</title>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="./CSS/common.css">
    <script>
        let btnDelete = document.getElementById('btn-delete');
        btnDelete.addEventListener('click', alert1);

        function alert1(){
            if(confirm("정말로 삭제하시겠습니까?")){
                window.location("")
                alert("삭제되었습니다.");
                return true;
            } else {
                window.location("");
                return false;
            }

        }
    </script>
</head>
<body>
    <?php require_once("header.php"); ?>
        <main>
        <?php require_once("side.php"); ?>

            <div class="detail-sect1"><?php echo $item["create_at"]; ?></div>
            <div class="detail-sect2">
                <div><?php echo $item["title"]; ?></div>
                <div><?php echo $item["category_id"]; ?></div>
            </div>
            <div class="detail-sect3"><?php echo $item["detail"]; ?></div>

        <form action="TODOLIST/src/detail.php" method="POST">
            <input type="hidden" id="id" name="id">
            <div class="detail-btn">
                <a href="/TODOLIST/src/update.php/?id=<?php echo $id; ?>">수정</a>
                <button id="btn-delete" onclick="confirm()">삭제</button>
                <input type="hidden" id="deleteAt" name="deleteAt" value="">
            </div>
        </form>
    </main>
    <script src="./js/common.js">
    </script>
</body>
</html>