<template>
    <div>
        <p v-if="selectedImage"><img class="absolute inset-0 h-full w-full object-cover" :src="selectedImage" alt=""></p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: [
            'https://images.unsplash.com/photo-1593642634367-d91a135587b5?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2100&q=80',
            'https://images.unsplash.com/photo-1512626120412-faf41adb4874?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2100&q=80',
            'https://images.unsplash.com/photo-1577563908411-5077b6dc7624?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2100&q=80'
            ],
            selectedImage: null
        }
    },
    methods: {
        randomItem (items) {
        return items[Math.floor(Math.random()*items.length)];
        }
    },
    created() {
        this.selectedImage = this.randomItem(this.images)
    }
}
</script>