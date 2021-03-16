<template lang="pug">
include ../../tools/mixins.pug
section.health
    .health-content(:class="{'de': currentLocale == 'de'}")
        h3.health-title(v-html="$t('about.bannerTitle')")
        p.health-text(v-html="$t('about.bannerText')")

</template>

<script>
export default {
    name: "Health",
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
}
</script>
