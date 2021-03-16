<template lang="pug">
include ../tools/mixins.pug
main.home
    .home-bg(:style="{top: `${top}px`}")
    Main
    Composition
    Promo
    Made
    Award
    Banner
    Footer
</template>

<script>
import Composition from '../components/sections/Composition';
import Promo from '../components/sections/Promo';
import Main from '../components/sections/Main';
import Award from '../components/sections/Award';
import Made from '../components/sections/Made';
import Banner from '../components/sections/Banner';
import Footer from '../components/Footer';

export default {
    components: {
        Composition,
        Promo,
        Made,
        Main,
        Banner,
        Award,
        Footer,
    },
    data: () => ({
        top: 0,
        seo: {
            h1:'ololo',
        }
    }),
    mounted() {
        this.$nextTick(function () {
            this.onResize();
        })
        window.addEventListener('resize', this.onResize)
    },
    methods: {
        onResize() {
            this.top = document.querySelectorAll('.main.index')[0].clientHeight;
        }
    }
};
</script>
