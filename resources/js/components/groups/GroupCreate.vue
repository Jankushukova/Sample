<template>
    <div class="card-body">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexGroup'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create new group</div>
        </div>


        <div class="form-group">
            <label>Group name</label>
            <input type="text" class="form-control form-control-lg"  aria-label="Title..."
                   v-model="group.name">
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
                group: {
                    name: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newGroup = app.group;
                axios.post('/api/v1/groups', newGroup)
                    .then(function (resp) {

                        app.$router.push({name: 'indexGroup'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        bootbox.alert("Could not create your group");

                    });
            }
        }
    }
</script>
