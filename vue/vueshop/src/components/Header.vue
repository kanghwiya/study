<template>
    <div class="nav">
        <a v-for="(item, i) in data" :key="i" href="#">{{ i + ':' + item }}</a>
    </div>
</template>

<script>
export default {
    name: "Header",

    // props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기 위한 영역
    // 이름 : 데이터 형식
    props : {
        data: Array,
    }
}
</script>
<style lang="">
    
</style>
