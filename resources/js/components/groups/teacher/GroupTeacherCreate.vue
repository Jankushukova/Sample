<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexGroupTeachers',params:{group_id:group_teacher.group_id}}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>


        </div>
        <div class="form-group">
            <div class="col">
                <label>Select teacher:</label>
                <select v-model="selectedTeacher">
                    <option  v-for="teacher in teachers" :value="teacher.id">{{teacher.first_name}} {{teacher.last_name}}</option>
                </select>
            </div>
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
            var app = this;
            app.group_teacher.group_id = app.$route.params.group_id;
            axios.get('/api/v1/users/teachers')
                .then(function (resp) {
                    app.teachers = resp.data;
                })
                .catch(function () {
                    bootbox.alert("Could not load teachers");

                });
        },
        data: function () {
            return {
                group_teacher: {
                    teacher_id:null,
                    group_id:null,
                },
                teachers:[],
                selectedTeacher:null,
            }
        },
        methods: {
            saveForm() {
                var app = this;

                bootbox.confirm("Do you really want to add this teacher to group?", function(result){
                    if(result){

                        event.preventDefault();
                        app.group_teacher.teacher_id = app.selectedTeacher;

                        var newGroupTeacher = app.group_teacher;
                        axios.post('/api/v1/groupsTeachers', newGroupTeacher)
                            .then(function (resp) {

                                app.$router.push({name: 'indexGroupTeachers', params: {group_id: app.group_teacher.group_id}});
                            })
                            .catch(function (resp) {
                                console.log(resp);
                                bootbox.alert("Could not add teacher to this group");

                            });
                    }
                });

            }
        }
    }
</script>

<style scoped>

</style>
