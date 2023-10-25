
//원본은 보존하면서 오름차순 정렬해주세요.
const ARR_SORT = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];
let arr_sort2 = Array.from(ARR_SORT).sort((a, b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어주세요. / 함수도
const ARR2 = [5, 7, 3, 4, 5, 1, 2];
const arr_even = ARR2.filter(num => num % 2 === 0);
const arr_odd = ARR2.filter(num => num % 2 === 1);



function test( arr, flg ) {
	if( flg === 0){
		return arr.filter( num => num % 2 === 0 );
	} else {
		return arr.filter( num => num % 2 === 1 );
	}
}


// 다음 문자열에서 구분문자를 '.'에서 ' '으로 변경해 주세요. 
const STR1 = 'php504.meer.kat';
let str = STR1.replaceAll('.', ' ');

//split 사용
STR1.split('.').join(' ');

//replace 사용
STR1.replace(/\./g, ' ');

// let str2 = STR1.replace(/./g, ' ');