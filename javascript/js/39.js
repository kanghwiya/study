// ---------------------------------------------------------
// 1. DOM ( Document Object Model )이란? - 교재 P.679 그림 참조
//  - 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
//  - DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능
//  - 유저의 반응 혹은 이벤트에 따라 페이지를 계속 바꾸어주는 것
// ---------------------------------------------------------


// --------------
// 2. 요소 선택
// --------------
//  2-1. 고유한 ID로 요소를 선택

const TITLE = document.getElementById('title');
TITLE.style.color = 'blue'; //inline으로 들어감


const SUB = document.getElementById('subtitle');
SUB.style.backgroundColor = 'Beige';


//  2-2. 태그명으로 요소를 선택 (해당 요소들을 컬렉션 개체로 가져온다.)
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';

//  2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');
//인덱스 번호로 접근해서 사용하면됨

//  2-4. css 선택자를 사용해 요소를 찾는 메서드
//	querySelector(): 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

// querySelectAll() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');
S_NONE_ALL[0].style.color = 'Green'; //전체선택시 for 사용


// --------------
// 3. 요소 조작
// --------------
// testContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '바꿀문구입력';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// setAttribute('', '') : 요소에 속성을 추가. (속성으로 넣을 수 있는건 모두 넣을 수 있음)
const INPUT = document.querySelector('#intxt');
INPUT.setAttribute('placeholder', '동글동글헤');
// ** 몇몇 속성들은 DOM객체에서 바로 설정 가능
//  ex) INTXT.placeholder = '바로접근가능'

// removeAttribute('') : 요소의 속성을 제거
INPUT.removeAttribute('placeholder');

// ------------------
// 4. 요소 스타일링
// ------------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'Black';

//  classList : 클래스로 스타일 추가
TITLE.classList.add('class1', 'class2', 'class3');
//  삭제
TITLE.classList.remove('class2');



// ------------------
// 5. 새로운 요소 생성
// ------------------
// 요소 만들기
const LI = document.createElement('li');
LI.innerHTML = '오잉';

// 삽입할 부모 요소 접근
const UL = document.querySelector('#ul');

// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI);

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('li:nth-child(3)');
UL.insertBefore(LI, SPACE);

//해당 요소를 지우는 방법
LI.remove();


// 1. 사과게임 위에 장기를 넣어주세요.

const JJANG = document.createElement('li');
JJANG.innerHTML = '장기';
const PARENTS = document.querySelector('#ul');
const LOCATION = document.querySelector('li:nth-child(4)');
PARENTS.insertBefore(JJANG, LOCATION);

// 2. 어메이징브릭에 베이지 배경색을 넣어주세요.

const AMAZING = document.querySelector('ul li:last-child');
AMAZING.style.backgroundColor = 'Beige';

// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파란색 글씨로 만들어주세요.

// 방법1
const COLOR = document.getElementsByTagName('li');

for(let i = 0; i < COLOR.length; i++){
	if( i % 2 === 0 ){
		COLOR[i].style.color = 'Blue';
	} else {
		COLOR[i].style.color = 'Red';
	}
}

// 방법2
const EVEN = document.querySelectorAll('ul li:nth-child(even)');
const ODD = document.querySelectorAll('ul li:nth-child(odd)');
for(let i = 0; i < EVEN.length; i++){
	EVEN[i].style.color = 'red';
}
for(let i = 0; i < ODD.length; i++){
	ODD[i].style.color = 'red';
}


// 방법3
for(let i = 0; i < COLOR.length; i++){
	COLOR[i].style.color = i % 2 === 0 ? 'blue' : 'red';
}

// const TEST = document.querySelector('#title');
// TEST.style.backgroundColor = 'Blue';














