<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">

            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    data() {
        return {
            users: []
        }
    },
    created() {
        // TODO ajax request to fetch users
    }
}
</script>