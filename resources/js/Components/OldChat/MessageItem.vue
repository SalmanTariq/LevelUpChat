<template>
  <div>
    <div class="flex space-x-3 space-y-5">
      <img class="h-8 w-8 rounded-full mt-auto mb- mb-2" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="" />
      <div class="flex-1 space-y-1">
        <div class="flex items-center justify-between">
          <h3 class="text-sm text-gray-700 font-medium">{{ message.user.name }}</h3>
         <!-- <vue-moments-ago class="text-md text-gray-900" prefix="" suffix="ago" :date="readableDate(message.created_at)" lang="en" /> -->
        </div>
        <p class="text-md text-gray-900">{{ message.text }}</p>
      </div>
    </div>
  </div>
</template>

<script>
//import VueMomentsAgo from 'vue-moments-ago'

export default {
  components: {
    //VueMomentsAgo,
  },
  props: ['message', 'self'],
  computed: {
    decorativeClasses () {
      if (this.self) {
        return 'bg-blue-100 text-blue-900'
      }
      return 'bg-pink-100 text-pink-900'
    }
  },
  methods: {
    readableDate (date) {
      return (new Date(date)).toLocaleString()
    }
  }
}
</script>

