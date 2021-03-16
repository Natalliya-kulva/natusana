<template lang="pug">
include ../../tools/mixins.pug
section.promo
    .promo-content
        .promo-left
            img.promo-img(src='~assets/images/index-slider/slide1-promo.jpg' :alt='`${seo.h1} 2`' :title='`${seo.h1} 2`')
        .promo-right
            p.promo-title
                | {{$t('index.promoTitle')}}
            p.promo-subtitle(v-html="$t('index.promoSubtitle')")
</template>

<script>
export default {
    name: "Promo",
    data: () => ({
        seo: {
            h1:'ololo',
        }
    }),
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
}
</script>

