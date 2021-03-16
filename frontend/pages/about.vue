<template lang="pug">
include ../tools/mixins.pug
main.about
    Header
    .s top
    Tale
    Origin
    Products
    Production
    Health
    Nature
    Composition
    Footer
</template>

<script>
import Tale from '../components/sections/Tale';
import Origin from '../components/sections/Origin';
import Products from '../components/sections/Products';
import Production from '../components/sections/Production';
import Health from '../components/sections/Health';
import Composition from '../components/sections/Composition';
import Nature from '../components/sections/Nature';
import Footer from '../components/Footer';
import Header from '../components/blocks/Header';

export default {
    components: {
        Tale,
        Products,
        Production,
        Nature,
        Origin,
        Footer,
        Health,
        Composition,

        // Main,
        // Banner,
        // Award,
        // Footer,
    },
    data: () => ({
        top: 0,
        seo: {
            h1:'ololo',
        }
    }),
    mounted() {
        // this.$nextTick(function () {
        //     this.onResize();
        // })
        // window.addEventListener('resize', this.onResize)
    },
    // methods: {
    //     onResize() {
    //         this.top = document.querySelectorAll('.main.index')[0].clientHeight;
    //     }
    // }
};
</script>
