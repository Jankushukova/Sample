<template>
    <div class="card-body ">

        <div class="card-description row">

            <router-link tag="button" :to="{name: 'indexLesson'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon mr-2">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <router-link tag="button" :to="{name: 'createMaterial', params: {id: lessonId}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-plus"></i>
            </router-link>

        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="material, index in materials" v-if="material.lesson_id==lessonId">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">{{material.title}}</h4>
                        <p class="card-description">
                            <i v-if="material.material_type_id==1">Lection</i>
                            <i v-else-if="material.material_type_id==2">Practice</i>
                            <i v-else-if="material.material_type_id==3">Theory</i>

                        </p>

                        <p class="text-right">
                            <router-link tag="button" :to="{name: 'indexMaterial', params: {id: material.id}}" type="button"
                                         class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                <i class="fas fa-eye"></i>
                            </router-link>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <span  class="mdi mdi-pound " >
                                    {{material.material_order}}
                                </span>

                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <router-link tag="button" class="btn btn-icon" :to="{name: 'editMaterial', params: {id: material.id}}">
                                        <i class="mdi mdi-border-color "></i>
                                    </router-link>

                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete " v-on:click="deleteEntry(material.id, index)"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    export default {
        data: function () {
            return {
                materials: [],
                lessonId:null,
            }
        },
        mounted() {
            let app = this;
            app.lessonId = app.$route.params.id;
            axios.get('/api/v1/materials')
                .then(function (resp) {
                    app.materials = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load material");

                });
        },
        methods: {
            deleteEntry(id, index) {
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        var app = this;
                        axios.delete('/api/v1/materials/' + id)
                            .then(function (resp) {
                                app.materials.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete material");

                            });
                    }

                });
            },

        }
    }
</script>

<style scoped>

</style>
