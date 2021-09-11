<template>
    <div>
        <h1 class="font-bold text-blue-900">Active Users</h1>
        <user-list-item v-for="user in users" :user="user"></user-list-item>
    </div>
</template>

<script>
import UserListItem from "./UserListItem";

export default {
    name: 'UserList',
    components: {
        UserListItem
    },
    props: ['users']
}
</script>
