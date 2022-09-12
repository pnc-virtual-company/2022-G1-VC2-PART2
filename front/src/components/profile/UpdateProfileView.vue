<template>
    <div class="flex items-center w-full p-4 bg-[#23242986] fixed h-full top-0 z-100">
      <form @submit.prevent="saveUpload" enctype="multipart/form-data" class="bg-white rounded p-5 mt-5 m-auto text-center">
          <div class="flex items-center justify-between mb-4 text-lg">
              <p class="font-semibold">Upload Profile</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" @click="isUploaded=false">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
          </div>
          <div class="max-h-72 overflow-auto overflow-y-hidden">
              <img src="https://s.cafebazaar.ir/images/upload/screenshot/com.laknaidriapps.girlscartoon-6dc92a38-6447-4f5e-bff2-858a8687b11c.jpeg" alt="" class="w-full max-h-[50vh] border border-1 border-gray-300 overflow-auto">
          </div>
          <div class="w-full mt-5">
              <button type="submit" class="btn bg-[#22bbea] rounded p-2 text-white w-full">
                  Save Change
              </button>
          </div>
      </form>
    </div>
</template>