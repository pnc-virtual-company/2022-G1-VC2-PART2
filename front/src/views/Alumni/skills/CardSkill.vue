<template>
    <div class="flex bg-orange px-3 py-[3px] rounded-full">
      <p class="text-white"><slot></slot></p>
      <div class="ml-1" @click="$emit('remove', {id:id, index:index})">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
    </div>
</template>
<script>
  export default{
    props:['id','index']
  }
</script>