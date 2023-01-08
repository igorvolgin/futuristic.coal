<template>
    <div class="page">
        <div class="page__inner">
            <column-component></column-component>
        </div>
    </div>
</template>

<script>
    import ColumnComponent from "./ColumnComponent.vue";

    export default {
        components: {ColumnComponent},
        mounted() {

        }
    }
</script>

<style lang="scss">
    *{
        box-sizing: border-box;
    }

    .page{
        &__inner{
            //display: flex;
            padding: 15px;
            display: inline-flex!important;
            vertical-align: top;
            align-items: stretch;
            white-space: normal;
            height: calc(100vh - var(--board-top-offset) - 20px);
        }
    }
</style>
