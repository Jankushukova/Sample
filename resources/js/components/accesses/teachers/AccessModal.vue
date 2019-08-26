<template>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="accessModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{user.first_name + ' ' + user.last_name}}
                        accesses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input v-model="searchStr" class="form-control" type="search" placeholder="Search"
                               aria-label="Search">
                    </form>
                    <div class="my-1 p-3 bg-white rounded shadow-sm">


                        <div class="media text-muted pt-3" v-for="(course, index) in courses">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <strong class="text-gray-dark" v-text="course.title"></strong>
                                    <a v-on:click="removeCourse(course)">Убрать</a>
                                </div>
                            </div>
                        </div>
                        <div  v-if="courses.length == 0" class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <strong class="text-danger text-center">Нет данных</strong>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeModal()">Close</button>
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
                user: {},
                courses: [],
                searchStr: ''
            }
        },
        mounted: function () {
        },
        methods: {
            showModal(user) {
                this.user = user;
                let app = this;

                axios.get('/api/v1/teacher/access/courses/' + this.user.id)
                    .then(function (coursesResp) {
                        app.courses = coursesResp.data;
                        $('#accessModal').modal('show');
                    });

            },
            closeModal() {
                this.user = {};
                this.searchStr = '';
                this.courses = [];
                $('#accessModal').modal('hide');
            },
            removeCourse(course) {
                this.courses = this.courses.filter(e => e.id != course.id);
            }
        },
        created: function () {
            this.$parent.$on('sendUser', this.showModal);
        }
    }
</script>

<style scoped>

</style>