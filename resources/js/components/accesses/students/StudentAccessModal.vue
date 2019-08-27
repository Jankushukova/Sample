<template>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="accessModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{course.title}}
                        доступы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal()">Закрыть</button>
                    <button type="button" class="btn btn-primary" v-on:click="saveAll()">Сохранить изменения</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StudentAccessModal",
        data: function () {
            return {
                course: {}
            }
        },
        created: function () {
            this.$parent.$on('sendCourse', this.showModal);
        },
        methods: {
            showModal(course) {
                this.course = course;
                let app = this;
                $('#accessModal').modal('show');


            },
            closeModal() {
                this.course = {};
                $('#accessModal').modal('hide');
            },
            saveAll() {
                toastr.info('SAVED');
            }
        }
    }
</script>

<style scoped>

</style>