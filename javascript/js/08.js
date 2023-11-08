//----------------
//조건문 ( if, switch )
//----------------
// if(조건){
// 	//처리
// } else if(조건){
// 	//처리
// } else {
// 	//처리
// };

// let age = 30;
// switch(age){
// 	case 20:
// 		console.log("20대");
// 		break;
// 	case 30:
// 		console.log("30대");
// 		break;
// 	default:
// 		console.log("모르겠다");
// 		break;
// }


//-----------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
//-----------------------------------------------------

// foreach : 배열만 사용가능
let arr = [1, 2, 3, 4];
arr.forEach( function( val, key ){
	console.log(`${key} : ${val}`);
	// console.log(key + ' : ' + val);
});


// for...in : 모든 객체를 루프 가능, key에만 접근이 가능

let obj = {
	key1: 'val1'
	,key2: 'val2'
}
for( let key in obj ){
	console.log(obj[key]);
}

// for...of : 모든 iterable 객체를 루프 가능, value에만 접근이 가능(String, Array, map, Set, TypeArray..)

for( let val of arr ){
	console.log(val);
}


// 정렬해주세요.
let sort_arr = [3, 5, 2, 7, 10];
let save;

let sort_arr2 = sort_arr.sort((a, b) => a - b);
// let sort_arr2 = sort_arr.sort(function(a,b){return a - b});
console.log(sort_arr2);


for(let num = 0; num<sort_arr.length; num++){
	for(let turn = 0; turn < sort_arr.length -num - 1; turn++){
		if(sort_arr[turn] > sort_arr[turn+1]){
			save = sort_arr[turn];
			sort_arr[turn] = sort_arr[turn+1];
			sort_arr[turn+1] = save;
		}
	}
}










