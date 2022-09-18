<template>
    <div class="main">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container rounded w-[30rem] p-4" v-click-outside="onClickOutside">
            <div class="flex items-center w-[28rem] border-b-2 border-gray-400 my-4">
               <h4 class="text-xl w-full mt-0"> Add Company</h4>
              <div class="flex justify-end -mt-4">
                <img src="../../../assets/reject.png" class="w-[2rem] cursor-pointer" @click="$emit('popUp', false)">
              </div>
            </div>
            <form class="w-[100%] flex flex-wrap m-auto" @submit.prevent="addCompany">
                <div class="relative mx-auto my-2">
                  <div class="w-[5rem] h-[5rem] rounded-full">
                    <img :src="logo? logo:''" class="rounded-full">
                  </div>
                  <label for="uploadimg">
                    <span class="absolute h-6 w-6 rounded-full cursor-pointer bg-white border-gray-200 border-2 bottom-0 right-0">
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
                      <input type="text" id="floating_name" v-model="company_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                      <label for="floating_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company*</label>
                  </div>
                </div>
                <div class="w-full m-auto px-4">
                  <div class="relative z-0 mb-6 w-full group">
                      <input type="text" id="floating_address" v-model="company_address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                      <label for="floating_address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address*</label>
                  </div>
                </div>
                <div class="w-full my-2 flex items-center ml-4 justify-end">
                  <button @click="$emit('popUp', false)" class=" hover:bg-[#cecece] border-[1px] border-gray-300 text-gray-500 shadow py-1 px-8  rounded focus:outline-none focus:shadow-outline">Cancle</button>
                  <button type="submit" class="bg-skyblue hover:bg-[#23afda] mx-2 text-white py-1 px-10 rounded focus:outline-none focus:shadow-outline">Add</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    props:['name'],
    emits:['add-company'],
  data(){
      return {
        logo: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAFVBMVEUAAAD///+lpaWtra2pqalra2udnZ3XsOkrAAACH0lEQVR4nO3ZQXLjMAwEwKzj5P9PzkEnlywuAIm0SfccUdAIfUop/vq3er5efUD3EM4fwvlDOH8It6Wr01v1cHxoiZCQsGcItyVCQsKeIdyWCAkJe4ZwWyKcTHi557VmQkJCQkJCQkJCQkJCQkLCxh0nJ4RXhpCwNiG8MoSEtcn7CvuFkJCQkJCQ8KOEV/UQDg9huqco/L5t+T45aVx2QvfQUxTud2qTSHMthISE0UmkuRZCQsLoJNJcCyEhYXQSaa5lAuHJQkLC9YUDvvFfLOwXQsJGD+GgXPV2QsJ+eReh/+pHJ5HmWggJCaOT0GWlQkJCQkJCQsIphI2dSAgJ1xeu/43fL4TpHsLh+SDh/ozIpNVDOCiEo4Tr/45fe32qmZCQ8PXCxk4khISE0UmkuRZCQsLoJNJcywTCk4WEhOsL1//G7xdCwkYP4aBc9XZCwn55F+H6v+Pvd2qTSHMthISE0UnoslIhISEhISEh4RTCxk4khITrC9f/xu8XwnQP4fB8kHB/RmTS6iEcFMJRwud/u3/ut8fcfwJPvafw+c59V3EPPDWT8LaruBESrixs7ERCSEhImG3Oh5CQ8ALhfjkyISQkJCQkJLxQ+Dz/E0ZSf/tBD2EqhKnL0k8e9BCmQpi6LP3kQQ9hKoSpy9JPHvQQpkKYuiz95EEPYSqEqcvSTx70EKbyu6v4rV+WfvKgpyVcLITzh3D+EM4fwvnzB/6pXTl+Bj9xAAAAAElFTkSuQmCC',
        company_name:this.name!=""?this.name:"",
        company_address:'',
        profile:"",
      }
  },
  methods:{
    onClickOutside () {this.$emit('popUp', false)},
    addCompany(){
        let body = new FormData();
        body.append('name', this.company_name)
        body.append('address', this.company_address)
        body.append('profile', this.profile)
        console.log("My data : ", this.company_name, this.company_address);
        this.$emit('add-company',body);
    },
    uploadImg(e){
      this.profile=e.target.files[0];
      this.logo=URL.createObjectURL(this.profile)
    }
  }
}
</script>
<style>
 .modal-mask {
    position: fixed;
    z-index: 10;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
  }
  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
  .modal-container {
    width: 35%;
    height: auto;
    margin: 0px auto;
    border-radius: 20px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
  }
  .modal-body {
    margin: 20px 0;
  }
  .modal-default-button {
    float: right;
  }
  .modal-enter-from,
  .modal-leave-to {
    opacity: 0;
  }
  .modal-enter-active .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
</style>