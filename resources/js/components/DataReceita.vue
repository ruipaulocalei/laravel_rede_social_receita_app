<template>
    <span v-text="formatarData"></span>
</template>

<script>
    export default {
        props: ['data'],
        name: "DataReceita",
        mounted() {
            console.log('Valor do prop', this.data)
        },
        computed: {
            formatarData() {
                return moment(this.data).locale('pt').format('DD [de] MMMM [de] YYYY')
            }
        }
    }
</script>

<style scoped>

</style>
