let now = new Date(); //객체임 default는 오늘 날짜

// getFullYear() : 연도만 가져오는 메소드
console.log(now.getFullYear());
let year = now.getFullYear();

// getMonth() : 월만 가져오는 메소드 (+1을 해줘야 현재 월과 같음)
console.log(now.getMonth() + 1);
let month = (now.getMonth() + 1);

// getDate() : 일을 가져오는 메소드
console.log(now.getDate());
let date = now.getDate();
let sDate = new Date('2023-09-30 19:20:10');

// getDay() : 요일을 가져오는 메소드 ( 0(일요일) ~ 6(토요일))
console.log(now.getDay());
Kday = '';

// switch (day) {
// 	case 1:
// 		KDay = '월요일';
// 		break;
// 	case 2:
// 		KDay = '화요일';
// 		break;
// 	case 3:
// 		KDay = '수요일';
// 		break;
// 	case 4:
// 		KDay = '목요일';
// 		break;
// 	case 5:
// 		KDay = '금요일';
// 		break;
// 	case 6:
// 		KDay = '토요일';
// 		break;
// 	default:
// 		KDay = '일요일'
// 		break;
// }

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초 단위로 출력

// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구하기
date = new Date();
sDate = new Date('2023-09-30 19:20:10');

const Date1 = sDate.getTime();
const nowdate = date.getTime();

const total = nowdate - Date1;
const total_date = Math.ceil(total/(1000*60*60*24));
console.log(total_date);

let diff = Math.abs(Math.floor(( date - sDate ) / 86400000));


new Date(year, month-1, date, 0, 0, 0, 0); //오늘날짜 0시 0분 0초 0밀리초 가져오는 방법

//절대값
Math.abs();