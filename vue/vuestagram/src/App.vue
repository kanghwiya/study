<template>
  <!-- header -->
  <div class="header">
    <ul>
    <li class="header-button header-button-left" v-if="$store.state.flgTabUI !== 0" @click="this.$store.commit('setFlgTabUI', 0)">취소</li>
    <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
    <li class="header-button header-button-right" v-if="$store.state.flgTabUI === 1"
    @click="addBoard()">작성</li>
  </ul>
  </div>

  <!-- container -->
<ContainerComponent></ContainerComponent>

<!-- 더보기 버튼 -->
<button v-if="$store.state.flgBtnMoreView && $store.state.flgTabUI === 0" @click="addShowBoard()">더보기</button>

<!-- footer -->
<div class="footer">
  <div class="footer-button-store">
    <label for="file" class="label-store">+</label>
    <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
  </div>
</div>


</template>
<!-- 라이프 사이클은 전부 App.vue 에서 선언 -->
<script>
import ContainerComponent from './components/ContainerComponent.vue'

export default {
  name: 'App',
  created() {
    // actions = dispatch , mutation = commit
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]); //이미지 임시저장해서 imgURL에 담음
      // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTabUI', 1);

      // 이벤트 타입 초기화
      e.target.value = '';
    },
    // 글 작성 처리
    addBoard() {
      this.$store.dispatch('actionPostBoardAdd');
    },
    addShowBoard() {
      this.$store.dispatch('actionShowBoardList');
    }
  },
  components: {
    ContainerComponent,
  }
}

</script>

<style>
@import url(./assets/css/common.css);
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
