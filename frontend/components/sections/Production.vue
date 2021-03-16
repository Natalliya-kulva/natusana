<template lang="pug">
include ../../tools/mixins.pug
section.production
    .production-content
        .production-left
            img.production-img.desktop-1(src='~assets/images/about-page/production.jpg' :alt='`${seo.h1} 9`' :title='`${seo.h1} 9`')
            img.production-img.desktop-2(src='~assets/images/about-page/production-desktop2.jpg' :alt='`${seo.h1} 10`' :title='`${seo.h1} 10`')
            img.production-img.tablet(src='~assets/images/about-page/production-tablet.jpg' :alt='`${seo.h1} 11`' :title='`${seo.h1} 11`')
        .production-right
            img.production-icon(src='~assets/images/about-page/production-icon.png' :alt='`${seo.h1} 12`' :title='`${seo.h1} 12`')
            p.production-text(v-html="$t('about.productionText')")

</template>

<script>
export default {
    name: "Production",
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
    data: () => ({
        top: 0,
        seo: {
            h1:'ololo',
        }
    }),
}
</script>
