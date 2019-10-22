<template>
<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Theme</th>
            <th scope="col">Message</th>
            <th scope="col">Answer</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="request, index in requests">
            <th scope="row">{{index+1}}</th>
            <td>{{request.theme}}</td>
            <td>{{request.message}}</td>
            <td>{{request.answer}}</td>
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
            }
        },
        mounted() {
            let app = this;
            axios.get('api/v1/requests/current')
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
