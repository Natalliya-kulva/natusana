<template lang="pug">
    include ../../tools/mixins.pug
    section.tale
        .tale-content
            .tale-left(v-html="$t('about.taleQuote')")
            .tale-right(v-html="$t('about.taleText')")

</template>

<script>
export default {
    name: "Tale",
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
