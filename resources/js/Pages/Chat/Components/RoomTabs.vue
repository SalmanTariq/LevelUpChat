<template>
    <div>
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <select id="tabs" name="tabs"
                    class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                <option v-for="tab in rooms" :key="tab.name" :selected="tab.current">{{ tab.name }}</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <nav class="relative z-0 shadow flex divide-x divide-gray-200" aria-label="Tabs">
                <a v-for="(tab, tabIdx) in rooms" :key="tab.name" @click="$emit('onSelectRoom', tab)"
                   :class="[tab.id === selectedRoomId ? 'text-gray-900' : 'text-gray-500 hover:text-gray-700', tabIdx === 0 ? 'rounded-l-lg' : '', tabIdx === rooms.length - 1 ? 'rounded-r-lg' : '', 'group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10']"
                   :aria-current="tab.id === selectedRoomId ? 'page' : undefined">
          <span>{{ tab.name }} <XIcon class="float-right h-3.5 w-3.5 -mt-2 -mr-2 text-black" aria-hidden="true"/>
          </span>
                    <span aria-hidden="true"
                          :class="[tab.id === selectedRoomId ? 'bg-indigo-500' : 'bg-transparent', 'absolute inset-x-0 bottom-0 h-0.5']"/>
                </a>
            </nav>
        </div>
    </div>
</template>

<script>
import {XIcon} from '@heroicons/vue/solid'


export default {
    components: {
        XIcon,
    },
    props: ['rooms', 'selectedRoomId'],
    emits: ['onSelectRoom']
}
</script>
