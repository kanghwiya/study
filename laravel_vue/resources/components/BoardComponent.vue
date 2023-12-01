<template>
    <div>
        <h1>보드 컴포넌트</h1>
        <h2> 라라벨 데이터 name : {{ $store.state.laravelData.name }}</h2>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'BoardComponent',
}
</script>
<style>

</style>