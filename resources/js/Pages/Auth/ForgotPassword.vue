<template>
  <div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
          <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
          <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
            Forgot your password?
          </h2>
        </div>

        <div class="mt-8">
                  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

            <validation-modal-popup />

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

          <div class="mt-6">
            <form @submit.prevent="submit" class="space-y-6">

           <div class="relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="email" value="Email" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Email address</label>
                <input type="text" name="email" id="email" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" v-model="form.email" required autofocus autocomplete="email" />
            </div>

              <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Email Password Reset Link
                </button>
              </div>
            </form>
          </div>
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
        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
    </script>