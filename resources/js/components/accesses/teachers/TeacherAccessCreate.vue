<template>
    <div class="card-body ">
        <div class="card-description row">
            <router-link tag="button" :to="{name: 'teacherAccessIndex'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>
            <div class="col" v-if="teacher">Create teacher access {{teacher.first_name +' ' + teacher.last_name}}</div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <select class="form-control" multiple>
                        <option v-for="course, index in courses" v-bind:value="courses.id" v-text="course.title"/>
                    </select>

                </div>
                <div class="col-6">
                    <select class="form-control" multiple>
                        <option v-for="course, index in otherCourses" v-bind:value="courses.id" v-text="course.title"/>
                    </select>
                </div>
            </div>
        </div>


    </div>
</template>

<script>

    export default {
        data: function () {
            return {
                courses: [],
                otherCourses: [],
                teacher: null,
                teacherId: null
            }
        },
        mounted: function () {
            let app = this;
            app.teacherId = app.$route.params.teacher_id;

            axios.all([
                axios.get('/api/v1/teacher/access/courses/' + app.teacherId),
                axios.get('/api/v1/teacher/access/except/courses/' + app.teacherId),
                axios.get('/api/v1/users/' + app.teacherId)
            ])
                .then(axios.spread(function (coursesResp,otherCoursesResp,  userResp) {
                    app.courses = coursesResp.data;
                    app.otherCourses = otherCoursesResp.data;
                    app.teacher = userResp.data;
                }));


        },
    }
</script>


<style scoped>

    a:hover {
        color: white;
    }

</style>
