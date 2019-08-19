<template>
    <div class="card-body" >
            <div class="card-description row">
                <router-link tag="button" :to="{name: 'createUser'}" type="button"
                             class="btn btn-outline-secondary btn-rounded btn-icon">
                    <i class="mdi mdi-plus"></i>
                </router-link>

                <div class="btn-group ml-auto" role="group" aria-label="Basic example">
                    <button v-on:click="determineRole(2)" type="button" class="btn btn-outline-secondary" >Teacher</button>
                    <button v-on:click="determineRole(3)" type="button" class="btn btn-outline-secondary">Student</button>
                </div>
            </div>

            <div class="table-responsive" >
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>First name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user, index in users">
                        <td class="py-1">
                            <button class="btn btn-rounded btn-icon bg-bitlab text-light">
                                <i  :class="nameofclass"></i>
                            </button>




                        </td>
                        <td>
                           {{user.first_name}} {{user.last_name}}
                        </td>
                        <td>
                            {{user.email}}

                        </td>
                        <td>
                            {{user.phone_number}}
                        </td>
                        <td>
                            <router-link tag="button" class="btn btn-icon" :to="{name: 'editUser', params: {id: user.id}}">
                                <i class="mdi mdi-border-color"></i>
                            </router-link>

                            <button class="btn btn-icon">
                                <i class="mdi mdi-delete" v-on:click="deleteEntry(user.id, index)"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>
</template>

<script>
    export default {
        name: "indexUser",
        data: function () {
            return {
                id: null,
                role:2,
                users:[],
                allusers:[],
                nameofclass:"",
            }
        },
        mounted() {
            let app = this;
            let id = app.id;
            axios.get('/api/v1/users')
                .then(function (resp) {
                    app.allusers = resp.data;
                    app.users=(resp.data).filter(function(current){
                        return current.role_id===app.role;
                    });
                    app.nameofclass="fas fa-chalkboard-teacher";

                })
                .catch(function (resp) {
                    console.log(resp);
                    bootbox.alert("Could not load user");
                });
        },
        methods: {
            deleteEntry(id, index) {
                var app = this;
                bootbox.confirm("Do you really want to delete it?", function(result){
                    if(result){
                        axios.delete('/api/v1/users/' + id)
                            .then(function (resp) {
                                app.users.splice(index, 1);
                            })
                            .catch(function (resp) {
                                bootbox.alert("Could not delete course");
                            });
                    }
                });
            },
            determineRole(num){
                var app = this;
                app.role = num;
                if(num===2)this.nameofclass="fas fa-chalkboard-teacher";
                else if(num==3)this.nameofclass="fas fa-user-graduate";
                app.users=(app.allusers).filter(function(current){
                    return current.role_id===num;
                });


            }


        }
    }
</script>

<style scoped>
    i {
        size:300px;
    }
</style>
