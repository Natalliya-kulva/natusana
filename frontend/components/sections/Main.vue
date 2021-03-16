<template lang="pug">
    include ../../tools/mixins.pug
    section.main.index(
        ref="mainIndex"
    )
        Header(
            :activeColor="activeColor"
        )
        .top(:style="{'background': `linear-gradient(180deg, ${activeColor.gradientA} 0%, ${activeColor.gradientB} 100%), ${activeColor.background}`}")
            .container
                .carousel
                    template(v-for='(product, key) in productsArray')
                        transition(:key='key' name='fade')
                            picture.slide-bg(
                                v-if='key == activeSlide'
                            )
                                source(type='image/webp' :srcset='appUrlFake + product.data.main_slider.bg.url.webp')
                                img(:src='appUrlFake + product.data.main_slider.bg.url.main' :alt='`${seo.h1} 1`' :title='`${seo.h1} 1`')
                    .swiper-container
                        swiper.swiper-wrapper(
                            :options='mainSliderOption'
                            @slideChange="slideChange"
                            ref='mainSlider'
                        )
                            swiper-slide.swiper-slide.slide.first(
                                v-for='(item, index) of productsArray'
                                :key='index'

                            )
                                .carousel-wrap
                                    p.slide-title {{item.data.main_slider.description}}
                                    .slide-item
                                        picture.slide-img
                                            source(type='image/webp' :srcset='appUrlFake + item.data.main_slider.toothpaste.url.webp')
                                            img(
                                                :src='appUrlFake + item.data.main_slider.toothpaste.url.main'
                                                :alt='item.data.main_slider.toothpaste_title'
                                                :title='item.data.main_slider.toothpaste_title'
                                            )
                                    // <img class="slide-bg" :src="item.data.main_slider.bg.url">
                                    nuxt-link.slide-link(
                                        :to="localePath({ name: 'product', params: { slug: item.slug } })"
                                        :style="{'color': item.data.main_slider.text_color}"
                                    )
                                        | {{$t('elements.moreButton')}}
                                        svg.link-more-arrow(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 41 13')
                                            defs
                                            path(:fill='item.data.main_slider.text_color' d='M40.53 7.03a.75.75 0 000-1.06l-4.773-4.773a.75.75 0 00-1.06 1.06L38.939 6.5l-4.242 4.243a.75.75 0 001.06 1.06l4.773-4.772zM0 7.25h40v-1.5H0v1.5z')
                                            path(:fill='item.data.main_slider.text_color' d='M30.53 7.03a.75.75 0 000-1.06l-4.773-4.773a.75.75 0 00-1.06 1.06L28.939 6.5l-4.242 4.243a.75.75 0 001.06 1.06L30.53 7.03zM0 7.25h30v-1.5H0v1.5z')
                    .carousel-icon
                        svg.carousel-line(width='2469' height='212' viewBox='0 0 2469 212' fill='none' xmlns='http://www.w3.org/2000/svg')
                            path(d='M2.91164 21.5993L47.7808 49.6047C92.65 77.61 184.443 133.645 274.714 145.024C367.04 156.428 457.844 123.175 550.293 124.279C640.687 125.358 732.726 160.794 822.915 179.039C913.104 197.285 1005.55 198.389 1096.19 178.869C1188.89 159.373 1279.77 119.254 1372.43 103.192C1463.03 87.105 1555.39 95.0753 1645.75 99.5878C1736.1 104.1 1828.55 105.204 1919.07 95.9838C2011.64 86.788 2102.28 67.2681 2194.89 54.639C2285.45 41.9855 2377.98 36.2229 2423.22 33.3294L2468.46 30.4358' stroke='#D2D2C8')
                .slider-pagination
                    button.slider-arrows.left
                        svg.arrow(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 37')
                            defs
                            path.arrow-part(:stroke='activeColor.additional' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 36L1 18.5 13 1')
                    button.slider-arrows.right
                        svg.arrow(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 37')
                            defs
                            path.arrow-part(:stroke='activeColor.additional' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 36L1 18.5 13 1')
                swiper.swiper-wrapper.item-icon-container(
                    :options='slidesLeafsOption'
                    ref='slidesLeafs'
                )
                    swiper-slide.item-icon-wrapper.swiper-slide(
                        v-for='(item, index) of productsArray'
                        :key='index'
                    )
                        svg.item-icon(xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 74 74')
                            defs
                            path.item-icon-body(:fill='item.data.main_slider.main_color' d='M0 0h37c20.434 0 37 16.566 37 37S57.434 74 37 74 0 57.434 0 37V0z')
                            image.item-icon-main(v-bind="{ 'xlink:href': appUrlFake + item.data.main_slider.icon.url.main }" x='25%' y='25%' height='50%' width='50%')
                .slider-buttons
                    swiper.slide-change-container(
                        :options='slidesBulletsOption'
                        ref='slidesBullets'
                    )
                        swiper-slide.swiper-slide(
                            v-for='(item, i) of productsArray'
                            :key='i'
                        )
                            a.slide-change(
                                @click='setslidesBullets(i)'
                                :class="{'active' : activeSlide == i}"
                            )
                                span.slide-change-bullet(:style="{'background': activeColor.additional}")
                                p.slide-change-title(:style="{'color': activeSlide == i ? activeColor.text_color : '#6B605E'}") {{item.product_name}}
                                p.slide-change-subtitle(:style="{'color': activeSlide == i ? activeColor.text_color : '#6B605E'}") {{item.data.banner.description}}

</template>

<script>

import Header from '../blocks/Header';

export default {
    name: "Main",
    components: {
        Header,
    },
    data: function () {
        return {
            appUrl: process.env.appUrl,
            isSliderLoaded: false,
            // activeColor: null,
            mainSliderOption: {
                speed: 600,
                slidesPerView: 1,
                navigation: {
                    nextEl: '.slider-pagination .slider-arrows.right',
                    prevEl: '.slider-pagination .slider-arrows.left',
                },
            },
            slidesLeafsOption: {
                // init: false,
                speed: 600,
                slidesPerView: 3,
                centeredSlides: true,
                setWrapperSize: true,
                breakpoints: {
                    767: {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        speed: 600
                    },
                    992: {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        speed: 600
                    }
                },
                on: {
                    resize: function () {
                        this.updateSize();
                    }
                },
            },
            slidesBulletsOption: {
                // init: false,
                speed: 600,
                slidesPerView: 2,
                allowTouchMove: false,
            },
            activeSlide: 0,
            seo: {
                h1: 'ololo',
            }
        }
    },
    computed: {
        appUrlFake: function () {
            return 'https://natusana.lamp1.dev.prestoheads.com/'
        },
        currentLocale: function () {
            return this.$i18n.locale;
        },
        productsArray: function () {
            // console.log(this.$store.getters['products/productsArray']);
            return this.$store.getters['products/productsArray'];
        },
        slidesBullets() {
            return this.$refs.slidesBullets.$swiper
        },
        slidesLeafs() {
            return this.$refs.slidesLeafs.$swiper
        },
        mainSlider() {
            return this.$refs.mainSlider.$swiper
        },
        activeColor() {
            return {
                text_color: this.productsArray[this.activeSlide].data.main_slider.text_color,
                gradientA: this.productsArray[this.activeSlide].data.main_slider.gradient.gradient1,
                gradientB: this.productsArray[this.activeSlide].data.main_slider.gradient.gradient2,
                background: this.productsArray[this.activeSlide].data.main_slider.gradient.gradient3,
                text: this.productsArray[this.activeSlide].data.main_slider.text_color,
                additional: this.productsArray[this.activeSlide].data.main_slider.main_color,
            }
        }
    },
    mounted() {
        // console.log(this);
        this.$nextTick(function () {
            this.onResize();
        })
        window.addEventListener('resize', this.onResize)
    },
    methods: {
        onResize() {
            this.scaleMainSlider();
        },
        slideChange(i) {
            this.slidesLeafs.slideTo(i ? i : this.mainSlider.activeIndex);
            this.slidesBullets.slideTo(i ? i : this.mainSlider.activeIndex);
            this.activeSlide = i ? i : this.mainSlider.activeIndex;
        },
        setslidesBullets: function (index) {
            console.log('sss');
            console.log(index);
            this.mainSlider.slideTo(index);
            // this.slideChange

        },
        scaleMainSlider: function() {
            console.log(this);
            let height = this.$vssHeight > 600 ? this.$vssHeight : 600;
            let offset = {
                height: window.matchMedia('(max-width: 1024px)').matches ? 768 : 900,
                fontSize: window.matchMedia('(max-width: 1024px)').matches ? 48 : 56.25
            };

            if (height < offset.height) {
                this.$refs.mainIndex.style.fontSize = `${height / offset.fontSize}px`;
            } else {
                this.$refs.mainIndex.style.fontSize = `16px`;
            }
        }
    }

}
</script>

