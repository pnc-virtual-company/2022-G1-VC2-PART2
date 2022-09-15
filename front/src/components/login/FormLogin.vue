<template>
  <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
    <div class="flex h-full items-center bg-skyblue">
      <img src="../../assets/login2.png" alt="logo" class="w-[30%] m-auto" />
      <div class="rounded mb-4 w-[40%] m-auto mt-[30px]">
        <form class="p-5 bg-sky-50 rounded">
          <img
            src="../../assets/alumni.png"
            alt="logo"
            class="w-[100px] m-auto"
          />
          <h1 class="text-2xl font-semibold text-center p-1">LOGIN ALUMNI</h1>

          <div class="mb-6 relative">
            <label class="block text-gray-700 text-lg mb-1" for="password">
              Email *
            </label>
            <input
              class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
              id="email"
              type="email"
              placeholder="Email..."
            />
            <svg
              v-if="is_not_fill_email"
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 absolute top-[40px] right-3 text-red-500"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                clip-rule="evenodd"
              />
            </svg>
            <div class="mb-1 relative">
              <label class="block text-gray-700 text-lg mb-1" for="username">
                Password *
              </label>
              <input
                class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
                id="password"
                placeholder="Password..."
              />
              <svg
                v-if="isInValid"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-red-500"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                />
              </svg>
              <svg
                v-else-if="showpassword == 'password'"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer"
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
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer"
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
            <router-link
              class="inline-block cursor-pointer align-baseline text-sm text-blue-500 hover:text-blue-800"
              to="forgot"
            >
              Forgot Password?
            </router-link>
          </div>
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white py-2 w-full px-4 rounded focus:outline-primary focus:shadow-outline"
            type="submit"
          >
            Login
          </button>
        </form>
      </div>
    </div>
  </section>
</template>
