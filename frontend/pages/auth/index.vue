<template lang="pug">
main.auth
    .grid-container
        .grid-x.grid-padding-x
            .cell
                p You should see this page without need to authentication!
                n-link(
                    to="/auth/login"
                ) Login
                n-link(
                    to="/auth/secret"
                ) Secret page
</template>

<script>
export default {
    middleware: ['auth'],
    options: {
        auth: false,
    },
};
</script>

<style>
main.auth {
    text-align: center;
}
</style>
