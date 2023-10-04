<?php
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	$conn = null; //DB connection 변수

	try{

		//DB 접속
		if(!my_db_conn($conn)){
			//DB Instance 에러
			throw new Exception("DB Error : PDO Instance"); //강제 예외발생
		} // 아규먼트(에러 메세지)를 이요하여 새로운 클래스를 생성. 

		$boards_cnt = db_select_boards_cnt($conn);
		if($boards_cnt === false){
			throw new Exception("DB Error : Select Count");
		}

	//페이징 처리
	$list_cnt = 5; //한 페이지 최대 표시 수
	$page_num = 1; //페이지 번호 초기화

	$max_page_num = ceil($boards_cnt / $list_cnt ); //최대 페이지 수

	if(isset($_GET["page"])){
		$page_num = $_GET["page"]; //유저가 보내온 페이지 세팅
	};

	$offset = ($page_num - 1) * $list_cnt;

	//이전 버튼, 다음 버튼 설정
	$prev_page_num = $page_num - 1;
	if($prev_page_num === 0){
		$prev_page_num = 1;
	}

	$next_page_num = $page_num + 1;
	if($next_page_num > $max_page_num){
		$next_page_num = $max_page_num;
	}


	//DB 조회시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];


	//게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);

	if(!$result){
		throw new Exception("DB Error : Select Boards");
	}


	}catch(Exception $e){
		echo $e->getMessage(); //예외발생 메세지 출력
		exit; //처리종료

	} finally {
		db_destroy_conn($conn);
	}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<link rel="stylesheet" href="/mini_board/src/css/common.css"> <!-- 로 시작하면 아파치의 hdocs 파일에서 시작하는 경로 -->
</head>
<body>
	<?php 
	require_once(FILE_HEADER);
	?>
	<main>
		<table>
			<colgroup>
				<col width="18%">
				<col width="52%">
				<col width="30%">
			</colgroup>
			<tr class="table-title">
				<th class="border-left">번호</th>
				<th>제목</th>
				<th class="border-right">작성일자</th>
			</tr>
			<?php
			//리스트를 생성
				foreach($result as $item){
			?>
				<tr class="list-font">
					<td>💜<?php echo $item["id"];	?>💜</td>
					<td>
						<a href="/mini_board/src/detail.php/?id=<?php echo $item["id"];	?>&page=<?php echo $page_num;?>">
						<?php echo $item["title"];?>
						</a>
					</td>
					<td><?php echo $item["create_at"];?></td>
				</tr>
			<?php
				}
			?>
		</table>
		<section>
			<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num; ?>"><</a>
			<?php 
				$list_page_block = (int)ceil($boards_cnt/5);
				$block_num = (int)ceil($max_page_num/$list_page_block);
				$block_first = ($block_num*$list_page_block)-($list_page_block-1);
				$present_num = $block_first-1;

				// 삼항 연산자로 돌리는 법 : 조건 ? 참일 때 처리 : 거짓일 때 처리
				// for($i = 1; $i <= $max_page_num; $i++) {
				// 	$str = (int)$page_num === $i ? "bk-a" : ""; }
				// common.css 파일에 bk-a 클래스에 CSS를 줌.<?php echo 출력 값에 $str;를 추가하면 됨

				for($i = $block_first; $i <= $list_page_block; $i++){
					$present_num+=1;
					
					if( $i > $max_page_num ){
						break;
					}

					if((int)$page_num === (int)$present_num){
			?>

				<a class="page-hover" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php 
					} else {
				?>
				<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			}
			?>
			<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>">></a>
		</section>
		<div class="text-write">
			<a class="btn-write" href="/mini_board/src/insert.php">글쓰기</a>
		</div>
	</main>
</body>
</html>