<template>
    <div v-for="(data, i) in data" :key="i" class="detail-div">
        <h4 class="detail-h4" @click="$emit('modalOpen', data)">{{ data.name }}</h4>
        <p>{{ data.price }}</p>
        <button @click="$emit('plusOne', i)">허위 매물 신고</button>
        <span> 신고 수 : {{ data.reportCount }}</span>
    </div>
</template>
<script>
export default {
    name: "Detail",
    props : {
        data: Object,
    },
}
</script>
<style>
    .detail-h4 {
        color: rgb(9, 79, 157);
        font-size: 1.4rem;
    }
</style>