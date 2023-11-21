
<template>
  <div id="mouse_no" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
  <img alt="Vue logo" src="./assets/logo.png">
<!-- 헤더 -->
<Header :data="navlist"></Header>
<!-- 컴포넌트로 이관 -->
<!-- <div class="nav"> -->
  <!-- <a href="#">홈</a>
  <a href="#">상품</a>
  <a href="#">기타</a> -->

  <!-- 반복문  -->
  <!-- <a v-for="(item, i) in navlist" :key="i" href="#">{{ i + ':' + item }}</a>
</div> -->


<!-- 할인배너 -->
<Discount></Discount>
<!-- 컴포넌트로 이관 -->
<!-- <div class="discount">
<p>지금 당장 구매하시면, 30% 할인!</p>
</div> -->


<!-- 모달 -->
<transition name="modalAni">
<Modal v-if = "modalFlg" :data = "modalProduct"
@closeModal = "modalClose"> </Modal>
</transition>
<!-- <transition name="modalAni">
<div class="bg_black" v-if="modalFlg" >
  <div class="bg_white">
    <img :src="modalProduct.img">
    <h4> 상품명 : {{ modalProduct.name }}</h4>
    <p> 상품 설명 : {{ modalProduct.content }}</p>
    <p> 가격 : {{ modalProduct.price }} 원</p>
    <p>신고먹은 수 : {{ modalProduct.reportCount }}</p>
    <button @click="modalClose()">닫기 </button>
  </div>
</div>
</transition> -->

  <!-- 상품 리스트 -->
  <Detail :data = "products" @modalOpen = "modalOpen" @plusOne = "plusOne"></Detail>
  <!-- 컴포넌트로 이관 -->
    <!-- <div>
      <h4 :style="sty_color_red">{{ product1[0] }}</h4>
      <p>{{ price1[0] }} 원</p>
    </div>
    <div>
      <h4 :style="sty_color_red">{{ product1[1] }}</h4>
      <p>{{ price1[1] }} 원</p>
    </div>
    <div>
      <h4 :style="sty_color_red">{{ product1[2] }}</h4>
      <p>{{ price1[2] }} 원</p>
    </div> -->
    <!-- <div v-for="(item, i) in products" :key="i">
      <h4 @click="modalOpen(item)" :style="sty_color_red">{{ item.name }}</h4>
      <p>{{ item.price }}</p>
      <button @click="plusOne(i)">허위 매물 신고</button>
      <span> 신고 수 : {{ item.reportCount }}</span> -->
  </div>
</template>
<script>
import data from './assets/js/data.js';
import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Detail from './components/Detail.vue';

export default {
    name: "App",
    // 데이터 바인딩 (사용할 데이터를 저장하는 공간)
    data() {
        return {
            navlist: ["홈", "상품", "기타", "문의"],
            // price1 : [70000, 24000, 38000],
            // product1 : ['양말', '티셔츠', '바지' ],
            products: data,
            sty_color_red: "color: blue",
            modalFlg: false,
            modalProduct: {},
        };
    },
    // methods : 함수를 정의하는 영역
    methods: {
        plusOne(i) {
            this.products[i].reportCount++;
        },
        modalOpen(item) {
            this.modalFlg = true;
            this.modalProduct = item;
        },
        modalClose() {
          this.modalFlg = false;
        }
    },
    // components : 컴포넌트를 등록하는 영역
    components: {
        Discount,
        Header,
        Modal,
        Detail,
    },
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
/*  css 파일로 이관
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #ffffff;
  padding: 10px;
  text-decoration: none;
  margin: 5px;
}

.nav a:hover, .nav a:focus, .nav a:active {
  background-color: rgb(38, 165, 114);
  border-radius: 10px;
} */
</style>
