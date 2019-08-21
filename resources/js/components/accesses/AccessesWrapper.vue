<template>
    <div class="container-fluid">
        <div class="card-header bg-bitlab">
            <i class="mdi mdi-account-key menu-icon text-white"></i>
        </div>
        <div class="card">

            <router-view></router-view>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AccessesWrapper.vue"
    }
</script>

<style scoped>

</style>
