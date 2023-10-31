// 1. HTTP ( Hypertext Transfer Protocol ) 란?
// 어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
// 클라이언트가 서버에 데이터를 request(요청)을 하고,
// 서버가 해당 request에 따라 Response(응답)을 클라이언트에 보내주는 방식입니다.
// Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스(html, css, javascript 등),
// 문서(html태그), 이미지 등을 모두 포함합니다.

// 2. HTTPS : + secure

// 3. AJAX (Asynchronous javascript And XML) 이란?
// 현재 페이지에서 이동하지 않고 데이터를 불러오기 위해 사용
// 웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고,
// 서버의 response를 받아 동적으로 홈페이지를 갱신하는 프로그래밍 방식이다.
// 즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부만을 갱신할 수 있다.
// 대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있다.


// ajax

// <xml>
// 		<data>
// 			<id>56</id>
// 			<name>홍길동</홍길동>
// 		</data>
// </xml>



// 4. JSON ( JavaScript Object Notation ) 이란?
	// JavaSctipt의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
	// 장점은 다음과 같습니다.
	// 	- 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
	// 	- 가벼운 텍스트를 기반
	// 	- 가독성이 좋음
	// 	- Key와 Value가 짝을 이루고 있음
	// 	- 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
	// 	- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

// json

// {
//	 data{
// 		id: 56
// 		,name: '홍길동'
//	 }
// }

// 5. API 예제 사이트
	// https://picsum.photos/
const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5"
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);


// 1. url 2. 데이터. 처리할 방식.(post로 넣던가 get으로 넣던가 등등..)

function my_fetch(){
	const INPUT_URL = document.querySelector('#input-url');
	fetch(INPUT_URL.value.trim())
	.then( response => {
		if( response.status >= 200 && response.status < 300){
			return response.json();
		} else {
			throw new Error('에러에러');
		}
	})
	.then( data => makeImg(data))
	.catch( error => console.log(error) );

}


// status 200대는 정상처리, 300대는 서버에서 예외처리 되었을 때. 400대는 통신자체에서 에러가 났을 때

function makeImg(data) {
	data.forEach( item => {
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');
		NEW_IMG.setAttribute('src', item.download_url);
		NEW_IMG.style.width = '200px';
		NEW_IMG.style.height = '200px';
		document.body.appendChild(NEW_ID);
	});
}

// 방법1
const BTN_DELETE = document.getElementById('api-delete');
BTN_DELETE.onclick = function(){
	window.location.reload();
}


// 방법2
BTN_DELETE.addEventListener('click', remove);
function remove(){
	const INPUT_IMG = document.querySelectorAll('img');
	for(let i = 0; i < INPUT_IMG.length; i++){
		INPUT_IMG[i].remove();
	}
}

// 방법3
function remove2(){
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.replaceChildren();
}


// 방법4
function remove3(){
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.innerHTML = "";
}


