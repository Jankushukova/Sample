<template>
    <div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Theme</span>
            </div>
            <input v-model="messages.theme" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Message</span>
            </div>
            <textarea v-model="messages.message" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button class="btn btn-outline-secondary" v-on:click="saveForm">Save</button>
    </div>
</template>

<script>
    export default {
        name: "Create",
        data: function () {
            return {
                messages: {
                    theme: '',
                    answer:'',
                    message: '',
                    client_id:'',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newMessage = app.messages;
                axios.get('/api/v1/users/current').then(function (resp) {
                    newMessage.client_id = resp.data.id;
                    axios.post('/api/v1/requests', newMessage)
                        .then(function (resp) {
                            app.$router.push({name: 'requests'});
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not create your request");

                        });                }).catch(function () {
                    alert("did not found user");
                });


            }
        }
    }
</script>

<style scoped>

</style>
