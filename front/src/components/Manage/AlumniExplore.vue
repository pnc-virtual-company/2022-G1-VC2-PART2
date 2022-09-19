<template>
    <section>

        <div class="w-[75%] m-auto">
          <div class="w-[30%] mt-5 flex  border-2 border-gray-100 ">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6 mt-2 ml-3"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
              />
            </svg>
            <input
              class=" border border-none outline-none rounded w-[30%] py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight"
              type="text"
              v-model="query"
              placeholder="Search..."
            />
          </div>
        </div>
        <!--  list Form-->
      <form class="border border-black rounded w-[75%] m-auto mt-5 p-3">
        <!-- header -->
        <div class="w-full flex justify-between m-auto mt-5">
            <div class="w-[60%] flex justify-between ml-[48px]">
                <div class="w-[22%]">
                  <select
                   @click="companyMathch"
                    class="w-full border-2 border-none outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer "
                  >
                    <option value="All" selected>Company</option>
                    <option value="Z1 Flexible Solution">Z1 Flexible Solution</option>
                    <option value="Source Max">Source Max</option>
                    <option value="Camsolution">Camsolution</option>
                  </select>
                </div>
                <div class="w-[22%]">
                  <select
                  @click="majorMathch"
                    class="w-full border-2 border-none outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer "
                  >
                    <option value="All" selected>Major</option>
                    <option value="WEB">WEB</option>
                    <option value="SNA">SNA</option>
                    <option value="IT">IT</option>
                  </select>
                </div>
                <div class="w-[22%]">
                  <select
                  @click="batchMathch"
                    class="w-full border-2 border-none outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer "
                  >
                    <option value="All" selected>Batch</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                  </select>
                </div>
                <div class="w-[22%]">
                  <select
                  @click="genderMathch"
                    class="w-full border-2 border-none outline-none border-gray-500 p-2 shadow-md rounded-md cursor-pointer "
                  >
                    <option value="All" class=" text-sm" selected>Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="other">other</option>
                  </select>
                </div>
            </div>
            <div class="flex justify-end  w-[6rem] mr-12">
                <button
                class="w-full p-1 bg-orange rounded-md text-white text-xl text-bold shadow-md"
                >
                clear
                </button>
            </div>
        </div>
        <div>
          <table
            class="w-[90%] whitespace-nowrap bg-white m-auto mt-4 shadow-md bg-opacity-50"
          >
            <thead>
              <tr
                tabindex="0"
                class="focus:outline-none h-16 w-full text-lg leading-none shadow-sm border-b-2 border-primary"
              >
                <th class="font-bold text-center w-[25%]">USERNAME</th>
                <th class="font-bold text-center w-[25%]">MAJOR</th>
                <th class="font-bold text-center w-[25%]">COMPANY</th>
                <th class="font-bold text-center w-[25%]">POSITION</th>
              </tr>
            </thead>
            <tbody 
            v-if="listAlumnis.length"
            v-for:="alumni in listAlumnis">
              <tr
                tabindex="0"
                class="focus:outline-none h-16 w-full text-sm leading-none shadow-sm border-b-2 border-primary"
              >
        
              <td class="text-center w-[25%]">
                <div class="flex items-center space-x-2 p-2">
                    <img class="rounded-full w-14 h-14 border-2 border-primary" src="../../assets/cutes.jpg" alt="">
                    <p class="pl-6">{{alumni.first_name + ' '+alumni.last_name}}</p>
                </div>
                </td>
                <td class="text-center w-[25%]">{{alumni.major}}</td>
                <td class="text-center w-[25%]">{{alumni.company}}</td>
                <td class="text-center w-[25%]">{{alumni.position}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </section>
</template>

<script>
import axios from "../../axios-http";
export default {
    data(){
        return{
            listAlumnis:[],
            dataAlumnis:[
                // {username:'Sreymao Vron', major:'WEB', gender:'Male', batch:2021 , company:'Z1 Flexible Solution', position:'Laravel Developer'},
                // {username:'Theavy Vun', major:'SNA', gender:'Female', batch:2019 , company:'Source Max', position:'Web Developer'},
                // {username:'Vansao Hang', major:'IT', gender:'Other', batch:2020 , company:'Camsolution', position:'Web Developer'},
            
            ],
            query:"",
            
        }
    },
    methods:{
        displayAlumnis(){
            axios.get('alumnis').then((res) => {
                this.dataAlumnis=res.data
                this.listAlumnis=this.dataAlumnis
                })
        },
        filterAlumni() {

        },
        companyMathch(e){
            if(e.target.value.toLowerCase()=='all'){
                this.listAlumnis=this.dataAlumnis
            }else{
                this.listAlumnis=this.dataAlumnis.filter(match => match['company'].toLowerCase()==e.target.value.toLowerCase());
            }
        },
        majorMathch(e){
            if(e.target.value.toLowerCase()=='all'){
                this.listAlumnis=this.dataAlumnis
            }else{
                this.listAlumnis=this.dataAlumnis.filter(match => match['major'].toLowerCase()==e.target.value.toLowerCase());
            }
        },
        batchMathch(e){
            if(e.target.value.toLowerCase()=='all'){
                this.listAlumnis=this.dataAlumnis
            }else{
                this.listAlumnis=this.dataAlumnis.filter(match => match['batch'].toString().toLowerCase()==e.target.value.toLowerCase());
            }
        },
        genderMathch(e){
            if(e.target.value.toLowerCase()=='all'){
                this.listAlumnis=this.dataAlumnis
            }else{
                this.listAlumnis=this.dataAlumnis.filter(match => match['gender'].toLowerCase()==e.target.value.toLowerCase());
            }
        },
    },
    watch:{
            query(value){
                this.query=value
                this.listAlumnis=this.dataAlumnis.filter((key) => key['username'].toLowerCase().includes(value.toLowerCase()));
            }
        },
    mounted(){
        this.displayAlumnis()
    }
};
</script>