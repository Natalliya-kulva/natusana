<template lang="pug">
include ../tools/mixins.pug
+b.MAIN.main
    +e.container.container
        +e.H1.title.title--h1 Bemto test
</template>

<script>
import axios from 'axios';
export default {
    mounted() {
        axios
            .get('https://surfbrothers.perfectgym.ru/Api/Products/Products')
            .then((res) => {
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>
