<template>
    <div>
        <div class="h-full flex flex-col-reverse overflow-y-auto">
            <div v-for="(message, index) in messages" :key="index" :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-100'">
            <message-item :message="message" />
            </div>
        </div>
    </div>
</template>

<script>
import MessageItem from './MessageItem.vue'
export default {
    components: { MessageItem },
    props: ['messages']
}
</script>