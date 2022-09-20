<template>
    <!--  list Form-->
    <form class="border border-black w-[75%] rounded m-auto mt-5 p-3">
      <!-- header -->
      <div class="w-[70%] flex justify-between m-auto mt-5">
        <div class="w-[40%]">
          <select
            @click="filterAlumnis"
            class="w-[70%] border-2 border-none outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer -ml-12"
          >
            <option value="All" selected>All</option>
            <option value="invited">invited</option>
            <option value="pending">pending</option>
            <option value="actived">actived</option>
          </select>
        </div>
        <div class="w-[20%] justify-end">
          <button
            class="w-[100%] p-1 bg-blue-500 rounded-md text-white text-2xl text-bold shadow-md ml-[52px]"
          >
            Invite
          </button>
        </div>
      </div>
      <div>
        <table
          class="w-[80%] whitespace-nowrap bg-white m-auto mt-4 shadow-md bg-opacity-50"
        >
          <thead>
            <tr
              tabindex="0"
              class="focus:outline-none h-16 w-full text-sm leading-none shadow-sm border-b-2 border-primary"
            >
              <th class="font-bold text-center w-[25%] ">USERNAME</th>
              <th class="font-bold text-center w-[25%] ">EMAIL</th>
              <th class="font-bold text-center w-[25%] ">STATUS</th>
              <th class="font-bold text-center w-[25%] ">ACTION</th>
            </tr>
          </thead>
          
          <tbody v-for:="ero in listEro">
            <tr
              tabindex="0"
              class="focus:outline-none h-16 w-full text-sm leading-none shadow-sm border-b-2 border-primary"
            >
              <td class="text-center w-[25%]">{{ero.username}}</td>
              <td class="text-center w-[25%]">{{ero.email}}</td>
              <td 
              class="text-center w-[25%]"
              :class="ero.status.toLowerCase()">{{ero.status}}</td>
              <td class="flex justify-center items-center mt-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="w-6 h-6 bg-red-700 flex justify-center items-center"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                  />
                </svg>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
  </template>
  
  <script>
  
  export default {
    data() {
      return {
        listEro: [],
        dataAlumni: [
          {
            username: "Piset Mok",
            email: "ero.cambodia@passerellesnumeriques.org",
            status: "actived",
          },
          {
            username: "Synich Hun",
            email: "ero.cambodia@passerellesnumeriques.org",
            status: "invited",
          },
          {
            username: "Sreypich Ly",
            email: "ero.cambodia@passerellesnumeriques.org",
            status: "pending",
          },
        ],
        searchKeyword: "",
      };
    },
  
    methods: {
      filterAlumnis(e) {
        if (e.target.value.toLowerCase() == "all") {
          this.listEro = this.dataAlumni;
        } else{
          this.listEro = this.dataAlumni.filter((ero) => ero['status'].toLowerCase()==e.target.value.toLowerCase());
        }
      },
      dislplayEro(){this.listEro=this.dataAlumni},
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
  