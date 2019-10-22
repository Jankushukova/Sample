<template>
    <div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Message</span>
            </div>
            <input v-model="message.message" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Answer</span>
            </div>
            <textarea v-model="message.answer" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button class="btn btn-outline-secondary" v-on:click="saveForm">Save</button>

    </div>
</template>

<script>
    export default {
        name: "Answer",
        data: function () {
            return {
                message: {
                },
                messageId:'',
            }
        },
        mounted() {
            let app = this;
            app.messageId = app.$route.params.message_id;

            axios.get('api/v1/requests/' + app.messageId)
                .then(function (resp) {
                    app.message = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load requests");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newMessage = app.message;
                axios.patch('/api/v1/requests/' + app.messageId, newMessage )
                    .then(function (resp) {
                        app.$router.push({name: 'managerRequests'});

                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not answer");

                    });
            }
        }
    }
</script>

<style scoped>

</style>
