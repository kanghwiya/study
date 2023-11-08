// const BTN_DETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose')

// BTN_DETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	// MODAL.classList.toggle('displayNone');
// 	MODAL.classList.remove('displayNone');
// });

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// });


// 상세 모달 제어

let test;

function openDetail(id) {

	const URL = '/board/detail?id='+id;
	fetch(URL)
	.then( response => response.json() )
	.then( data => {

		// 요소에 데이터 세팅
		const TITLE = document.querySelector('#b_title');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const INSERT_DATE = document.querySelector('#create_date');
		const UPDATE_DATE = document.querySelector('#update_date');

		TITLE.innerHTML = data.data.b_title;
		CONTENT.innerHTML = data.data.b_content;
		IMG.setAttribute('src', data.data.b_img);
		INSERT_DATE.innerHTML = '작성일 : ' + data.data.created_at;
		UPDATE_DATE.innerHTML = '수정일 : ' + data.data.updated_at;
		
		openModal();
	})
	.catch( error => console.log(error) )

}

function openModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none;';
}

function idChk(){
	const IDCHK = document.getElementById('idChkMsg');
	IDCHK.innerHTML = ""; //기존에 있을지도 모르는 메세지를 비우는 처리
	const USERID = document.getElementById('u_id').value;
	const URL = '/user/idchk?u_id='+USERID
	
	fetch(URL)
	.then( response => response.json() )
	.then ( data => {
		if(data.errflg === "0") {
			IDCHK.innerHTML = "사용 가능한 아이디입니다."
			IDCHK.classList = 'text-success';
		} else {
			IDCHK.innerHTML = "사용할 수 없는 아이디입니다."
			IDCHK.classList = 'text-danger';
		}
	})
	.catch( error => console.log(error) )
}