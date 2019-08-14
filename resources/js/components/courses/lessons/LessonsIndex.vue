<template>
    <div class="card-body">
        <div class="card-description row">
            <router-link :to="{name: 'indexCourse'}"  class="col">
                <i class="mdi mdi-keyboard-backspace" ></i>
            </router-link>
            <router-link :to="{name: 'createLesson', params: {id: courseId}}" >
                <i class="mdi mdi-plus-circle-outline col" ></i>
            </router-link>

            <div class="col">Lessons list</div>
        </div>
        <div class="table-responsive" >
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="lesson, index in lessons" >

                    <td class="py-1">
                        {{lesson.lesson_order}}
                    </td>

                    <router-link :to="{name: 'indexMaterial', params: {id: lesson.id}}" >
                        <td >{{ lesson.title }}</td>
                    </router-link>

                    <td>{{ lesson.description }}</td>

                    <td >
                        <router-link :to="{name: 'editLesson', params: {id: lesson.id}}" >
                            <i class="mdi mdi-border-color"></i>

                        </router-link>
                    </td>
                    <td>
                        <a href="#">
                            <i class="mdi mdi-delete" v-on:click="deleteEntry(lesson.id, index)"></i>
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
        name: "lesson-view",
        data: function () {
            return {
                id:null,
                lessons: [],
                edit:false,
                courseId:null,
            }
        },
        mounted() {
            let app = this;
            let id = app.id;
            app.courseId = app.$route.params.id;
            axios.get('/api/v1/lessons')
                .then(function (resp) {
                    app.lessons = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load lesson");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/lessons/' + id)
                        .then(function (resp) {
                            app.lessons.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete lesson");
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
