// AJAX

// API는 사용도구
// AJAX는 백과 프론트를 연결하는 . ? 통신기술

// JSON
// Javascript 객체 문법
// 데이터 타입이 문자열임(텍스트 데이터/객체x)
// 자바스크립트의 객체와 생김새가 유사하기 때문에 이름이 JSON
// 데이터들을 주거나 전달받을 때 사용하는 포멧 형식

// function getItem() {
// 	fetch('http://localhost:8000/api/item')
// 	.then(response => response.json())
// 	.then(data => console.log(data))
// 	.catch(error => console.log(error));
// 	return false;
// }


function getItem() {
    fetch('http://localhost:8000/api/item')
    .then(a => a.json())
    .then( b => {
		let content = b.data[0].content;
		let cp = document.createElement('p');
		cp.innerHTML = content;
		document.body.appendChild(cp);
	})
    .catch(error => console.log(error));
    return false;
}

const BTN = document.getElementById('btnOn');
BTN.addEventListener('click', getItem);