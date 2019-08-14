<template>
    <div class="card-body">

        <div class="card-description row" >
            <router-link :to="{name: 'indexCourse'}" class="col">
                <i class="mdi mdi-keyboard-backspace" ></i>

            </router-link>

            <div class="col">Create new course</div>
        </div>


            <div class="form-group">
                <label>Course title</label>
                <input type="text" class="form-control form-control-lg" placeholder="Title" aria-label="Title..." v-model="course.title">
            </div>
            <div class="form-group">
                <label>Course description</label>
                <input type="text" class="form-control" placeholder="Description..." aria-label="Description" v-model="course.description">
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
                course: {
                    title: '',
                    description: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCourse = app.course;
                axios.post('/api/v1/courses', newCourse)
                    .then(function (resp) {

                        app.$router.push({name:'indexCourse'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your course");
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
