<template>
    <button class="bg-red-500 p-2 px-5 font-bold  text-white hover:shadow-lg text-xs "
            @click="eliminarVacante"
    >Eliminar
    </button>
</template>

<script>
export default {
    props : ['vacanteId'],
    methods: {
        eliminarVacante(){
            console.log('eliminando...', this.vacanteId);

            this.$swal.fire({
                    title: 'Desea eliminar la vacante?',
                    text: "Una vez eliminada no se puede recuperar!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'NO'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        const params = {
                            id: this.vacanteId,
                            _method: 'delete'
                        }

                        //Enviar peticion a axios
                        axios.post(`/vacantes/${this.vacanteId}`, params)
                            .then(respuesta => {

                                this.Swal.fire(
                                    'Vacante Eliminada!',
                                    respuesta.data.mensaje,
                                    'success'
                                );

                                //Eliminar del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })

                    }
            });
        }
    }
}
</script>
