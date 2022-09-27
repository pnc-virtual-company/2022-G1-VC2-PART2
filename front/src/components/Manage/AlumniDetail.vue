<template>
  <div class="w-[100%] bg-[#000000b9] rounded fixed z-50 md:inset-0 h-[100%] m-auto">
    <div class="bg-white h-auto rounded m-auto w-[60%] z-10 mt-[5rem] pb-[2%]" v-click-outside="onClickOutside">
      <div class="flex justify-end p-2" @click="$emit('cancel')">
          <svg class="w-8 h-8 py-1 hover:cursor-pointer shadow hover:bg-gray-200 text-gray-900 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
      </div>
      <div >
          <div class="relative">
              <div class="w-full h-[25vh]">
                  <img v-if="alumniDetail.coverimage != undefined" class="w-full h-full  border border-1 border-gray-300 object-cover object-center" :src="'http://127.0.0.1:8000/images/Cover/'+ alumniDetail.coverimage" alt="">
              </div>
          </div>
        </div>
        <div class="absolute ml-10 text-center">
          <div class="flex">
              <div class="w-[6rem]">
                  <img v-if="alumniDetail.profile!=undefined" class="w-full rounded-full h-[6rem] mt-[-75px] object-cover border-[1px] border-skyblue" :src="'http://127.0.0.1:8000/images/profile/'+ alumniDetail.profile" alt="">
              </div>
          </div>
          <h1 class="font-bold text-xl">{{alumniDetail.first_name}} {{alumniDetail.last_name}}</h1>
        </div> 


        <div class="w-full flex justify-between mt-20">
          <div class="w-[38%] ml-[2.5rem]">
            <div class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"></path></svg>
              <p class="mt-1 ml-2">Batch {{alumniDetail.batch}}</p>
            </div>
            <div class="flex mt-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
              <p class="mt-1 ml-2">{{alumniDetail.major}}</p>
            </div>
          </div>
          <div class="w-[38%] ">
            <div class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path></svg>
              <p class="mt-1 ml-2">{{alumniDetail.phone}}</p>
            </div>
            <div class="flex mt-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path></svg>
              <p class="mt-1 ml-2">{{alumniDetail.email}}</p>
            </div>
          </div>
        </div>
        <div v-if="alumniDetail.status=='pending'" class="w-full  flex justify-end mt-8">
          <button @click="$emit('reject',alumniDetail['user_id'])" class="hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline">
              Reject
          </button>
          <button @click="$emit('approve',alumniDetail['user_id'])" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline mr-[3.3rem]">
              Approve
          </button>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ['reject','approve','cancel',],
  props: ["alumniDetail"],
  methods: {
    onClickOutside(){this.$emit('cancel')},
  }
};
</script>

<style></style>
