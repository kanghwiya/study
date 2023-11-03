1. MVC 패턴
	MVC패턴은 Model, View(JS, CSS), Controller의 약자로 소프트웨어 디자인패턴 중 하나입니다.
	- Model : DATA, 정보들의 가공을 책임지는 컴포넌트
	- View : 사용자 인터페이스 요소로, 데이터를 기반으로 사용자들이 볼 수 있는 화면
	- Controller : 모델과 뷰를 연결해주는 다리 역할

4. DataBase 
	1) user(유저) Table
		- pk, 유저 아이디, 비밀번호, 이름, 가입일자, 탈퇴일자, 수정일자
	2) board(게시판) Table
		-pk, 유저pk, 게시판 타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
	3) board_name(게시판 기본 정보 테이블) Table
		- pk, 게시판타입, 게시판이름