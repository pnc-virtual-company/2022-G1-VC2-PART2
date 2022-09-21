<template>
    <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
      <div class="flex h-full items-center ml-10">
        <img src="../../../assets/login.png" alt="logo" class="w-[45%] m-auto" />
        <div class="rounded mb-2 w-[40%] m-auto mt-[15px]">
          <form class="p-3 bg-[#CCE7F6] rounded mr-10 border-white">
            <img src="../../../assets/person.png" alt="logo" class="w-[100px] m-auto" />
            <h1 class="text-2xl font-semibold text-center p-1">
              INPUT INFORMATION
            </h1>
            <div class=" flex">
              <div class="w-[49%] m-1">
                <label class="block text-gray-700 text-lg mb-1">
                  First Name *
                </label>
                <input
                  class="shadow appearance-none border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:outline-primary focus:shadow-outline"
                  type="text"
                  placeholder="First name..."
                />
              </div>
              <div class="w-[49%] m-1">
                <label class="block text-gray-700 text-lg mb-1">
                  Last Name *
                </label>
                <input
                  class="shadow appearance-none border rounded w-full py-2.5 px-2 text-sm text-gray-700 mb-1 leading-tight outline-none focus:outline-primary focus:shadow-outline"
                  type="text"
                  placeholder="Last name..."
                />
              </div>
            </div>
            <div class=" flex">
              <div class="w-[49%] m-1">
                <label class="block text-gray-700 text-lg mb-1"> Batch * </label>
                <select
                  name=""
                  id="batch"
                  class="w-full rounded border p-2 focus:outline-none text-gray-500 tesx-sm"
                >
                  <option value="Select Your batch">Select Your batch</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
              </div>
              <div class="w-[49%] m-1">
                <label class="block text-gray-700 text-lg mb-1"> Major * </label>
                <select
                  name=""
                  id="batch"
                  class="w-full rounded border p-2 focus:outline-none text-gray-500 text-sm"
                >
                  <option value="Select Your batch">
                    Select Your Major
                  </option>
                  <option value="WEB">WEB</option>
                  <option value="SNA">SNA</option>
                  <option value="IT">IT</option>
                </select>
              </div>
            </div>
  
            <div class="mb-2 relative">
              <label class="block text-gray-700 text-lg mb-1 ml-1" for="password">
                Phone *
              </label>
              <input
                class="appearance-none border border-none border-gray-400 rounded w-[98%] ml-1 py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline"
                id="phone"
                type="text"
                placeholder="phone..."
              />
            </div>
            <div class="ml-2">
              <label class="block text-gray-700 text-lg mb-1">Gender</label>
              <div class="flex">
                <div class="flex items-center mb-4">
                  <input
                    type="radio"
                    value="M"
                    class="w-4 h-4 bg-white border-gray-300 dark:ring-offset-gray-800 focus:ring-2"
                    id="m"
                  />
                  <label
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="m"
                    >Male</label
                  >
                </div>
                <div class="flex items-center mb-4 ml-2">
                  <input
                    type="radio"
                    id="f"
                    value="F"
                    class="w-4 h-4 bg-white border-gray-300 dark:ring-offset-gray-800 focus:ring-2"
                  />
                  <label
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="f"
                    >Female</label
                  >
                </div>
                <div class="flex items-center mb-4 ml-2">
                  <input
                    type="radio"
                    id="other"
                    value="Other"
                    class="w-4 h-4 bg-white dark:ring-offset-gray-800 focus:ring-2"
                  />
                  <label
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    for="f"
                    >Other</label
                  >
                </div>
              </div>
            </div>
            <button
              class="bg-[#22BBEA] text-white py-2 w-[98%] px-4 rounded focus:outline-primary focus:shadow-outline ml-1 mb-2"
              type="submit"
            >
              submit
            </button>
          </form>
        </div>
      </div>
    </section>
  </template>
  