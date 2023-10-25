//자바스크립트에서 배열은 객체임
let arr = [1,2,3,4,5];

// push() 메소드 : 배열에 값을 추가
arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체
// arr.splice(2, 1); // 배열의 arr[2]를 삭제. splice(시작할 번호, 갯수)
arr.splice(4, 1);
arr.splice(2, 0, '동글동글'); //배열의 arr[2]에 값이 10인 인덱스를 추가
arr.splice(2, 0, 10, 11, 12, 13); // 3번째 인자(아규먼트)부터는 가변 파라미터로써 모든 값을 추가
arr.splice(2, 0, '동구래');


//indexOf() : 배열에서 특정 요소를 찾는데 사용
arr.indexOf(); // 입력한 값의 인덱스 값을 가져옴


// lastIndexOf(): 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];
arr.lastIndexOf(1);


// pop() : 배열의 가장 마지막 요소를 삭제하면서 그 삭제한 값을 리턴함
let i_pop = arr.pop();

// sort() : 배열을 정렬
arr = [ 6, 5, 7, 8, 9, 9, 1];
let arr_sort = arr.sort( function(a,b) {
	return a - b;
});

//arr, pop, sort 등은 원본을 변경하는 메소드 : arr_sort가 아닌 arr을 불러내도 정렬된 채로 불러옴

arr.sort((a,b) => a - b); //오름차순

arr.sort((a,b) => b - a); //내림차순

//값 복사 - 원본 데이터와 별도의 같은 배열을 새로 만드는 방법 (value copy 방식)
let arr2 = Array.from(arr);


// includes() : 배열의 특정요소를 가지고 있는지 판별
//True false출력. 값이 있으면 True, 아닐시 false. return은 boolean
arr = [ '치킨', '육회비빔밥', '비엔나'];
let boo_includes = arr.includes('치킨');


// join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
arr.join(); // '치킨,육회비빔밥,비앤나' <- 콤마가 자동으로 입력된채 출력됨
arr.join('/'); // 구분문자 넣으면 그대로 출력됨


// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// 모든 요소의 값 * 2의 결과를 배열로 얻기
let arr_map = arr.map( num => num * 2 );

arr_map = arr.map ( num => {
	if( num % 3 === 0){
		return '짝';
	} else {
		return num;
	}
});


// some() : 주어진 함수를 만족하는 요소가 있는지 판별해서 하나라도 있으면 true (return boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_some = arr.some( num => num > 10); // False
let boo_some2 = arr.some( num => num === 9); // True


//every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족 안하면 false ( return boolean )
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_every = arr.some( num => num === 9); // False

// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_filter = arr.filter( num => num % 3 === 0 );

//reduce





//0.0