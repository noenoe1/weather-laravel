<template>

    <app-layout>

        <form @submit.prevent="form.post(route('weathers.store'))" class="max-w-sm mx-auto my-6">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City
                    Name</label>
                <input type="text" id="name" v-model="form.name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Please fill city name!" required />
            </div>
            
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </app-layout>

</template>

<script setup>
import AppLayout from '../../layouts/App.vue';
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    name: ''
})
</script>