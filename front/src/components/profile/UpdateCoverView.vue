<template>
    <div class="flex items-center w-full p-4 bg-[#23242986] fixed h-full top-0">
        <div class="bg-white rounded p-5 mt-2 m-auto text-center">
            <div class="flex items-center justify-between mb-4 text-lg">
                <p></p>
                <p class="font-semibold">Upload Cover</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-white  hover:bg-[#22bbea] rounded-full cursor:pointer" viewBox="0 0 20 20" fill="currentColor" @click="$emit('cancelUpdate')">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="border-[1px] border-gray-300">
                <img class="w-[73rem] h-72" :src="cover">
            </div>
            <div class="w-full mt-5 flex justify-end">

                <input @change="tageImage()" id="cover-upload" type="file" accept="image/*" hidden>
                <label for="cover-upload">
                    <p class="btn bg-[#ff9933] hover:bg-[#f69432] rounded p-2 text-white w-[8rem] mr-[1rem]">
                    Select
                    </p>
                </label>
                <button @click="$emit('save-cover')" class="btn bg-[#22bbea] rounded p-2 text-white w-[8rem] cursor:pointer">
                    Save Change
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['cover'],
        data(){
            return {
                image:'',
            }
        },
    }
</script>