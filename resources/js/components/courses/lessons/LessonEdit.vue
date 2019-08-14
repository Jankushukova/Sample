<template>
    <div class="card-body">

        <div class="card-description row" >
            <router-link :to="{name: 'indexLesson'}" class="col">
                <i class="mdi mdi-keyboard-backspace"  ></i>
            </router-link>
            <div class="col">Edit lesson</div>
        </div>

        <div class="form-group">
            <label>Lesson title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title"  v-model="lesson.title">
        </div>
        <div class="form-group">
            <label>Lesson description</label>
            <input type="text" class="form-control" placeholder="Description..." v-model="lesson.description">
        </div>
        <div class="form-group">
            <label>Lesson order</label>
            <input type="text" class="form-control" placeholder="Order..." aria-label="Description" v-model="lesson.lesson_order">
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
                        alert("Could not edit your lesson");
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
