<template>
    <div class="flex justify-between mt-2 p-2 border-b-[1px] border-gray-400">
        <div class="flex items-center">
        <div class="w-16 h-16">
            <img class="w-16 h-16 rounded-full border border-1 border-gray-400" :src="image" alt="">
        </div>
        <div class="ml-4">
            <slot></slot>
        </div>
        </div>
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['image']
    };
    </script>