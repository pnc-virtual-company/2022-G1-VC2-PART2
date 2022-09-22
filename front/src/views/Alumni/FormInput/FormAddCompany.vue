<template>
  <div tabindex="-1" class="bg-[#000000b9] fixed flex items-center z-50 md:inset-0 h-modal md:h-full">
    <div class="rounded bg-white m-auto w-[40%]" v-click-outside="onClickOutside">
      <div class="flex bg-skyblue justify-between items-center p-2 rounded-tr rounded-tl">
          <p></p>
          <h4 class="text-xl font-semibold"> Add Company</h4>
          <svg aria-hidden="true" class="w-5 h-5 cursor-pointer" @click="$emit('popUp', false)"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
          </svg>
      </div>
      <form class="w-full flex flex-wrap m-auto p-2 mb-2" @submit.prevent="addCompany">
          <div class="relative mx-auto">
            <div class="w-[5rem] h-[5rem] rounded-full">
              <img v-if="logo == ''" src="../../../assets/company.png" class="w-[5rem] h-[5rem] rounded-full border-[1px] border-skyblue object-cover">
              <img v-else :src="logo" class="w-[5rem] h-[5rem] rounded-full border-[1px] border-skyblue object-cover">
            </div>
            <label for="uploadimg">
              <span class="absolute h-6 w-6 rounded-full cursor-pointer bg-gray-300 p-[3px] bottom-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                  <path strokeLinecap="round" strokeLinejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
              </span>
            </label>
            <input type="file"  id="uploadimg" hidden accept="images/*" @change="uploadImg">
          </div>
          <div class="w-full m-auto px-4">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" id="floating_name" v-model="company_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-[1px] border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name <span class="text-red-500">*</span></label>
            </div>
          </div>
          <div class="w-full m-auto px-4">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" id="floating_address" v-model="company_address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-b-[1px] border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address <span class="text-red-500">*</span></label>
            </div>
          </div>
          <div class="w-full flex items-center justify-end pr-2">
            <button @click="$emit('popUp', false)" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-6 rounded focus:outline-none focus:shadow-outline">Cancel</button>
            <button type="submit" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-8 rounded focus:outline-none focus:shadow-outline">Add</button>
          </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
    props:['name'],
    emits:['add-company','popUp'],
  data(){
      return {
        company_name:this.name!=""?this.name:"",
        company_address:'',
        profile:"",
        logo: '',
      }
  },
  methods:{
    onClickOutside () {this.$emit('popUp', false)},
    addCompany(){
        let body = new FormData();
        body.append('name', this.company_name)
        body.append('address', this.company_address)
        body.append('profile', this.profile)
        this.$emit('add-company',body);
    },
    uploadImg(e){
      this.profile =e.target.files[0];
      this.logo=URL.createObjectURL(this.profile)
    }
  }
}
</script>
