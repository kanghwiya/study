<template>
    <div>
        <h1>로그인 컴포넌트</h1>
        <h2> 라라벨 데이터 name : {{ $store.state.laravelData.name }}</h2>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'LoginComponent',
}
</script>
<style>

</style>