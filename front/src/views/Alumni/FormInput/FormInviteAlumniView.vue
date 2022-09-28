<template>
  <div tabindex="-1" class="bg-[#000000b9] fixed flex items-center z-50 md:inset-0 h-modal md:h-full">
    <div class="w-[40%] bg-white shadow rounded m-auto p-3 mt-30">
      <h2 class="font-bold text-2xl text-center">Alumni</h2>
      <div class="flex bg-white w-[90%] rounded border-[1px] m-auto mt-5 border-gray-300" :class="{'border-[1px] border-red-500 bg-red-100': is_email}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400 mt-2 ml-2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
        </svg>
        <input v-model="email" type="email" class="outline-none rounded w-[95%] p-2 text-gray-700 mb-1" id="email" @keypress="sms = '',is_valid = false"
        :class="{'bg-red-100': is_email}"
        placeholder="Email..." required/>
      </div>
      <div v-if="sms!=''" class="text-red-500 text-sm ml-4 p-2">{{sms}}</div>
      <div v-if="is_valid" class="text-red-500 text-sm ml-4 p-2">{{sms_error}}</div>
      <div class="w-[90%] p-2">
        <p class="ml-2 p-2">{{inviteMessage}}</p>
      </div>
      <div class="btn-controller flex justify-end mt-5 mb-2">
        <button class="mr-4 hover:bg-[#cecece] border-[1px] border-gray-300 shadow py-1 px-8 rounded focus:outline-none focus:shadow-outline" @click="$emit('cancelInvite')">Cancel</button>
        <button class="bg-[#23afda] mx-2 text-white py-1 px-10 mr-6 rounded focus:outline-none focus:shadow-outline" @click="invite">Invite</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ['cancelInvite', 'inviteAlumni', 'sms'],
  props: ['inviteMessage', 'sms'],
  data(){
    return {
      email:'',
      is_email: false,
      is_valid: false,
      sms_error: '',
    }
  },
  methods: {
    invite() {
      if (this.email.trim() != '') {
        if (this.email.match(/^[\w.]+@([\w-]+\.)+[\w-]{2,3}$/)) {
          this.is_email = false;
          this.is_valid = false;
          this.$emit('inviteAlumni', this.email)
        }else {
          this.$emit('sms')
          this.sms_error = 'This email is not valid!'
          this.is_valid = true;
          this.is_email = true;
        }
      }else {
        this.is_email = true;
        console.log('hi')
      }
    }
  },
};
</script>
