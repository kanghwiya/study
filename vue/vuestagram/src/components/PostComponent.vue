<template lang="">
    <div class="post"
    v-for="item in $store.state.boardData" :key="item"
    >
        <!-- 포스트 -->
        <div class="post-img" :style="{backgroundImage : `url('${item.img}')`}">
            </div>
            <div class="post-content">
                <p>💖{{ item.likes }}</p>
                <p><strong>{{ item.name }}:</strong>{{ item.content }}</p>
                <p>{{ item.created_at }}</p>
        </div>
    </div>
</template>
<script>
export default {
    name: 'PostComponent'
}
</script>
<style lang="">
    
</style>