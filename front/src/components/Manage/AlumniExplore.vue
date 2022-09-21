<template>
    <section class="mt-4">
        <div class="w-[80%] m-auto">
          <div class="w-[30rem] flex justify-start">
              <input v-model="inputSearch" type="text" placeholder="Search..." class="w-64 border border-stone-400 rounded px-5 py-2 pr-11 outline-none shadow focus:border-skyblue focus:w-full transition-all duration-700">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-7 relative right-9 top-2 text-stone-400 rounded" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
          </div>
          <div class="rounded mt-4">
            <div class="w-full flex justify-between m-auto">
                <div class="w-[70%] flex justify-between">
                  <select v-model="company"
                    class="w-full border-[1px] outline-none border-gray-400 p-2 shadow-md rounded cursor-pointer mr-2 focus:border-skyblue"
                  >
                    <option value="All" selected>Company</option>
                    <option value="Z1 Flexible Solution">Z1 Flexible Solution</option>
                    <option value="sss">Source Max</option>
                    <option value="Camsolution">Camsolution</option>
                  </select>
                  <select v-model="major"
                    class="w-full border-[1px] outline-none border-gray-400 p-2 shadow-md rounded cursor-pointer mr-2 focus:border-skyblue"
                  >
                    <option value="All" selected>Major</option>
                    <option value="WEB">WEB</option>
                    <option value="SNA">SNA</option>
                    <option value="IT">IT</option>
                  </select>
                  <select v-model="batch"
                    class="w-full border-[1px] outline-none border-gray-400 p-2 shadow-md rounded cursor-pointer mr-2 focus:border-skyblue"
                  >
                    <option value="All" selected>Batch</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                  </select>
                </div>
                <div>
                  <button @click="clear"
                  class="w-full py-2 px-8 bg-orange rounded text-white font-semibold shadow-md"
                  >
                  Clear
                  </button>
                </div>
            </div>
            <table
              class="w-full whitespace-nowrap bg-white m-auto mt-4 shadow-md bg-opacity-50"
            >
              <thead>
                <tr
                  tabindex="0"
                  class="focus:outline-none h-14 w-full leading-none shadow-sm text-sm bg-skyblue"
                >
                  <th class="font-semibold text-center w-[25%]">USERNAME</th>
                  <th class="font-semibold text-center w-[25%]">MAJOR</th>
                  <th class="font-semibold text-center w-[25%]">COMPANY</th>
                  <th class="font-semibold text-center w-[25%]">POSITION</th>
                </tr>
              </thead>
              <tbody 
              v-if="filterAlumni.length>0"
              v-for:="alumni in filterAlumni">
                <tr @click="detail=true"
                  tabindex="0"
                  class="h-16 w-full text-sm leading-none shadow-sm border-b-[1px] border-gray-400 bg-gray-300 hover:cursor-pointer hover:bg-gray-400"
                >
          
                <td class="text-center w-[25%]">
                  <div class="flex items-center space-x-2">
                      <img class="ml-5 rounded-full w-14 h-14 border-[1px] border-skyblue" :src="'http://127.0.0.1:8000/images/profile/' +alumni.profile" alt="">
                      <p class="pl-6">{{alumni.first_name + ' '+alumni.last_name}}</p>
                  </div>
                  </td>
                  <td class="text-center w-[25%]">{{alumni.major}}-{{alumni.batch}}</td>
                  <td class="text-center w-[25%]">{{alumni.company}}</td>
                  <td class="text-center w-[25%]">{{alumni.position}}</td>
                </tr>
              </tbody>

              <tbody v-if="filterAlumni.length <= 0">
                  <tr class="bg-gray-300 h-14">
                      <td colspan="4" class="p-2 text-center">
                          <p class="">No students found!</p>
                      </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
        <alumni-detail v-if="detail" @close="detail=false" />
    </section>
</template>

<script>
import axios from "../../axios-http";
import AlumniDetail from '../../views/Ero/AlumniDetailView.vue'
export default {
  components: {
    'alumni-detail': AlumniDetail,
  },
  data(){
      return{
          listAlumnis:[],
          dataAlumnis:[
              {username:'Sreymao Vron', major:'WEB', gender:'Male', batch:2021 , company:'Z1 Flexible Solution', position:'Laravel Developer'},
              {username:'Theavy Vun', major:'SNA', gender:'Female', batch:2019 , company:'Source Max', position:'Web Developer'},
              {username:'Vansao Hang', major:'IT', gender:'Other', batch:2020 , company:'Camsolution', position:'Web Developer'},
          
          ],
          company: 'All',
          batch: 'All',
          major: 'All',
          inputSearch: '',
          detail: false,
          
      }
  },
  computed: {
    filterAlumni() {
      if(this.company == 'All' && this.major == 'All' && this.batch == 'All') {
        return this.dataAlumnis.filter(alumni => 
        alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase())
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase())
        );

      }else if (this.company == 'All' && this.major == 'All' && this.batch != 'All'){
        return this.dataAlumnis.filter(alumni => 
        alumni.batch == this.batch &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))
        );
      }else if (this.company == 'All' && this.major != 'All' && this.batch != 'All'){
        return this.dataAlumnis.filter(alumni => 
        alumni.batch == this.batch && alumni.major == this.batch &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))        
        );
      }else if (this.company != 'All' && this.major == 'All' && this.batch != 'All'){
        return this.dataAlumnis.filter(alumni => alumni.batch == this.batch && alumni.company == this.company &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))
        );
      }else if (this.company != 'All' && this.major != 'All' && this.batch == 'All'){
        return this.dataAlumnis.filter(alumni => alumni.major == this.major && alumni.company == this.company &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))
        );
      }else if (this.company == 'All' && this.major != 'All' && this.batch == 'All'){
        return this.dataAlumnis.filter(alumni => alumni.major == this.major &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))      
        );
      }else if (this.company != 'All' && this.major == 'All' && this.batch == 'All'){
        return this.dataAlumnis.filter(alumni => alumni.company == this.company &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))
        
        );
      }else{
        return this.dataAlumnis.filter(alumni => alumni.batch == this.batch && alumni.company == this.company && alumni.major == this.major &&
        (alumni.first_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.last_name.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.company.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.batch.toLowerCase().includes(this.inputSearch.toLowerCase()) 
        || alumni.major.toLowerCase().includes(this.inputSearch.toLowerCase()))       
        );
      }
    },
  },
  methods:{
      displayAlumnis(){
        axios.get('getAlumnis').then((res) => {
          console.log(res.data)
          this.dataAlumnis=res.data
        })
      },
      clear() {
        this.inputSearch = '';
        this.major = 'All';
        this.batch = 'All';
        this.company = 'All';
      },
  },
  mounted(){
      this.displayAlumnis()
  }
};
</script>