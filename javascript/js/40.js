

// *************************

//      WOW!!!!!!!!! 
// 	   CONGRATULATION!!!
//      *                 
//              *
//  *                *
//         *              
//          ()    *
//     *   /\/\
//    ()  /\/\/\
//       /\/\/\A/\    ()
//     /\/\/\/\/\/\
//   /\/\A/\/\/\A/\/\
// /\/\/\/\/\/\/\/\/\/\
// --------------------
//     |         |
// 	|         |
// 	-----------


// *************************

// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function(){
	location.href = 'http:\/\/www.google.com'
}

//  addEventListener(eventType, function)

const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);
	// 두번째는 타겟(기본이 _blank:새 창 열기, _self:지금 창에서 열기),
	// 세 번째는 창의 크기)


//팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');
BTNCLOSE.addEventListener('click', popClose);



//----------------
// 이벤트 삭제
//----------------

// BTNDAUM.removeEventListener('click', popOpen);
BTNCLOSE.removeEventListener('click', popClose);

function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}

function popClose() {
	winOpen.close();
}


//'test'를 콘솔에 출력하는 함수
function test() {
	console.log("test");
}
// 콜백함수를 실행하는 함수
function cb(fnc){
	fnc();
}


const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', alert1);

function alert1(){
	alert('DIV1에 들어왔어요.');
	DIV1.style.backgroundColor = 'black';
}