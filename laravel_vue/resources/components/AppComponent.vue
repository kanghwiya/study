<template>
    <div>
        <h1>APP VUE 컴포넌트</h1>
        <h2>{{ $store.state.testStr }}</h2>
        <h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
        <h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
        
        <ul>
            <li><a href="/">루트</a></li>
            <li><a href="/login">로그인</a></li>
            <li><a href="/board">보드</a></li>
        </ul>
        <!-- 라라벨의 라우터 -->
    </div>
    <router-link to="/login">라우터 로그인</router-link> <br>
    <router-link to="/board">보드 로그인</router-link>
    <!-- 뷰로 찾아가는 링크 -->
    <router-view></router-view>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    },
}
</script>
<style>
    div {
        background-color: thistle;
        text-align: center;
        margin: 20px;
        padding: 20px;
        border-radius: 20px;
        color: rgb(24, 32, 31);
    }
</style>