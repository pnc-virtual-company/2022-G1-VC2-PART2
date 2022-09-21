<template>
  <section>
    <!-- ResetPassword -->
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container rounded">
          <form class="w-[100%] flex flex-wrap" @submit.prevent="resetPassword">
            <div class="w-[100%]">
              <div
                class="
                  w-[100%]
                  bg-sky-300
                  text-center text-2xl text-white text-bold
                  p-2
                "
              >
                <h1>Reset New Passord</h1>
              </div>
            </div>
            <div class="mb-1 ml-5 mt-5 w-[90%] relative">
              <label
                class="block text-black text-lg font-bold mb-1"
                for="username"
              >
                New Password <span class="text-red-600">*</span>
              </label>
              <input
                v-model="newpassword"
                :type="showpassword"
                class="
                  appearance-none
                  border border-gray-400
                  rounded
                  w-full
                  py-2
                  px-3
                  text-gray-700
                  mb-1
                  leading-tight
                  outline-none
                  focus:outline-primary focus:shadow-outline
                "
                id="password"
                placeholder="Password..."
              />
              <svg
                v-if="showpassword == 'password'"
                @click="showPW"
                xmlns="http://www.w3.org/2000/svg"
                class="
                  h-5
                  w-5
                  absolute
                  top-[40px]
                  right-3
                  text-gray-400
                  hover:cursor-pointer
                "
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path
                  fill-rule="evenodd"
                  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                  clip-rule="evenodd"
                />
              </svg>
              <svg
                v-else
                @click="showPW"
                xmlns="http://www.w3.org/2000/svg"
                class="
                  h-5
                  w-5
                  absolute
                  top-[40px]
                  right-3
                  text-gray-400
                  hover:cursor-pointer
                  outline-none
                "
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                  clip-rule="evenodd"
                />
                <path
                  d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"
                />
              </svg>
            </div>
            <div class="mb-1 ml-5 mt-5 w-[90%] relative">
              <label
                class="block text-black text-lg font-bold mb-1"
                for="username"
              >
                Confirm Password <span class="text-red-600">*</span>
              </label>
              <input
                v-model="confirmPassword"
                type="password"
                class="
                  appearance-none
                  border border-gray-400
                  outline-none
                  rounded
                  w-full
                  py-2
                  px-3
                  text-gray-700
                  mb-1
                  leading-tight
                  focus:outline-primary focus:shadow-outline
                "
                id="password"
                placeholder="Comfirm Password..."
              />
            </div>
            <div class="w-[90%] flex m-5 justify-end">
              <button
                class="
                  w-[25%]
                  bg-sky-300
                  p-2
                  text-bold
                  mb-5
                  text-white
                  rounded-md
                "
                type="submit"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  emits: ["reset-password"],
  data() {
    return {
      newpassword: "",
      confirmPassword: "",
      showpassword: "password",
    };
  },
  methods: {
    resetPassword() {
      if (
        this.newpassword == this.confirmPassword &&
        this.newpassword != "" &&
        this.comfirmnewpassword != ""
      ) {
        this.$emit("reset-password", this.newpassword);
      }
    },
    showPW() {
      if (this.showpassword == "password") {
        this.showpassword = "text";
      } else {
        this.showpassword = "password";
      }
    },
  },
};
</script>

<style scoped>
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
  width: 33%;
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