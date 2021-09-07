<template>
  <div>
    <div class="mt-1 relative flex items-center">
      <input 
          type="text" 
          v-model="message"
          @keyup.enter="sendMessage()" 
          name="input" 
          id="input" 
          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md" 
          placeholder="Enter your message here..." 
        /> 
      <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
        <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
          Return
        </kbd>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../../../Jetstream/Button.vue"

export default {
  components: { Button },
    props: ['room'],
    data: function () {
      return {
        message: ''
      }
    },
    methods: {
      sendMessage() {
        if( this.message == ' ') {
          return;
        }
        axios.post('/chat/room/' + this.room.id + '/message', {
          message: this.message
        })
        .then( response => {
          if( response.status == 201 ) {
            this.message = '';
            this.$emit('messagesent');
          }
        })
        .catch( error => {
          console.log( error );
        })
      }
    }
}
</script>