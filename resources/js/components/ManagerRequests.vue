<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Theme</th>
                <th scope="col">Message</th>
                <th scope="col">Answer</th>
                <th scope="col">Client name</th>
                <th scope="col">Data</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="request, index in requests">
                <th scope="row">
                    {{index+1}}</th>
                <td>{{request.theme}}</td>
                <td>{{request.message}}</td>
                <td>
                    <div v-if="request.answer===null">
                        <router-link class="btn btn-outline-secondary"tag="button" :to="{name: 'managerAnswer', params: {message_id: request.id}}" type="button">

                        Answer</router-link>
                    </div>
                    <div v-else>
                        {{request.answer}}

                    </div>
                </td>
                <td > {{request.client_id}}</td>
                <td>{{request.created_at}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Home",
        data: function () {
            return {
                requests: [],
                clients:''
            }
        },
        mounted() {
            let app = this;
            axios.get('api/v1/requests')
                .then(function (resp) {
                    app.requests = resp.data;


                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load requests");
                });



        },



    }
</script>

<style scoped>

</style>
