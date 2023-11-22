import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            boardData: [], //게시글 저장용
            flgTabUI: 0, //tabui용 플래그
            imgURL: '', //작성탭 표시용 이미지 URL 저장용
            postFileData: null, //객체로 옴. 글 작성용 파일 데이터 저장
            lastBoardId: 0, //가장 마지막 로드된 게시글 번호 저장
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역(데이터를 넣을 때 항상 통과해야 함)
    mutations: {
        setBoardList(state, data) {
            state.boardData = data;
            state.lastBoardId = data[data.length - 1].id;
        },
        // 탭 ui 세팅용
        setFlgTabUI(state, num) {
            state.flgTabUI = num;
        },
        // 작성탭 표시용 이미지 URL 세팅용
        setImgURL(state, url) {
            state.imgURL = url;
        },
        //글 작성용 파일 데이터 세팅용
        setPostFileData(state, file) {
            state.postFileData = file;
        },
        // 작성된 글 삽입용
        setUnshiftBoard(state, data) {
            state.boardData.unshift(data);
        },
        // 더보기
        setBoardListShow(state, data) {
            state.boardData.push(data);
            state.lastBoardId = state.boardData[state.boardData.length - 1].id;
        },
        // 작성된 데이터 초기화
        setClearAddData(state){
            state.imgURL = '';
            state.postFileData = null;
        },
    },
    // commit : mutation을 호출하는 함수, 첫번째 파라미터에 mutation의 이름,
    // 두 번째 파라미터에 불러올 데이터 입력
    actions: {
        // 초기 데이터 획득
        actionGetBoardList(context){

            const url = 'http://112.222.157.156:6006/api/boards';
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                }
            };
            axios.get(url, header)
            .then(res => {
                context.commit('setBoardList', res.data);
            })
            .catch(error => {
                console.log(error);
            })
        },

        // 글 작성 처리(context는 고정)
        actionPostBoardAdd(context) {
            const url = 'http://112.222.157.156:6006/api/boards';

            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                    // 보내주는 데이터가 이미지를 담고 있기 때문에 ultipart/form-data가 됨
                    // 담은 이미지가 이 form-data에 넘어감
                    'Content-Type': 'multipart/form-data',
                }
            };
            const data = {
                name: '네임',
                img: context.state.postFileData,
                content: document.getElementById('content').value,
            };

            axios.post(url, data, header)
            .then(res => {
                // 작성글 데이터 저장
                context.commit('setUnshiftBoard', res.data);

                // 리스트 UI로 전환
                context.commit('setFlgTabUI', 0);

                // 작성 후 초기화 처리
                context.commit('setClearAddData');
            })
            .catch( err => {
                console.log(err)
            })
        },
            // 글 더보기
        actionShowBoardList(context){

            const url = 'http://112.222.157.156:6006/api/boards/'+ context.state.lastBoardId;
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                }
            };

            axios.get(url, header)
            .then(res => {
                context.commit('setBoardListShow', res.data);
            })
            .catch(error => {
                console.log(error);
            })
        },
    }
    // actions : @ajax로 서버에 데이터를 요청할 때나 시간 함수 등 비동기 차리를 action에 정의하여 사용
});

export default store;