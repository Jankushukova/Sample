<template>
    <div class="card-body">

        <div class="card-description row" >
            <router-link :to="{name: 'indexCourse'}" >
                <i class="mdi mdi-keyboard-backspace" ></i>
            </router-link>
            <div class="col">Edit course</div>
        </div>

            <div class="form-group">
                <label>Course title</label>
                <input type="text" class="form-control form-control-lg" placeholder="Title"  v-model="course.title">
            </div>
            <div class="form-group">
                <label>Course description</label>
                <input type="text" class="form-control" placeholder="Description..." v-model="course.description">
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
            app.courseId = id;
            axios.get('/api/v1/courses/' + id)
                .then(function (resp) {
                    app.company = resp.data;
                })
                .catch(function () {
                    alert("Could not load your course")
                });
        },
        data: function () {
            return {
                courseId: null,
                course:{
                    title:'',
                    description:'',
                }
            }
        },




        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCourse = app.course;
                axios.patch('/api/v1/courses/' + app.courseId, newCourse )
                    .then(function (resp) {
                        app.$router.push({name: 'indexCourse'});

                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not edit your course");
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
