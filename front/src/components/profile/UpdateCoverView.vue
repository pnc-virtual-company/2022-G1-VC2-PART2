<template>
    <div class="flex items-center w-full p-4 bg-[#23242986] fixed h-full top-0">
        <div class="bg-white rounded p-5 mt-2 m-auto text-center">
            <div class="flex items-center justify-between mb-4 text-lg">
                <p></p>
                <p class="font-semibold">Upload Cover</p>
                <p></p>
            </div>
            <div class="border-[1px] border-gray-300">
                <img class="w-[73rem] h-72" :src="cover">
            </div>
            <div class="w-full mt-5 flex justify-end">
                <button @click="$emit('cancelUpdate')" class="btn bg-[#ff9933] hover:bg-[#f69432] rounded p-2 text-white w-[8rem] mr-[1rem]">
                    Cancel
                </button>
                <button @click="$emit('save-cover')" class="btn bg-[#22bbea] rounded p-2 text-white w-[8rem]">
                    Save Change
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['cover'],
    }
</script>