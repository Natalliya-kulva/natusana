<template lang="pug">
    include ../../tools/mixins.pug
    section.from-ger
        .from-ger-content
            .from-ger-left
                p.from-ger-title(v-html="$t('index.fromGerTitle')")
                p.from-ger-subtitle(v-html="$t('index.fromGerSubtitle')")
                nuxt-link.from-ger-link(:to="localePath({ name: 'about' })")
                    | {{$t('elements.moreButton')}}
                    svg.link-more-arrow(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 41 13')
                        defs
                        path.link-more-arrow-part(d='M40.53 7.03a.75.75 0 000-1.06l-4.773-4.773a.75.75 0 00-1.06 1.06L38.939 6.5l-4.242 4.243a.75.75 0 001.06 1.06l4.773-4.772zM0 7.25h40v-1.5H0v1.5z')
                        path.link-more-arrow-part(d='M30.53 7.03a.75.75 0 000-1.06l-4.773-4.773a.75.75 0 00-1.06 1.06L28.939 6.5l-4.242 4.243a.75.75 0 001.06 1.06L30.53 7.03zM0 7.25h30v-1.5H0v1.5z')
            .from-ger-right
                img.from-ger-img(src='~assets/images/index-slider/slide1-made-img.png' :alt='`${seo.h1} 3`' :title='`${seo.h1} 3`')
                img.from-ger-flag(src='~assets/images/index-slider/slide1-made-flag.png' :alt='`${seo.h1} 4`' :title='`${seo.h1} 4`')
</template>

<script>
export default {
    name: "Made",
    data: () => ({
        seo: {
            h1: 'ololo',
        }
    }),
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
}
</script>
