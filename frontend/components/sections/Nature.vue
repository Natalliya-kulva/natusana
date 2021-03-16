<template lang="pug">
include ../../tools/mixins.pug
section.nature
    .nature-content
        .nature-left
            p.nature-text(v-html="$t('about.natureText')")
        .nature-right
            img.nature-img.desktop-1(src='~assets/images/about-page/nature.jpg' :alt='`${seo.h1} 13`' :title='`${seo.h1} 13`')
            img.nature-img.desktop-2(src='~assets/images/about-page/desktop2-nature.jpg' :alt='`${seo.h1} 14`' :title='`${seo.h1} 14`')

</template>

<script>
export default {
    name: "Nature",
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
    data: () => ({
        seo: {
            h1:'ololo',
        }
    }),
}
</script>
