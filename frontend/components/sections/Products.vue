<template lang="pug">
    include ../../tools/mixins.pug
    section.products
        h3.products-title(v-html="$t('about.productsTitle')")
        .products-content
            .products-left
                p.products-text(v-html="$t('about.productsText.top')")
                p.products-text(v-html="$t('about.productsText.bottom')")
                ul.products-list
                    li.products-list-item {{$t('about.productsList.first')}}
                    li.products-list-item {{$t('about.productsList.second')}}
                    // <li class="products-list-item">{{$t('about.productsList.third')}}</li>
                    li.products-list-item {{$t('about.productsList.fourth')}}
            .products-right
                img.products-logo(src='~assets/images/about-page/logo-1.png' :alt='`${seo.h1} 6`' :title='`${seo.h1} 6`')
                img.products-logo(src='~assets/images/about-page/logo-2.png' :alt='`${seo.h1} 7`' :title='`${seo.h1} 7`')
                // <img class="products-logo" src="~assets/images/about-page/logo-3.png">
                img.products-logo(src='~assets/images/about-page/logo-4.png' :alt='`${seo.h1} 8`' :title='`${seo.h1} 8`')

</template>

<script>
export default {
    name: "Products",
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
