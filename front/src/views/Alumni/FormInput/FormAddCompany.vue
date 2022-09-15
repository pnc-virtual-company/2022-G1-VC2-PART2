<template>
    <div class="main">
      <button @click="showform">show</button>
      <div class="modal-mask" v-if="showForm">
        <div class="modal-wrapper">
          <div class="modal-container rounded">
            <div class="flex w-[100%] border-y-4 border-gray-500 mt-5">
              <div class="w-[70%] m-auto mt-5 mb-2">
               <h4 class="text-xl"> Add Company</h4>
              </div>
              <div class="w-[15%]">
                <img src="../../../assets/reject.png" class="w-[50%] mt-2 -mr-5 cursor-pointer" @click="cancleAdd">
              </div>
            </div>
            <form class="w-[100%] flex flex-wrap m-auto" @submit.prevent="addCompany">
              <div class="w-[60%] flex m-auto  mt-10 mb-10">
                <div class="relative m-auto">
                  <img src="../../../assets/logo.png" class="w-24 h-24 rounded-full object-cover border-4 bg-cyan-700 border-gray-700">
                  <label for="uploadimg">
                    <span class="absolute h-6 w-6 rounded-full cursor-pointer bg-white border-gray-200 border-2 bottom-0 right-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                      </svg>
                    </span>
                  </label>
                  <input type="file"  id="uploadimg" hidden accept="images/*">
                </div>
              </div>
              <div class="w-[90%] flex m-auto">
                <div class="w-[30%]">
                  <label for="companyName" class="w-2/4">Company Name:</label>
                </div>
                <input type="text" v-model="company_name" id="companyName" class="w-[65%] p-1 outline-2 outline-blue-500  border-2 rounded-md">
                </div>
              <div class="w-[90%] flex  m-auto mt-4">
                <div class="w-[30%]">
                  <label for="companyAddress">Address:</label>
                </div>
                <input type="text" v-model="company_address" id="companyAddress" class="w-[65%] p-1 outline-2 outline-blue-500 border-2 rounded-md">
              </div>
              <div class="w-[90%] flex mt-7 mb-6 justify-end">
                <div class="w-[30%] flex">
                  <button type="submit" class="w-[100%] bg-blue-400 text-white p-2 rounded-sm">Add</button>
                </div>
                <div class="w-[30%] flex ml-4">
                  <button @click="cancleAdd" class="w-[100%] bg-gray-400 text-white p-2 rounded-sm">Cancle</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    emits:['add-company'],
  data(){
      return {
        showForm:false,
        company_name:'',
        company_address:'',
      }
  },
  methods:{
    showform(){
      this.showForm = !this.showForm;
      
    },
    addCompany(){
        let body = {companyName:this.company_name,companyAddress:this.company_address}
        this.$emit('add-company',body);
        this.showForm = !this.showForm;
    },
    cancleAdd(){
      this.showForm = !this.showForm;
    },

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