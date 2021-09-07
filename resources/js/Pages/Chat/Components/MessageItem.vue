<template>
  <div>
        <div class="flex space-x-3 px-3">
          <img class="mt-4 h-8 w-8 rounded-full" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />  
          <div class="flex-1 space-y-1">
            <div class="flex items-center justify-between">
              <h3 class="pt-2 text-sm font-medium">{{ message.user.name }}</h3>
              <p class="text-sm text-gray-500">{{ readableDate(message.created_at) }}</p>
            </div>
            <p class="text-md text-gray-500">{{ message.message }}</p>
          </div>
        </div>
  </div>
</template>

<script>
import { TimeAgo } from 'vue2-timeago'

export default {
  components: {
      TimeAgo,
  },
  props: ['message'],

  methods: {
    readableDate (date) {
      return (new Date(date)).toLocaleString()
    }
  }
}
</script>
