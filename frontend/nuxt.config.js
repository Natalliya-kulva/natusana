require('dotenv').config();

module.exports = {
    server: {
        port: process.env.NUXT_PORT || 3000,
    },
    srcDir: __dirname,
    buildDir: 'frontend/.nuxt',
    // buildModules: ['@nvuxtjs/stylelint-module'],
    modules: [
        '@nuxtjs/style-resources',
        '@nuxtjs/axios',
        '@nuxtjs/auth-next',
        [
            'nuxt-i18n',
            {
                baseUrl: process.env.APP_URL,
                seo: false,
                locales: [
                    {
                        code: 'ru',
                        iso: 'ru-RU',
                        file: 'ru.js',
                    },
                    {
                        code: 'de',
                        iso: 'de-DE',
                        file: 'de.js',
                    },
                ],
                defaultLocale: 'ru',
                langDir: 'locales/',
                lazy: true,
                vueI18n: {
                    fallbackLocale: 'ru',
                },
            },
        ],
    ],
    styleResources: {
        scss: ['./assets/sass/_settings.scss'],
    },
    generate: {
        dir: 'frontend/dist',
    },
    axios: {
        proxy: true,
    },
    router: {
        linkActiveClass: 'active',
        linkExactActiveClass: 'active',
    },
    env: {
        appUrl: process.env.APP_URL,
        apiUrl: process.env.API_URL || process.env.APP_URL + 'api/',
        appName: process.env.APP_NAME || 'Laravel Nuxt',
        appLocale: process.env.APP_LOCALE || 'en',
    },
    auth: {
        redirect: {
            login: '/auth/login',
            logout: '/auth/signed-out',
            home: '/auth/secret',
        },
        strategies: {
            laravelJWT: {
                provider: 'laravel/jwt',
                url: process.env.API_URL || process.env.APP_URL + 'api/',
                endpoints: {
                    login: { url: 'auth/login', method: 'post' },
                    refresh: { url: 'auth/refresh', method: 'post' },
                    user: { url: 'auth/user', method: 'get' },
                    logout: { url: 'auth/logout', method: 'post' },
                },
                token: {
                    property: 'access_token',
                    maxAge: 60 * 60,
                },
                refreshToken: {
                    maxAge: 20160 * 60,
                },
            },
        },
    },
    /*
     ** Headers of the page
     */
    head: {
        title: '{{ name }}',
        meta: [
            {
                charset: 'utf-8',
            },
            {
                name: 'viewport',
                content: 'width=device-width, initial-scale=1',
            },
            {
                hid: 'description',
                name: 'description',
                content: '{{escape description }}',
            },
        ],
        link: [
            {
                rel: 'icon',
                type: 'image/x-icon',
                href: '/favicon.ico',
            },
        ],
    },
    /*
     ** Customize the progress bar color
     */
    loading: {
        color: '#3B8070',
    },
    plugins: [
        '~plugins/swiper',
        '~plugins/axios',
        { src: '~plugins/screen-size.js', ssr: false },
    ],
    css: [
        {
            src: '~assets/sass/app.scss',
            lang: 'scss',
        },
    ],
    /*
     ** Build configuration
     */
    build: {
        extractCSS: process.env.NODE_ENV === 'production',
        vendor: ['axios'],
        /*
         ** Run ESLint on save
         */
        // extend(config, { isDev, isClient }) {
        //     if (isDev && isClient) {
        //         config.module.rules.push({
        //             enforce: 'pre',
        //             test: /\.(js|vue)$/,
        //             loader: 'eslint-loader',
        //             exclude: /(node_modules)/,
        //         });
        //     }
        // },
    },
};
