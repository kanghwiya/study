<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/TODOLIST/src/");
require_once(ROOT."lib_db/lib.php");

$conn = null;
$today = date("Y-m-d");
$method = $_SERVER["REQUEST_METHOD"];

try{
    if(!my_db_conn($conn)){
        throw new Exception("DB ERROR");
    }

        $category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : "";

        // 미완료 항목 처리
        $todo_cnt = todo_cnt($conn, $arr_param);

        //페이징 처리
        $list_cnt = 3;
        $page_num = 1;
        
        $max_page = ceil($todo_cnt / $list_cnt);
        $offset = ($page_num - 1) * $list_cnt;

        if(isset($_GET["page"])){
            $page_num = $_GET["page"]; //유저가 보내온 페이지 세팅
        };

        // 이전, 다음버튼
        $prev_page_num = $page_num - 1;
        if($prev_page_num === 0 ){
            $prev_page_num = 1 ; //1이 최솟값
        }
+
        $next_page_num = $page_num + 1;
        if($next_page_num > $max_page){
            $next_page_num = $max_page;
        }


        $arr_param = [
            "list_cnt" => $list_cnt
            ,"offset" => $offset
            ,"category_id" => $category_id
        ];

        
        $result = today_select($conn, $arr_param);


        // 완료 항목 처리

        $clear_todo_cnt = todo_clear_cnt($conn, $arr_param);

        //페이징 처리
        $clear_list_cnt = 3;
        $clear_page_num = 1;
        
        $clear_max_page = ceil($clear_todo_cnt / $clear_list_cnt);
        $clear_offset = ($clear_page_num - 1) * $clear_list_cnt;

        if(isset($_GET["page"])){
            $clear_page_num = $_GET["page"]; //유저가 보내온 페이지 세팅
        };

        // 이전, 다음버튼
        $clear_prev_page_num = $clear_page_num - 1;
        if($clear_prev_page_num === 0 ){
            $clear_prev_page_num = 1 ; //1이 최솟값
        }
+
        $clear_next_page_num = $clear_page_num + 1;
        if($clear_next_page_num > $clear_max_page){
            $clear_next_page_num = $clear_max_page;
        }


        $arr_param2 = [
            "list_cnt" => $clear_list_cnt
            ,"offset" => $clear_offset
            ,"category_id" => $category_id
        ];

        
        $clear_result = today_clear($conn, $arr_param2);

        if(!$clear_result){
            throw new Exception("DB Error : Select Boards");
        }

        if(!$clear_result){
            throw new Exception("DB Error : Select Boards");
        }
    
    if($method === "POST"){

        $date = isset($_GET["date"]) ? $_GET["date"] : "";
        $category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : "";
            
        $arr_param = [
            "date" => $date
           ,"category_id" => $category_id
        ];
        
        $day_result = day_select($conn, $arr_param);
				
        if($day_result === false) {
            throw new Exception("SELECT ERROR");
        }
    }

}catch(Exception $e){

}finally {
    db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="TODOLIST/src/CSS/common.css">
</head>
<body>
    <?php require_once("header.php"); ?>
    <main>
        <?php require_once("side.php"); ?>
            <div class="today">
                <h2> 미완료 항목 </h2>
                <table>
                    <?php
                        foreach($result as $item){
                    ?>
                <tr>
                    <th><input type="checkbox"></input></th>
                    <th>
                        <a href="/TODOLIST/src/detail.php/?id=<?php echo $item["id"]; ?>">
                        <?php echo $item["title"]?></a>
                        </th>
                    <th><?php echo $item["category_id"] ?></th>
                    <?php
                        }
                    ?>
                </tr>
                </table>
                <div class="page-btn">
                <a class="button_a" href="/TODOLIST/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
			<?php 
				for($i = 1; $i <= $max_page; $i++) {
					// 삼항연산자 : 조건 ? 참일때처리 : 거짓일때처리
					$hover = (int)$page_num === $i ? "hover" : "";
			?>
					<a class="button_a<?php echo $hover ?>" href="/TODOLIST/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			?>
			<a class="button_a" href="/TODOLIST/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
                </div>
                <a href="/TODOLIST/src/insert.php">+(게시글작성페이지)</a>
            <div class="clear">
                <h2>완료된 항목</h2>
                <table>
                    <?php
                        foreach($clear_result as $item){
                    ?>
                <tr>
                    <th><input type="checkbox" checked></input></th>
                    <th>
                        <a href="/TODOLIST/src/detail.php/?id=<?php echo $item["id"]; ?>">
                        <?php echo $item["title"]?></a>
                        </th>
                    <th><?php echo $item["category_id"] ?></th>
                    <?php
                        }
                    ?>
                </tr>
                </table>
                <div class="page-btn">
                <a class="button_a" href="/TODOLIST/src/list.php/?page=<?php echo $clear_prev_page_num ?>">이전</a>
                    <?php 
                        for($i = 1; $i <= $clear_max_page; $i++) {
                            // 삼항연산자 : 조건 ? 참일때처리 : 거짓일때처리
                            $clear_hover = (int)$clear_page_num === $i ? "hover" : "";
                    ?>
                            <a class="button_a <?php echo $clear_hover ?>" href="/TODOLIST/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                        }
                    ?>
                    <a class="button_a" href="/TODOLIST/src/list.php/?page=<?php echo $clear_next_page_num ?>">다음</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>