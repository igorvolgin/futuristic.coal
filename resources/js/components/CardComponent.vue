<template>
    <div class="card" v-for="index in 15" :key="index">
        <div class="card__title">
            <div class="card__title__inner">Card {{index}}</div>
        </div>
        <div class="card__draggable"></div>
    </div>
</template>

<script>
export default {
    name: "CardComponent"
}
</script>

<style scoped lang="scss">
.card{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background-color: white;
    min-height: 80px;
    box-shadow: 0 2px 7px #00000045;
    margin: 0 5px;


    &__title{
        flex-basis: 70%;
        padding: 15px;
        overflow: hidden;
        &__inner{
            text-overflow: ellipsis;
            overflow: hidden;

        }
    }
    &__draggable{
        flex-basis: 30%;
        cursor: grab;
    }
}
</style>
