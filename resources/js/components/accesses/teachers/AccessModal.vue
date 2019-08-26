<template>
    <!-- Modal -->
    <div v-if="user" class="modal fade" id="accessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{user.first_name}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AccessModal",
        data: function () {
            return {
                user: null
            }
        },
        methods: {
            showModal(user) {
                this.user = user;
                $('#accessModal').modal('show');
            }
        },
        created: function () {
            this.$parent.$on('sendUser', this.showModal);
        }
    }
</script>

<style scoped>

</style>