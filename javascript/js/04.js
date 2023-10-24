// console.log("반갑습니다. JS파일입니다.");

// ----------------------
// 변수 (var, let, const)
// ----------------------
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프를 가짐 \ 사용을 지양
// console 은 객체
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이"; //var를 제거하면 재할당 : ?
// console.log(u_name);

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이"; 
// console.log(u_name);

// 재할당
// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);

// const : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const AGE = 19;
// AGE = 20;
console.log(AGE);


// ----------------------
// 스코프
// ----------------------

//전역 스코프 : 어디에서든지 가져와서 사용 가능
let gender = "M";

//함수레벨 스코프 : 함수 안에서 사용
function test() {
	let test1 = "test1";
	if(true){
		let test1 = "test2";
	}
	console.log(test1);
} //test1이 출력. 선언된 두 개의 test1은 다른 변수선언임.


//블록레벨 스코프

function test() {
	let test1 = "test1";
	{
		let test1 = "test2";
		test1 = "test3";
		console.log(test1);
	}
	console.log(test1);
} //test1이 재할당되었기에 test2 가 출력.
//console을 if문 안에 넣으면 test가 출력.

function test() {
	var test1 = "test1";
	{
		var test1 = "test2";
	}
	console.log(test1);
} // test2가 출력됨. var는 함수레벨 스코프이기 때문에 함수 전체에 적용

// ----------------------
// 호이스팅 (hoisting)
// ----------------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리티 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

console.log(htest1());
console.log(hvar); // undefiend 출력
console.log(hlet); // 에러 뱉음. 여기서 정지

function htest1(){
	return "htest1 함수 입니다.";
}


var hvar = "var로 선언";
let hlet = "let으로 선언";

console.log(hvar); // "var로 선언"이 출력
console.log(hlet); // 출력x













