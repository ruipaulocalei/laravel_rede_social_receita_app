<template>
    <input type="submit" class="btn btn-danger mr-1" value="Eliminar" @click="eliminarReceita"/>
</template>

<script>
    export default {
        name: "EliminarReceita",
        props: ['receitaId'],
        methods: {
            eliminarReceita() {
                this.$swal({
                    title: 'Desejas eliminar esta receita?',
                    text: 'Quando eliminares não se poderá recuperar',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#D33',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não'
                }).then(result => {
                    if (result.value) {
                        const params = {
                            id: this.receitaId
                        }
                        axios.post(`/receita/${this.receitaId}`, {params, _method: 'delete'})
                            .then(response => console.log(response))
                            .catch(error => console.log(error));
                        this.$swal({
                            title: 'Receita eliminada',
                            text: 'Eliminou-se com sucesso',
                            icon: 'success'
                        })

                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
