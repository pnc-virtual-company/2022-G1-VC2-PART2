<template>
    <div class="flex bg-orange px-3 py-[3px] rounded-full">
      <p class="text-white"><slot></slot></p>
      <div v-if="role=='alumni'" class="ml-1" @click="removeSkill">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
    </div>

</template>
<script>
  import swal from 'sweetalert';
  export default{
    emits:['remove'],
    props: {
      id: Number,
      index: Number,
      role: String,
    },
    methods: {
      removeSkill() {
        swal({
          title: "Are you sure?",
          text: "You want to remove this skill !!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            let card_id = {id: this.id, index: this.index};
            this.$emit('remove', card_id);
            swal("Your skill has been removed !!", {
              icon: "success",
            });
          } 
        });
      }
    },
  }
</script>