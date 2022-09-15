<template>
  <div class="flex justify-between border-b-[1px] border-[#a9aaaaa3]">
    
    <h1 class="font-bold text-lg">Skills</h1>
    <div @click="closePopUp(true)" class="hover:cursor-pointer">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6 hover:cursor-pointer text-white shadow bg-skyblue rounded-full"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 4.5v15m7.5-7.5h-15"
        />
      </svg>
    </div>
  </div>
  <div class="flex p-2 flex-wrap gap-2 mt-3">
    <card-skill 
    v-for:="(alumniSkill, i) in alumniSkills" 
    :id="alumniSkill.id"
    :index="i"
    @remove="removeAlumniSkill"
    >{{alumniSkill.name}}</card-skill>
  </div>
  <div>
    <form-skill 
    @closePopUp="closePopUp"
    v-if="isClickAddSkill"
    :skills="skills"
    @add-skill="addSkill"
    ></form-skill>
  </div>
</template>

<script>
import SkillCard from "./CardSkill.vue";
import FormAddSkill from "../FormInput/FormAddSkill.vue";
import axios from "../../../axios-http"
export default {
  components: {
    "card-skill": SkillCard,
    "form-skill": FormAddSkill
  },
  data(){
    return{
      isClickAddSkill: false,
      skills:[],
      alumniSkills:[]
    }
  },
  methods: {
    closePopUp(popUp) {
      this.isClickAddSkill = popUp;
    },
    addSkill(newSkill){
      axios.post('alumniSkill', newSkill).then(res => {
          return res.data;
      })
      newSkill['name']=this.skills.find(skill=>skill.id==newSkill.skill_id)['name']
      newSkill['id']= parseInt(this.alumniSkills[0]['id'])+1
      this.alumniSkills.push(newSkill);
   },
   getDataSkills(){
    axios.get('skills').then(res => {
      this.skills=res.data
    })
   },
   getAlumniSkill(){
    axios.get('alumniSkill/1').then(res => {
      this.alumniSkills=res.data
    })
   },
   removeAlumniSkill(remove){
    axios.delete('alumniSkill/'+ remove.id).then(res => {console.log(res.data);})
    this.alumniSkills.splice(remove.index, 1)
   }
  },
  mounted(){
    this.getDataSkills(),
    this.getAlumniSkill()
  }
}
</script>

<style>
.card-skill {
  padding: 10px;
  border: 1px solid black;
  border: none;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  background: rgb(105, 205, 252);
}

.card-title {
  border: 1px solid black;
  border: none;
  border-radius: 20px;
  background: orange;
  margin: 2px;
  padding: 5px 5px;
}

.img {
  color: white;
}
</style>
