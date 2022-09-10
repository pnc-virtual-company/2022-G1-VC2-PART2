<template>
  <section>
    <nav class="w-full h-12 flex border-b-2 border-gray-300 pt-8 pb-8">
      <div class="w-1/4 h-full flex items-center ml-5">
        <img class="w-30 h-10 mr-3" src="../../assets/pncLogo.jpg" alt="" />
        <img class="w-30 h-10" src="../../assets/alumniLogo.jpg" alt="" />
      </div>
      <div class="w-2/4 h-full flex items-center justify-center">
        <ul class="flex justify-between p-1">
          <li class="p-3">
            <router-link to="/" class="font-bold p-1">HOME </router-link>
          </li>
          <li class="p-3">
            <router-link to="/alumni-profile" class="font-bold p-1">PROFILE </router-link>
          </li>
        </ul>
      </div>
      <div class="w-1/4 h-full flex items-center justify-end">
        <ul class="flex justify-between items-center p-1">
          <li class="p-3 flex items-center">
            <a href="#" class="hover:border-transparent">
              <img class="w-30 h-10" src="../../assets/logo.png" alt="" />
            </a>
            <a href="#" class="font-bold p-1 hover:border-transparent">Tim Bin</a>
          </li>
          <li class="p-3">
            <a href="#" class="font-bold p-1 hover:border-transparent">
              <i class="fa fa-sign-out fa-2x text-blue-400"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
</template>
