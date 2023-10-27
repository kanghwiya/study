// 타이머 함수


// 1. setTimeout( 콜백함수, 시간(ms) ) : 일정시간이 흐른 후에 콜백함수를 실행
setTimeout( () => console.log('시간'), 3000 );

// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초 뒤에 C가 출력되도록 프로그램을 만들어주세요.
setTimeout( () => console.log('A'), 1000 );
setTimeout( () => console.log('B'), 2000 );
setTimeout( () => console.log('C'), 3000 );

setTimeout(
	() => {
		console.log('A');
		setTimeout(
			() => {
				console.log('B');
				setTimeout(
					() => {
						console.log('C');
					}, 1000)
			}, 1000)
	}, 1000)

// 함수
function abcset(chr, ms){
	setTimeout(() => console.log(chr), ms);
}
abcset('A', 1000);
abcset('B', 2000);
abcset('C', 3000);


// 2. clearTimeout(해당 setTimeout 객체) : 타이머를 삭제하는 기능
let myset = setTimeout(() => console.log('D'), 5000);
clearTimeout(myset);

// 힙스택, 브라우저ip


// 3. setInterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
let dontSleep = setInterval(() => console.log('민경씨 자지마') , 1000);

// 4. clearInterval(해당 setInterval) : 인터벌 삭제
clearInterval(dontSleep);


// 5. 화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.

setTimeout( wwoww, 5000 );

function wow() {
	document.getElementById('doong').innerHTML = '두둥등장';
}

function wwoww() {
	const TEXT = document.createElement('h1');
	TEXT.innerHtml = '두둥등장';
	// TEXT.style.fontSize = '8rem';
	document.body.appendChild(TEXT);
}

