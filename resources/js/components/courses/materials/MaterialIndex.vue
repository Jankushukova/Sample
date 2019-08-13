<template>
    <div class="card-body">
        <div class="card-description row">
            <router-link :to="{name: 'createMaterial', params: {id: lessonId}}" >
                <i class="mdi mdi-plus-circle-outline col" ></i>
            </router-link>

            <div class="col">Materials list</div>
        </div>
        <div class="table-responsive" >
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Material type</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="material, index in materials" >

                    <td class="py-1">
                        {{material.material_order}}
                    </td>

                    <router-link :to="{name: 'seeMaterial', params: {id: material.id}}" >
                        <td >{{ material.title }}</td>
                    </router-link>

                    <td>{{ material.content }}</td>
                    <td>{{ material.material_type_id }}</td>

                    <td >
                        <router-link :to="{name: 'editMaterial', params: {id: material.id}}" >
                            <i class="mdi mdi-border-color"></i>

                        </router-link>
                    </td>
                    <td>
                        <a href="#">
                            <i class="mdi mdi-delete" v-on:click="deleteEntry(material.id, index)"></i>
                        </a>
                    </td>

                </tr>

                </tbody>
            </table>
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
                    alert("Could not load material");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/materials/' + id)
                        .then(function (resp) {
                            app.materials.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete material");
                        });
                }
            },

        }
    }
</script>

<style scoped>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
    }
    .table {
        margin-bottom: 0;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    table {
        border-collapse: collapse;
    }

    *, *::before, *::after {
        box-sizing: border-box;
    }
    table {
        display: table;
        border-collapse: separate;
        border-spacing: 2px;
        border-color: grey;
    }
    i {
        display: inline-block;
        font-size: 20px;
        width: 40px;
        text-align: left;
        color: #4d83ff;
        cursor: pointer;
    }
    .card-description {
        margin-bottom: .875rem;
        font-weight: 400;
        color: #76838f;
    }
</style>
