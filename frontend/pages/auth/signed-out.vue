<template>
    <div>You have been signed out!</div>
</template>

<script>
export default {
    middleware: ['auth'],
    options: {
        auth: false,
    },
};
</script>
