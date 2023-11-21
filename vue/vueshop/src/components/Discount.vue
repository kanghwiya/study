
<!-- vueInit -->
<template>
    <div class="discount">
        <p>지금 당장 구매하시면, <span class="red30">{{ discountNum }}%</span> 할인!</p>
    </div>
</template>
<script>
export default {
    name: "Discount",
    data() {
        return {
            discountNum: 13,
            intervalInfo: null,
        }
    },
    // 라이프사이클Hooks : mounted 단계에서 실행되는 영역
    mounted() {
        this.intervalInfo = setInterval(() => {
            this.discountNum--;
        }, 1000);
    },
    updated() {
        if(this.discountNum === 10) {
            clearInterval(this.intervalInfo);
        }
    },
}
</script>
<style>
    .red30 {
        color: rgb(231, 48, 69);
        font-family: 'DNFBitBitv2'!important;
        font-size: 2rem;
        border-bottom: 3px dotted salmon;
    }
</style>