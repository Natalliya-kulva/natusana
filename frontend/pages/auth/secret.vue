<template>
    <main class="home">
        <div class="grid-container">
            <pre>{{ state }}</pre>
            <p>Token: {{ $auth.strategy.token.get() || '-' }}</p>
        </div>

        <a @click="$auth.logout()">Logout</a>
    </main>
</template>

<script>
export default {
    components: {},
    middleware: ['auth'],
    computed: {
        state() {
            return JSON.stringify(this.$auth.$state, undefined, 2);
        },
    },
    methods: {},
};
</script>
