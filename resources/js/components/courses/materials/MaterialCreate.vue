<template>
    <div class="card-body">


        <div class="card-description row" >
            <router-link :to="{name: 'indexMaterial'}" class="col">
                <i class="mdi mdi-keyboard-backspace" ></i>

            </router-link>

            <div class="col">Create new material</div>
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
            <button class="btn btn-success" v-on:click="saveForm">Create</button>
        </div>


    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                material: {
                    title:'',
                    content:'',
                    lesson_id:null,
                    material_order:null,
                    material_type_id:null,
                },

            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                app.material.lesson_id = app.$route.params.id;
                var newLesson = app.material;
                axios.post('/api/v1/materials', newLesson)
                    .then(function (resp) {

                        app.$router.push({name:'indexMaterial'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your material");
                    });
            }
        }
    }
</script>

<style scoped>
    .form-group {
        margin-bottom: 1.5rem;
    }
    div {
        display: block;
    }
    .card-description {
        margin-bottom: .875rem;
        font-weight: 400;
        color: #76838f;
    }
    i {
        display: inline-block;
        font-size: 20px;
        width: 40px;
        text-align: left;
        color: #4d83ff;
        cursor: pointer;
    }
</style>
