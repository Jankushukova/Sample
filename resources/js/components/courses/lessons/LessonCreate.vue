<template>
    <div class="card-body">


        <div class="card-description row" >
            <router-link :to="{name: 'indexLesson'}" class="col">
                <i class="mdi mdi-keyboard-backspace" ></i>

            </router-link>

            <div class="col">Create new lesson</div>
        </div>


        <div class="form-group">
            <label>Lesson title</label>
            <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..." v-model="lesson.title">
        </div>
        <div class="form-group">
            <label>Lesson description</label>
            <input type="text" class="form-control" placeholder="Description..." aria-label="Description" v-model="lesson.description">
        </div>
        <div class="form-group">
            <label>Lesson order</label>
            <input type="text" class="form-control" placeholder="Order..." aria-label="Description" v-model="lesson.lesson_order">
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
                lesson: {
                    title: '',
                    description: '',
                    lesson_order:'',
                    course_id:null,
                },

            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                app.lesson.course_id = app.$route.params.id;
                var newLesson = app.lesson;
                axios.post('/api/v1/lessons', newLesson)
                    .then(function (resp) {

                        app.$router.push({name:'indexLesson'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your lesson");
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
