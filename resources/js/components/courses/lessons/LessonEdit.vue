<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexLesson'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col">Edit lesson</div>
        </div>

        <div class="form-group">
            <label>Lesson title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..."
                   v-model="lesson.title">
        </div>
        <div class="form-group">
            <label>Lesson description</label>
            <textarea style="height: 200px" class="form-control" placeholder="Description..." aria-label="Description"
                      v-model="lesson.description"></textarea>
        </div>

        <div class="form-group">
            <label>Lesson order</label>
            <input type="text" class="form-control form-control-lg" placeholder="Order..." aria-label="Title..."
                   v-model="lesson.lesson_order">
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
            app.lessonId = id;
            axios.get('/api/v1/lessons/' + id)
                .then(function (resp) {
                    app.company = resp.data;
                })
                .catch(function () {
                    alert("Could not load your lesson")
                });
        },
        data: function () {
            return {
                lessonId: null,
                lesson:{
                    title:'',
                    description:'',
                    lesson_order:null,
                }
            }
        },




        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newLesson = app.lesson;
                axios.patch('/api/v1/lessons/' + app.lessonId, newLesson )
                    .then(function (resp) {
                        app.$router.push({name: 'indexLesson'});

                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not edit your lesson");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
