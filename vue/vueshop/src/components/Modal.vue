<template lang="">
    <transition name="modalAni">
        <div class="bg_black" >
            <div class="bg_white">
                <img :src="data.img">
                <h4> 상품명 : {{ data.name }}</h4>
                <p> 상품 설명 : {{ data.content }}</p>
                <p> 가격 : {{ data.price }} 원</p>
                <input type="text" v-model="productCnt" >
                <p>총 가격 : {{ data.price * productCnt }} </p>
                <p>신고먹은 수 : {{ data.reportCount }}</p>
                <button @click="$emit('closeModal')">닫기</button>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    name: 'Modal',
    data() {
        return {
            productCnt: 3,
        }
    },
    // watch : data를 감시하는 함수를 정의하는 영역
    watch : {
        // 함수명은 감시하고 싶은 데이터바인딩명과 동일해야 합니다.
        productCnt(input) {
            if(input > 10 || input < 0){
                alert('땡!!!!!!');
                this.productCnt = 0;
            }
        }
    },
    props : {
        data: Object,
    }
}
</script>
<style lang="">
    
</style>