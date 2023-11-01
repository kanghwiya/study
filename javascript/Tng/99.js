
const BTN_API = document.querySelector('#nawa');
BTN_API.addEventListener('click', imgSummons);

function imgSummons(){
	const INPUT = document.querySelector('#link');
	fetch(INPUT.value.trim())
	.then( response => {
		if( response.status >= 200 && response.status < 300){
			return response.json();
		} else {
			throw new Error('에러뽝');
		}
	})
	.then( data => imgCall(data))
	.catch( error => console.log(error));
}

function imgCall(data){
	data.forEach( item => {
		const IMG_CALL = document.createElement('img');
		IMG_CALL.setAttribute('class', 'content-img');
		IMG_CALL.setAttribute('src', item.download_url);
		IMG_CALL.style.width = '100%';
		const CONTENT = document.getElementById('content-grid')
		const NEW_ID = document.createElement('div');
		const NEW_DIV = document.createElement('div');
		NEW_ID.innerHTML = item.id;
		NEW_DIV.setAttribute('class', 'new-div');
		NEW_DIV.appendChild(NEW_ID);
		NEW_DIV.appendChild(IMG_CALL);
		CONTENT.appendChild(NEW_DIV);
	});
}

const BTN_DELETE = document.getElementById('delete');
BTN_DELETE.addEventListener('click',remove)

function remove(){
	const IMGCON = document.getElementById('content-grid');
	IMGCON.innerHTML = "";
}

// https://picsum.photos/v2/list?page=2&limit=5