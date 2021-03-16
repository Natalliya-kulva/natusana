<template lang="pug">
    include ../../tools/mixins.pug
    section.award
        .award-content
            p.award-text(v-html="$t('index.awardText')")
</template>

<script>
export default {
    name: "Award",
    computed: {
        currentLocale: function () {
            return this.$i18n.locale;
        },
    },
}
</script>
