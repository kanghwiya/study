// 1. promise 객체
	// -비동기 프로그래밍의 근간이 되는 기법 중 하나
	// -프로미스를 사용하면 콜백 함수를 대체하고, 비동기 직업의 흐름을 쉽게 제어가능
	// -Promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체


// 2. promise 사용법

const PROMISE1 = new Promise( function(resolve, reject){
	let flg = true;
	if(flg){
		return resolve('성공'); //요청 성공 시 resolve()를 호출
	} else {
		return reject('실패'); //요청 실패 시 reject()를 호출
	}
});

PROMISE1
.then( data => console.log(data) ) //resolve의 '성공'값을 받아옴
.catch( err => console.log(err) ) //reject 값이 없어서 나오지 않음
.finally( () => console.log('finally 입니다.') ); //무조건 실행



const PRO2 = function(ms){
	return new Promise((resolve, reject) => {
		setTimeout(() => resolve(ms), ms); //reject는 필요없으면 생략가능
	})
};

PRO2(1000)
.then( data => {
	console.log('A');
	PRO2
	.then()})


function PROMISE2(){
	return new Promise( function(resolve, reject){
		let flg = true;
		if(flg){
			return resolve('성공'); //요청 성공 시 resolve()를 호출
		} else {
			return reject('실패'); //요청 실패 시 reject()를 호출
		}
	});
}

PROMISE2
.then()
.catch()
.finally();


function PRO3(str, ms){
	return new Promise( function(resolve) {
		setTimeout(() => {
			console.log(str);
			resolve();
		}, ms);
	});
}

PRO3('A', 3000)
.then( () => PRO3('B', 2000) )
.then( () => PRO3('C', 1000) );

