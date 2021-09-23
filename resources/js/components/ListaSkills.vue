<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li
                class="border-2  border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                v-for="(skill, i) in this.skills"
                v-bind:key="i"
                v-on:click="activar($event)"
            >{{skill}}
            </li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default {
        props: ['skills','oldskills'],
        data: function() {
            return {
                habilidades: new Set()
            }
        },
        created: function() {
            if(this.oldskills){
                const skillsArray = this.oldskills.split(',');
                skillsArray.foreach( skill => this.habilidades.add(skill) );
            }
        },
        mounted: function() {
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {
            activar(e){

                if(e.target.classList.contains('bg-gray-400')){
                    //Si el skill esta en activo
                    e.target.classList.remove('bg-gray-400');

                    //Eliminar del set de habilidades
                    this.habilidades.delete(e.target.textContent);
                }
                else{
                    //No esta activo, añadirlo
                     e.target.classList.add('bg-gray-400');
                    //Agregar habilidades al set de habilidades
                    this.habilidades.add(e.target.textContent);
                }

                //Convertimos el set del input a un string
                const stringHabilidades = [...this.habilidades];
                //agregar las habilidades al input hidden #skills
               document.querySelector('#skills').value = stringHabilidades;
            },
        verificarClaseActiva(skill){
            return this.habilidades.has(skill) ? 'bg-gray-400' : '';
        }
        }
    }
</script>
