<template>
    <div class="flex items-center p-2">
        <div class="relative overflow-visible">
            <img class="h-12" :src="user.avatar || '/images/dummy-user.jpeg'" alt="">
            <div class="rounded-full absolute bottom-0 right-0 w-3 h-3 bg-green-400" />
        </div>
        <h4 class="ml-4">{{ user.name }}</h4>
    </div>
</template>
<script>
export default {
    name: 'UserListItem',
    props: ['user']
}
</script>
