<template>
  <div class="bottom-0 sticky w-5/6 mt-3">
    <div class="w-full h-10">
          <span class="relative z-0 inline-flex shadow-sm rounded-md">
    <button type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Font
    </button>
    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Upload
    </button>
    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Style
    </button>
    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Lock
    </button>
    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Giphy
    </button>
        <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
      Private
    </button>
  </span>
    </div>
      <div class="flex mt-0">
        <input
          type="text"
          class="flex-1 p-2 outline-none rounded border-gray-200"
          v-model="message"
          @keyup.enter="sendMessage"
          placeholder="Type your message here..."
        >
        <button
          @click="sendMessage"
          class="ml-2 bg-indigo-700 hover:bg-indigo-600 text-white py-2 px-5 font-bold uppercase tracking-wide rounded shadow-lg">
          Send
        </button>
      </div>
    </div>

</template>

<script>
export default {
  props: ['room'],
  data () {
    return {
      message: ''
    }
  },
  methods: {
    /**
     * Send the message to the corresponding room.
     *
     */
    sendMessage () {
      if (!this.message) {
        return
      }
      axios
        .post(`/chat/${this.room.id}`, {
          text: this.message
        })
        .then(response => {
          if (response.status === 201) {
            this.message = ''
            this.$emit('messageSent')
          }
        })
        .catch(error => console.log(error.message))
    }
  }
}
</script>

