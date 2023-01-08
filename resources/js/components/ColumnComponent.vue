<template>
    <div class="column" v-for="index in 15" :key="index">
        <div class="column__header">
            <div class="column__title">
                <div class="column__title__inner">Column {{ index }}</div>
            </div>
            <div class="column__button_close">
                <font-awesome-icon icon="fa-solid fa-xmark"/>
            </div>
        </div>
        <div class="column__content">
            <card-component></card-component>
        </div>
        <div class="column__footer">
            <div class="column__add_card">
                <div class="column__add_card__input" :class="{ editable: addCardContenteditable}" @click="addCardContenteditable = true"
                     :contenteditable="addCardContenteditable">Add a card +
                </div>
                <div class="column__add_card__buttons" :class="{invisible: !addCardContenteditable}">
                    <div class="column__add_card__buttons button button-secondary"
                         @click="addCardContenteditable=false">Cancel
                    </div>
                    <div class="column__add_card__buttons button button-primary">Save</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardComponent from "./CardComponent.vue";

export default {
    name: "ColumnComponent",
    components: {CardComponent},
    data() {
        return {addCardContenteditable: false}
    },
}
</script>

<style scoped lang="scss">
.column {
    display: flex;
    flex-direction: column;
    width: 310px;
    margin-right: 10px;
    min-height: 250px;
    max-height: 95vh;
    align-items: stretch;
    border-radius: 0.125rem;
    background-color: #f4f5f7;

    &__header {
        display: flex;
        min-height: 35px;
        justify-content: space-around;

    }

    &__title {
        display: flex;
        flex-basis: 80%;

        &__inner {
            margin-left: 16px;
            font-size: 14px;
            margin-top: 5px;
        }

    }

    &__button_close {
        display: flex;
        align-self: center;
        justify-content: center;
        font-size: 17px;
        cursor: pointer;

        svg {
            width: 20px;
            height: 20px;
        }
    }

    &__content {
        display: flex;
        flex-direction: column;
        row-gap: 10px;
        max-height: 88vh;
        overflow-y: scroll;

    }

    &__footer {
        align-items: center;
    }

    &__add_card {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 10px 10px;
        align-items: center;

        &__input {
            &.editable{
                background: white;
            }
        }

        &__buttons {
            display: flex;
            flex-basis: 30%;
            column-gap: 10px;

            &.invisible {
                visibility: hidden;
            }

        }

    }
}

.button {
    padding: 0.5rem 1rem;
    border-radius: 10px;
    cursor: pointer;
    user-select: none;
    font-size: 90%;

    &:hover {
        opacity: 0.8;
    }

    &:active {
        opacity: 0.9;
    }

    &-secondary {
        background-color: rgb(216 216 216);
    }

    &-primary {
        background-color: rgba(9, 9, 9, 0.99);
        color: white;
    }
}
</style>
