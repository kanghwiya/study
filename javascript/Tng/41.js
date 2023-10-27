// 1. 현재 시간을 화면에 표시
// 2. 실시간으로 시간을 화면에 표시

time();

// function clock(){
// 	time();
let interval;
clockRestart();
// }

function time(){
	const TIMETOTAL = new Date();
	// const USATIME = new Date();
	const HOUR = TIMETOTAL.getHours();
	const MINUTES = TIMETOTAL.getMinutes();
	const SECOND = TIMETOTAL.getSeconds();
	const TIME = document.getElementById('div');

	// USATIME.setTime( NOW - (1000 * 60 * 60 * 13)); //현재시간 -13시
	// let now_usa = USATIME.toLocaleDateString();
	
	if(HOUR >= 12){
		TIME.innerHTML = HOUR - 12 + ":" + MINUTES + ":" + SECOND + " PM";
	} else if(HOUR < 12){
		TIME.innerHTML = HOUR + ":" + MINUTES + ":" + SECOND + " AM";
	} //왜 문자가 앞에 시작하면 안되지? 시간 앞에 0붙이는거 미구현
	// TIME.innerHTML = TIMETOTAL.toLocaleDateString();

	// padstart(2, '0')


}
function add_str_zero(num){
	return string(num < 10 ? '0' + num : num);
}


// 3. 멈춰 버튼을 누르면, 시간이 정지할 것
const STOP = document.querySelector('#stop');
STOP.addEventListener('click', clockstop);

function clockstop(){
	clearInterval(interval);
}

// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const RESTART = document.getElementById('restart');
RESTART.addEventListener('click', clockRestart);

function clockRestart(){
	time();
	interval = setInterval(time, 1000);
}