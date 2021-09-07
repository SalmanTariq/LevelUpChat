<template>
  <div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
          <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
          <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
            2-Factor Authentication
          </h2>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </template>

            <template v-else>
                Please confirm access to your account by entering one of your emergency recovery codes.
            </template>
        </div>

            <validation-modal-popup />

          <div class="mt-6">
            <form @submit.prevent="submit" class="space-y-6">

           <div v-if="! recovery" class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="code" value="code" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Code</label>
                <input type="text" name="code" id="code" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" v-model="form.code" required autofocus autocomplete="email" />
            </div>

           <div v-else class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="recovery_code" value="Recovery Code" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Recovery Code</label>
                <input type="text" name="recovery_code" id="recovery_code" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" v-model="form.recovery_code" required autofocus autocomplete="email" />
            </div>

                <div>
                <button type="button" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use a recovery code
                    </template>

                    <template v-else>
                        Use an authentication code
                    </template>
                </button>
                </div>

              <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Log In
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
          <div class="hidden lg:block relative w-0 flex-1">
      <side-images />
    </div>
    </div>

</template>

<script>
import SideImages from './Components/SideImages.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import ValidationModalPopup from '../../Components/ValidationModalPopup.vue';

export default {
  components: { 
      SideImages, 
      Head, 
      Link,
      ValidationModalPopup, 
    },
        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    }
</script>