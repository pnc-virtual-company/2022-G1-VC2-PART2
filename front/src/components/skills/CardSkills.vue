<template>
    <div class="flex justify-between">
      <h1 class="font-bold text-lg">Skills</h1>
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shadow bg-white rounded-full">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
      </div>
    </div>
    <div class="skills">
        
    </div>
    <div class="flex p-2 flex-wrap gap-2">
      <card-skill>JavaScript</card-skill>
      <card-skill>HTML</card-skill>
      <card-skill>PHP</card-skill>
      <card-skill>VueJS</card-skill>
      <card-skill>Python</card-skill>
  
    </div>
  
  </template>
  
  <script>
  import SkillCard from "./CardSkill.vue"
  export default {
      components:{
        'card-skill': SkillCard,
      }
  };
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
  