<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/practice/");
require_once(ROOT."db_practice.php");

$conn = null;

db_select( $conn );

$list_cnt = 7;
$offset = ($page_num - 1 ) * $list_cnt;

$arr_param = [
	"list_cnt" => $list_cnt
	,"offset" => $offset
];
$result  = db_select( $conn, $arr_param );

$test_board_cnt = db_cnt( $conn );
$max_page_num = ceil($test_board_cnt/$list_cnt);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<header></header>
	<main>
		<table>
			<tr>
				<th> no </th>
				<th> title </th>
				<th> date </th>
			</tr>

			<?php foreach($result as $item){ ?>
				<tr>
					<td><?php echo $item["id"]; ?></td>
					<td><?php echo $item["title"]; ?></td>
					<td><?php echo $item["create_at"]; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</main>
</body>
</html>