<template>
    <div class="card-body">

        <div class="card-description row" >
            <router-link :to="{name: 'indexMaterial'}" >
                <i class="mdi mdi-keyboard-backspace" ></i>
            </router-link>
            <div class="col">Edit material</div>
        </div>

        <div class="form-group">
            <label>Material title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..." v-model="material.title">
        </div>
        <div class="form-group">
            <label>Material content</label>
            <input type="text" class="form-control" placeholder="Content..." aria-label="Description" v-model="material.content">
        </div>
        <div class="form-group">
            <label>Material order</label>
            <input type="text" class="form-control" placeholder="Order..." aria-label="Description" v-model="material.material_order">
        </div>
        <div class="form-group">
            <label>Material type</label>
            <input type="text" class="form-control" placeholder="Type..." aria-label="Description" v-model="material.material_type_id">
        </div>
        <div class="col-xs-12 form-group">
            <button class="btn btn-success" v-on:click="saveForm">Save</button>
        </div>


    </div>

</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.materialId = id;
            axios.get('/api/v1/materials/' + id)
                .then(function (resp) {
                    app.material = resp.data;
                })
                .catch(function () {
                    alert("Could not load your lesson")
                });
        },
        data: function () {
            return {
                materialId:null,
                material:{
                    title:'',
                    content:'',
                    material_order:'',
                    material_type_id:'',
                }
            }
        },




        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newMaterial = app.material;
                axios.patch('/api/v1/materials/' + app.materialId, newMaterial)
                    .then(function (resp) {
                        app.$router.push({name: 'indexMaterial'});

                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not edit your material");
                    });
            }
        }
    }
</script>

<style scoped>
    .card-description {
        margin-bottom: .875rem;
        font-weight: 400;
        color: #76838f;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    div {
        display: block;
    }
</style>
