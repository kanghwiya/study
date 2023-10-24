// 함수
fnc_sum(3, 2);
fnc1(1, 2);


// 함수 생성
// 함수 선언식 : 호이스팅에 영향을 받는다
function fnc_sum(a, b){
	return a + b;
}

// 함수 표현식 : 호이스팅에 영향을 받지 않는다.
// 함수가 객체이기 때문에 가능.
let fnc1 = function(a, b){
	return a + b;
}



// 익명함수 : 이름이 없는 함수
let fnc2 = function(){
	return 1;
}

//------------------------------
// 콜백함수 : 다시 호출되는 함수 
//------------------------------
function fnc_callBack( call ){
	call();
}

fnc_callBack(function(){
	console.log(익명함수);
})

//함수에서 값을 받아 그 값을 다시 이용하려 할 때 콜백함수를 사용함

//배열객체의 sort의 경우 예시
sort_arr.sort( function(a,b){
	return a- b
});

function sort(call) {
	let num = call();
	if(num < 0) {
		//처리
	} else {
		//처리
	}
}

//Function 생성자 함수 : 사용 잘안함...
let tt = Function('a', 'b', 'return a + b;')


// 화살표 함수(Arrow Function)
// 파라미터가 없는 경우
let f1 = function() {
	return "f1"; 
}

let f2 = () => "f2"


//파라미터가 1개인 경우
let f3 = function(a) {
	return a + '입니다.';
}

let f4 = a => a + '입니다.';


//파라미터가 2개 이상인 경우
let f5 = function(a, b) {
	return a + b;
}

let f6 = (a, b) => a + b; 

//처리할 내용이 많으면 중괄호를 사용

let f7 = function(a,b){
	if(a > b) {
		return 'a가 큼';
	} else {
		return 'b가 큼';
	}
}


let f8 = (a, b) => {
	if(a > b) {
		return 'a가 큼';
	} else {
		return 'b가 큼';
	}
}

















