실패 1) JS에서 PHP로 값 가져오기
<script>
var deleteConfirm=confirm('회원탈퇴 진행?');
</script>
스크립트 쪽에서 confirm 박스를 호출하고

<?php
$deleteConfirm = "<script>document.write(deleteConfirm);</script>";
print $deleteConfirm;
?>
이렇게 하면 confirm 박스에서 무엇을 눌렀는가에 따라(확인 or 취소) true, false값이 출력된다.

<?php
$deleteConfirm = "<script>document.write(deleteConfirm);</script>";
print $deleteConfirm;
if($deleteConfirm == 'false'){
    print "<br>false not deleted";
}else if($deleteConfirm == 'true'){
    print "<br>true deleted";
}
?>
그렇다면 이렇게하면 confirm박스에서의 결과값에 따라 조건문을 실행할 수 있을까?

결론은 아니다. $deleteConfirm를 출력하면 true,false값이 나오지만 그 안에 들어있는 값은 <script>document.write(deleteConfirm);</script>"라는 태그 자체가 들어있으므로 true/false를 비교하든, 0이나 1을 비교하든 다 일치하지 않는다고 나온다.

 

실패 2) 자바스크립트에서 window.location, PHP에서 $_GET변수 사용
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html" ; charset="utf-8">
<script>
function myFunction() {
  var check = confirm("진행?");
  if(check){
      window.location("test.php?delete=yes");
      alert("진행");
  }else{
      window.location("test.php?delete=no");
      alert("취소");
  }
}
</script>
</head>
<body>
<form name="form1" method="post" action="test.php" >
    <input type="text" id= "delete" name="delete" value="default">
    <input type="submit" onclick="myFunction()" value="진행">
</form>
</body>
</html>
</html>
 

결론적으로는 서버쪽에서 isset($_GET['delete'])를 사용해 값이 들어갔는지 확인했지만 아예 들어가지 않았다. 주소창에도 변화가 없는것으로 보아 아예 get을 통한 전달이 되지 않은 듯 하였다.

성공 : 자바스크립트에서 confirm 값을 비교하여 input의 value 바꾸고 $_POST로 보내기
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html" ; charset="utf-8">
</head>
<body>
<form name="form1" method="post" action="test.php" >
    <input type="text" id= "delete" name="delete" value="default">
    <button type ="submit" onclick="myFunction()">Try it</button>
</form>

<script>
function myFunction() {
  var check = confirm("진행?");
  if(check){
      document.getElementById("delete").value = "YES";
      alert("진행");
  }else{
      document.getElementById("delete").value = "NO";
      alert("취소");
  }
}
</script>


</body>
</html>
</html>
여기에서도 여러번의 실패가 있었다. JS의 함수를 이벤트와 연결하는 방법이 여러가지 있었는데 onsubmit이나 getElementsbyName을 사용했었다.(하지만 잘 되지 않았다.

결론적으로는 id로 태그를 식별하고 <input>이 아닌 <button>에 onclick속성을 통해 함수를 연결했다. 그것만으로는 submit을 통해 서버로 넘어가지 않아 type="submit"을 붙여준다.

 

확인은 아래의 코드를 쓰면 된다. (get을 썼을때는 $_GET['delete']를 썼다.)

<?php
if(isset($_POST['delete'])){
    print $_POST['delete'];
}else{
    print "전달실패";
}
?>