<template lang="pug">
    include ../../tools/mixins.pug
    section.banner
        .banner-content(:class="{'de': currentLocale === 'de'}")
            p.banner-text(v-html="$t('index.banner.first')")
            p.banner-text(v-html="$t('index.banner.second')")
            p.banner-text(v-html="$t('index.banner.third')")
</template>

<script>
export default {
    name: "Banner",
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
}
</script>
