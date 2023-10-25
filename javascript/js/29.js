
// random() : 0이상 1미만의 랜덤한 수를 리턴

Math.ceil(Math.random() * 10);

console.log('루프시작');

for( let i = 0; i < 1000000; i++){
	let ran = Math.ceil(Math.random() * 10);
	if( ran < 1 || ran > 10){
		console.log('이상한 숫자');
	}
};

console.log('루프끝');


Math.ceil(3.5); //올림
Math.round(3.5); //반올림
Math.floor(3.5); //버림

//min(), max() : 파라미터 중 가장 작은/큰 값을 리턴
let arr = [1,2,3,4];
Math.min(...arr);
Math.min(1,2,3);
Math.max(1,2,3);