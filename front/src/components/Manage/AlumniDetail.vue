<template>
  <div class="w-[100%] bg-[#000000b9] fixed z-50 md:inset-0 h-[100%] flex items-center">
    <div class="bg-white h-auto rounded m-auto w-[35%] z-10">
        <div class="card border w-[100%] h-[100%] hover:shadow-none relative flex flex-col mx-auto  shadow-lg m-5">
            <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/iFPBRwZ4I-M/download?force=true&w=640" alt="" />
            <div class="profile w-full flex m-3 ml-4">
              <img class="w-28 h-28 p-1  rounded-full" :src="'http://127.0.0.1:8000/images/profile/' + alumniDetail.profile" alt=""/>
              <div class="title mt-11 ml-3 font-bold">
                <div class="name break-words text-white mr-60">{{alumniDetail.first_name}} {{alumniDetail.last_name}}</div>
                <div class="add font-semibold text-sm dark mr-6 mt-2">{{alumniDetail.email}}</div>
              </div>
            </div>
            <div v-if="alumniDetail.status=='pending'" class="w-full mb-4  flex justify-end">
              <button @click="$emit('reject',alumniDetail['user_id'])" class="hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline">
                  Reject
              </button>
              <button @click="$emit('approve',alumniDetail['user_id'])" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">
                  Approve
              </button>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["alumniDetail"],
};
</script>

<style></style>
