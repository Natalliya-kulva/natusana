<template lang="pug">
button.btn(
    :class="type"
    :type="isSubmit ? 'submit' : false"
)
    slot
</template>

<script>
import Vue from 'vue';

const buttonTypes = ['primary', 'secondary', 'success', 'alert', 'warning'];

export default Vue.extend({
    props: {
        type: {
            type: String,
            default: 'primary',
            validator(value) {
                return !!buttonTypes.find((e) => e === value);
            },
        },
        isSubmit: {
            type: Boolean,
            default: false,
        },
    },

    data() {
        return {
            message: 'This is a message',
        };
    },
});
</script>

<style lang="scss">
.btn {
    cursor: pointer;
    padding: rem-calc(10px 15px);
    outline: none;
    border-radius: rem-calc(5px);

    &.primary {
        background-color: $primary-color;
        color: #fff;
    }

    &.secondary {
        background-color: $secondary-color;
        color: #fff;
    }

    &.success {
        background-color: $success-color;
    }

    &.alert {
        background-color: $alert-color;
    }

    &.warning {
        background-color: $warning-color;
    }

    &.loading {
        cursor: wait;
    }
}
</style>
