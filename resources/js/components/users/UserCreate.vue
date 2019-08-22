<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexUser'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create new user</div>
        </div>


        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control form-control-lg"
                   v-model="user.first_name">
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control form-control-lg"
                   v-model="user.last_name">
        </div>
        <div class="form-group">
            <label>Phone number</label>
            <input type="text" class="form-control form-control-lg"
                   v-model="user.phone_number">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-lg" required
                   v-model="user.email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control form-control-lg"
                   v-model="pass">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control form-control-lg"
                   v-model="password_confirmation">
        </div>

        <div >
            <input type="radio" id="teach" value="2" v-model="user.role_id">
            <label for="teach">Teacher</label>
            <input type="radio" id="stud" value="3" v-model="user.role_id">
            <label for="stud">Student</label>

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
        data: function () {
            return {
                user: {
                    first_name:'',
                    last_name:'',
                    phone_number:'',
                    email:'',
                    password:'',
                    role_id:'',
                    remember_token: '',

                },
                pass:'',
                password_confirmation:'',

            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser=null;
                if(this.pass===this.password_confirmation){
                    app.user.password = app.pass;
                    newUser = app.user;
                    alert(newUser);
                }

                axios.post('/api/v1/users', newUser)
                    .then(function (resp) {

                        app.$router.push({name:'indexUser'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not create your user");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
