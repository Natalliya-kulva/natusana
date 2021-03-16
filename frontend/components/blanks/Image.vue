<template lang="pug">
include ../../tools/mixins.pug
+b.image
    picture
        source(
            :srcset="`${path}.webp`"
            type="image/webp"
        )
        source(
            :srcset="fallbackSrc"
            :type="`image/${fallbackExt}`"
        )
        img(
            :key="'image'"
            :src="fallbackSrc"
            :alt="alt"
        )
</template>

<script>
export default {
    props: {
        path: {
            type: String,
            required: true,
        },
        fallbackExt: {
            type: String,
            required: true,
        },
        alt: {
            type: String,
            required: true,
        },
    },
    computed: {
        fallbackSrc() {
            return `${this.path}.${this.fallbackExt}`;
        },
    },
};
</script>
