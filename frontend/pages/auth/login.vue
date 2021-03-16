<template>
    <main class="home">
        <div class="grid-container">
            <h2>Sign in to access the secret page</h2>

            <form @submit.prevent="onLogin">
                <div class="grid-x grid-padding-x">
                    <div class="small-3 cell">
                        <label for="email" class="text-right middle"
                            >Email</label
                        >
                    </div>
                    <div class="small-9 cell">
                        <input id="email" v-model="form.email" type="text" />
                    </div>
                    <div class="small-3 cell">
                        <label for="password" class="text-right middle"
                            >Password</label
                        >
                    </div>
                    <div class="small-9 cell">
                        <input
                            id="password"
                            v-model="form.password"
                            type="password"
                        />
                    </div>

                    <app-button :is-submit="true">login</app-button>
                </div>
            </form>
        </div>
    </main>
</template>

<script>
import AppButton from '@/components/AppButton.vue';

export default {
    components: {
        AppButton,
    },

    data() {
        return {
            form: {
                email: '',
                password: '',
            },
        };
    },

    computed: {},

    methods: {
        async onLogin() {
            this.error = null;

            return this.$auth
                .loginWith('laravelJWT', {
                    data: this.form,
                })
                .catch((e) => {
                    this.error = e.response ? e.response.data : e.toString();
                });
        },
    },
};
</script>

<style lang="scss">
form {
    width: 500px;
    margin: 0 auto;
}
</style>
