<template>
    <div class="card-body">
                <div class="card-description row">
                    <router-link :to="{name: 'createCourse'}" >
                        <i class="mdi mdi-plus-circle-outline col" ></i>
                    </router-link>

                    <div class="col">Courses list</div>
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
                    <tr v-for="course, index in courses" >

                        <td class="py-1">
                                {{index}}
                        </td>

                        <router-link :to="{name: 'indexLesson', params: {id: course.id}}" >
                        <td >{{ course.title }}</td>
                        </router-link>

                            <td>{{ course.description }}</td>

                            <td >
                                <router-link :to="{name: 'editCourse', params: {id: course.id}}" >
                                    <i class="mdi mdi-border-color"></i>

                                </router-link>
                            </td>
                            <td>
                                <a href="#">
                                    <i class="mdi mdi-delete" v-on:click="deleteEntry(course.id, index)"></i>
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
        name: "course-view",
        data: function () {
            return {
                id:null,
                courses: [],
                edit:false,
            }
        },
        mounted() {
            let app = this;
            let id = app.id;
            axios.get('/api/v1/courses')
                .then(function (resp) {
                    app.courses = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load course");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/courses/' + id)
                        .then(function (resp) {
                            app.courses.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete course");
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
