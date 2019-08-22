<template>
    <div class="card-body ">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'createGroup'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon ">
                <i class="mdi mdi-plus"></i>
            </router-link>

        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card" v-for="group, index in groups">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{group.name}}</h4>
                        <div class="card-description">
                                <router-link tag="button" :to="{name: 'indexGroupStudents', params: {group_id: group.id}}" type="button"
                                             class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                        <i class="fas fa-users-class"></i>

                                </router-link>

                                <router-link tag="button" :to="{name: 'indexGroupTeachers', params: {group_id: group.id}}" type="button"
                                             class="btn  btn-outline-light btn-rounded btn-icon bg-bitlab">
                                    <i class="fas fa-chalkboard-teacher "></i>
                                </router-link>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                                <p class="text-right">
                                    <button class="btn btn-icon">
                                        <i class="mdi mdi-delete" v-on:click="deleteEntry(group.id, index)"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: "course-view",
        data: function () {
            return {
                groups: [],
            }
        },
        mounted() {
            let app = this;
            let id = app.id;
            axios.get('/api/v1/groups')
                .then(function (resp) {
                    app.groups = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load groups");

                });
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/groups/' + id)
                            .then(function (resp) {
                                app.groups.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete group");
                            });
                    }
                });
            },

        }
    }
</script>
