<template>
  <nav class="flex justify-between flex-wrap p-0  shadow-md">
    <div class="flex items-center text-white w-[9%] mx-8">
      <img :src="require('../assets/logo_PN-removebg-preview.png')" alt="">
      <img :src="require('../assets/Alumni-removebg-preview.png')" alt="">
    </div>
    <div class="block lg:hidden">
      <button class="flex items-center px-3 py-2 border rounded text-orange border-orange-400 hover:text-orange hover:border-white">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto max-w-full "> 
      <div class="text-sm lg:flex-grow  ">
        <a href="#responsive-header" class="lg:inline-block text-white bg-orange-500 w-[7%] h-14 ">
          Profile
        </a>
      <img :src="require('../assets/singout.png')" alt="" class="ml-2 lg:w-[2%] float-right  rounded-full mx-8 max-w-full ">
      <p class="float-right mx-2">vorn sreymao</p>
      <img :src="require('../assets/profile-removebg-preview.png')" alt=""  class="ml-2 lg:w-[2%] float-right  rounded-full ">
      </div>
    </div>
</nav>
</template>