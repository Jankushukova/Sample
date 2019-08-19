<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexMaterial'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col">Edit material</div>
        </div>

        <div class="form-group">
            <label>Material title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..."
                   v-model="material.title">
        </div>
        <div class="form-group">
            <label>Material content</label>
            <textarea style="height: 200px" class="form-control" placeholder="Content..." aria-label="Description"
                      v-model="material.content"></textarea>
        </div>
        <div class="form-group">
            <label>Material order</label>
            <input type="text" class="form-control form-control-lg" placeholder="Order" aria-label="Title..."
                   v-model="material.material_order">
        </div>
        <div >
            <input type="radio" id="lec" value="Lection" v-model="typeofmaterial">
            <label for="lec">Lection</label>
            <input type="radio" id="prac" value="Practice" v-model="typeofmaterial">
            <label for="prac">Practice</label>
            <input type="radio" id="theo" value="Theory" v-model="typeofmaterial">
            <label for="theo">Theory</label>
        </div>
        <div class="form-group text-right">
            <button  v-on:click="saveForm" class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-check"></i>
            </button>
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
                },
                typeofmaterial:"",

            }
        },




        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                switch (this.typeofmaterial) {
                    case "Lection": app.material.material_type_id=1;break;
                    case "Practice": app.material.material_type_id=2;break;
                    case "Theory": app.material.material_type_id=3;break;

                }
                var newMaterial = app.material;
                axios.patch('/api/v1/materials/' + app.materialId, newMaterial)
                    .then(function (resp) {
                        app.$router.push({name: 'indexMaterial'});

                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not edit your material");

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
