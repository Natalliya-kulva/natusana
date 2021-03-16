<template lang="pug">
include ../../tools/mixins.pug
section.origin
    svg.origin-flag(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 121 121')
        defs
        circle(cx='60.5' cy='60.5' r='60' stroke='#D2D2C8')
        mask#a(width='97' height='97' x='12' y='12' maskUnits='userSpaceOnUse')
            circle(cx='60.207' cy='60.741' r='48.207' fill='#C4C4C4')
        g(mask='url(#a)')
            path(fill='#000' d='M118.466 12.713h-117a2 2 0 00-2 2v29.895h121V14.713a2 2 0 00-2-2z')
            path(fill='#CE032C' d='M120.466 44.609h-121v31.895h121V44.609z')
            path(fill='#FEC135' d='M120.466 76.493h-121v29.895a2 2 0 002 2h117a2 2 0 002-2V76.493z')
    h3.origin-title(v-html="$t('about.originTitle')")
    .origin-content
        .origin-left
            img.origin-img.desktop(src='~assets/images/about-page/origin-img.jpg' :alt='`${seo.h1} 4`' :title='`${seo.h1} 4`')
            img.origin-img.tablet(src='~assets/images/about-page/origin-img-tablet.jpg' :alt='`${seo.h1} 5`' :title='`${seo.h1} 5`')
            p.origin-text(v-html="$t('about.originLeft')")
        .origin-right
            p.origin-text(v-html="$t('about.originRight.top')")
            p.origin-text.green(v-html="$t('about.originRight.green')")
            p.origin-text(v-html="$t('about.originRight.bottom')")

</template>

<script>
export default {
    name: "Origin",
    data: () => ({
        top: 0,
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

<style scoped>

</style>
