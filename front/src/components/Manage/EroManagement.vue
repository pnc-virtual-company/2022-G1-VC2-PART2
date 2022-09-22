<template>
<section>

    <div class="mt-5">
      <div class="w-[80%] m-auto">
        <div class="flex justify-between">
          <div class="w-[20%]">
            <select
              @click="filterAlumnis"
              class="w-full border-[1px] outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer"
            >
              <option value="All" selected>All</option>
              <option value="invited">invited</option>
              <option value="pending">pending</option>
              <option value="actived">actived</option>
            </select>
          </div>
          <div class="w-[20%]">
            <button
              @click="popUp(true)"
              class="w-full p-2 bg-orange rounded-md text-white font-semibold shadow-md"
            >
              ADD ERO+
            </button>
          </div>
        </div>
        <table
          class="whitespace-nowrap bg-white w-full mt-3 shadow-md bg-opacity-50"
        >
          <thead>
            <tr
              tabindex="0"
              class="focus:outline-none h-14 w-full text-sm leading-none border-b-[1px] border-gray-300 bg-skyblue"
            >
              <th class="font-semibold text-center w-[25%] ">USERNAME</th>
              <th class="font-semibold text-center w-[25%] ">EMAIL</th>
              <th class="font-semibold text-center w-[25%] ">STATUS</th>
              <th class="font-semibold text-center w-[25%] ">ACTION</th>
            </tr>
          </thead>
          
          <tbody v-for:="ero in filterEro">
            <tr
              tabindex="0"
              class="focus:outline-none h-16 w-full text-sm leading-none shadow-sm border-b-[1px] border-gray-400 bg-slate-300"
            >
              <td class="text-center w-[25%]">{{ero.first_name + ' '+ ero.last_name}}</td>
              <td class="text-center w-[25%]">{{ero.email}}</td>
              <td 
              class="text-center w-[25%]"
              :class="ero.status.toLowerCase()">{{ero.status}}</td>
              <td class="flex justify-center items-center mt-4">
                <p class="bg-red-600 px-4 py-1 rounded hover:cursor-pointer" @click="removedEro(ero['id'])">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 text-white"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                  </svg>
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <registerEro
    v-if="isRegisterEro"
    @register="register"
    @popUp="popUp"
    :inviteMessage="inviteMessage"
    ></registerEro>
</section>
</template>

<script>
import axios from '../../axios-http'
import swal from 'sweetalert';
import registerEro from "../../views/Authentication/RegisterEroView.vue"
export default {
    components:{registerEro},
    data() {
      return {
        filterEro: [],
        isRegisterEro: false,
        dataEro: [],
        searchKeyword: "",
        inviteMessage: "",
      };
    },
  
    methods: {
      register(user){
        this.inviteMessage = 'Sending invite ...'
        axios.post('register', user).then(()=>{
          this.dislplayEro()
          this.isRegisterEro=false;
          swal("Invited !", "This ero email has been invited !", "success");
          this.inviteMessage = ''
        })
    },

    removedEro(id){
      swal({
              title: "Are you sure?",
              text: "You want to remove this work experience !!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.delete('removeUser/'+id).then(() => {
                        this.dislplayEro()
                        swal("removed !", "Your work experince is removed !", "success");
                    });
                } 
            });
    },

      filterAlumnis(e) {
        if (e.target.value.toLowerCase() == "all") {
          this.filterEro = this.dataEro;
        } else{
          this.filterEro = this.dataEro.filter((ero) => ero['status'].toLowerCase()==e.target.value.toLowerCase());
        }
      },
      dislplayEro(){
        axios.get("userEro").then((res)=>{
          this.dataEro = res.data
           this.filterEro=this.dataEro})
       },
      popUp(status){this.isRegisterEro=status}
    },
  
    mounted(){
      this.dislplayEro();
    }
  };
</script>
  
  <style scoped>
   .actived{
    color:green;
   }
   .invited{
    color:blue;
   }
   .pending{
    color:orange
   }
  </style>
  