
//동기적인 처리 : 순서대로 찍힘
// console.log('A');
// console.log('B');
// console.log('C');

// 비동기적인 처리
// 만약 console.log('B')에 비동기적인 처리를 하면 맨 마지막에 찍힘

console.log('A');
setTime(()=>{
	console.log('B');
}, 1000);
console.log('C');


// const NOW = new Date();
// let l1 = new Date();

function my_setTimeout(callback, ms){
	const NOW = new Date();
	let l1 = new Date();
	
	while(l1 - NOW <= 2000){
		l1 = new Date();
	}
	callback();
}

my_setTimeout(() => console.log('1'), 1000);
my_setTimeout(() => console.log('2'), 1000);
my_setTimeout(() => console.log('3'), 1000);


// A는 3초로 세팅, B는 2초로 세팅, C는 1초에 순차로 찍기 
setTimeout(() => {
	console.log('A');
},3000)
setTimeout(() => {
	console.log('B');
},2000)
setTimeout(() => {
	console.log('c');
},1000) //C, B, A 순서로 찍힘

// 콜백지옥
// 비동기처리를 동기처리로 하고 싶을 때 (콜백지옥 : 콜백함수를 이용하여
// 비동기처리를 동기처리하도록 만들때 나타나는 소스코드의 난잡한 현상)
setTimeout(() => {
	console.log('A');
	setTimeout(() => {
		console.log('B');
		setTimeout(() => {
			console.log('c')
		}, 1000);
	}, 2000);
}, 3000);




