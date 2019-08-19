<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexMaterial'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create new material</div>
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
        data: function () {
            return {
                material: {
                    title:'',
                    content:'',
                    lesson_id:null,
                    material_order:null,
                    material_type_id:null,
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
                app.material.lesson_id = app.$route.params.id;

                var newLesson = app.material;
                axios.post('/api/v1/materials', newLesson)
                    .then(function (resp) {

                        app.$router.push({name:'indexMaterial'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not create your material");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
