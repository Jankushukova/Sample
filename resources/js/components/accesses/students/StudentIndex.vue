<template>
    <div class="card-body ">

        <div class="card-description row">
            <router-link tag="button" :to="{name: 'indexAccess'}" type="button"
                         class="btn btn-outline-secondary btn-rounded btn-icon">
                <i class="mdi mdi-arrow-left"></i>
            </router-link>

            <div class="col">Create student access</div>
        </div>

    </div>
</template>

<script>

    export default {
        data: function () {
            return {
            }
        },
    }
</script>
