// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
// "안녕하세요."
// "숨어있는 div를 찾아보세요."


// 2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다. 들킨 상태에서는 알러트가 안나옵니다.
// 2-2. 들킨 상태에서는 알러트가 안나옵니다.
// "두근두근"

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
// "들켰다!"

// 4. 3번의 상태에서 다시 한 번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
// "다시 숨는다."


function dokidoki(){
	alert('두근두근');
}
const DIV = document.querySelector('#div');

const BUTTON = document.querySelector('#button');
BUTTON.addEventListener('click', () => alert('안녕하세요.' + '\n' + '숨어있는 div를 찾아보세요.'));

const DOKI = document.querySelector('#doki');
DOKI.addEventListener('mouseenter', dokidoki);

const CATCH = document.querySelector('#catch');

CATCH.addEventListener('click', () => {
	if(getComputedStyle(CATCH).backgroundColor === 'rgb(255, 255, 255)'){
		alert('들켰다!');
		CATCH.style.backgroundColor = 'beige';
		DOKI.removeEventListener('mouseenter', dokidoki);
} else if(getComputedStyle(CATCH).backgroundColor === 'rgb(245, 245, 220)'){
		alert('다시 숨는다!');
		CATCH.style.backgroundColor = 'white';
		DOKI.addEventListener('mouseenter', dokidoki);
		// 랜덤
		const TOP = Math.ceil(Math.random() * window.innerHeight - 150);  //window.innerHeight
		const LEFT = Math.ceil(Math.random() * window.innerWidth - 150); //window.innerWidth
		DIV.style.top = TOP + 'px';
		DIV.style.left = LEFT + 'px';

}});

// getEvenetListeners : 이벤트 확인