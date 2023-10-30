//두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.

function add_f(a,b){
	return a + b;
}

let add_f2 = function(a,b){
	return a + b;
}

// 화살표함수 : 성능이슈가 생길 수 있음. 가장 느림. 
let add_f3 = (a,b) => a + b;


// 익명함수를 사용하는 가장 큰 이유 : 콜백함수때문
// 콜백함수 : 

setTimeout(function() {
	console.log('A');
}, 1000);


// 지금 당장이 아니라 나중에 실행시키고 싶을 때 주로 사용
function myCallback(fnc){
	fnc();
	console.log('567');
}


myCallback(function(){
	console.log('123');
});


[1,2,3].filter(function(num){
	return num === 3;
});


// 함수를 세 개 만들어주세요.
//  -1. php를 출력하는 함수
//  -2. 504를 출력하는 함수
//  -3. 풀스택을 출력하는 함수

// 1번 함수는 3초 뒤에 출력
// 2번 함수는 5초 뒤에 출력
// 3번 함수는 바로 출력

setTimeout(function (){
	console.log('php');
},3000);

function php(){
	console.log('php');
}
setTimeout(php, 3000);



setTimeout(function (){
	console.log('504');
},5000);

function php504(){
	console.log('504');
}
setTimeout(php504, 5000);



function fullStack(func){
	func();
}

fullStack(function(){
	console.log('풀스택');
});

// 현재 시간 구해주세요. 



function my_date(){
	let now = new Date();
	let year = now.getFullYear();
	let month = now.getMonth() + 1;
	let date = now.getDate();
	let gethours = now.getHours();
	let minutes = now.getMinutes();
	let seconds = now.getSeconds();
	
	// minutes<10 ? '0' + minutes : minutes;
	// gethours<10 ? '0' + gethours : gethours;
	// seconds<10 ? '0' + seconds : seconds;

	console.log( year + '-' + month + '-' + date + ' ' + gethours + ':' + minutes + ':' + seconds);
}

my_date();


let boo = confirm('ttt');
if(boo){
	window.location.href = 'http://www.naver.com';
} else {
	return false;
}
// 확인은 true, 취소는 false로 옴

const NAVER = document.getElementById('naver');
NAVER.onclick = function(){
	location.href = 'http:\/\/www.naver.com';
}

const NEVER = document.getElementById('never');
NEVER.addEventListener('click', function() {
	location.href = 'http:\/\/www.naver.com';
});

// 버튼을 하나 만들기
// 버튼을 클릭하면 네이버로 이동시켜주세요.
