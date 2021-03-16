<template lang="pug">
include ../../tools/mixins.pug
+b.image
    picture
        source(
            :data-srcset="`${path}.webp`"
            type="image/webp"
        )
        source(
            :data-srcset="fallbackSrc"
            :type="`image/${fallbackExt}`"
        )
        img.lazyload(
            :key="'image'"
            :data-src="fallbackSrc"
            :data-lowsrc="blur"
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
        blur: {
            type: String,
            required: false,
            default: '',
        },
    },
    computed: {
        fallbackSrc() {
            return `${this.path}.${this.fallbackExt}`;
        },
    },
};
</script>
