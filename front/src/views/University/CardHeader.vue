<template>
  <table class=" table-auto w-[98%] flex flex-wrap m-auto mt-5">
    <thead class="w-[95%] flex flex-wrap m-auto shadow-md p-4 " >
      <tr class="w-[25%] m-auto">
        <th>
          <slot name="title_main"></slot>
        </th>
      </tr>
      <tr class="w-[35%] m-auto">
        <th>
          <slot name="address_main"></slot>
        </th>
      </tr>
      <tr class="w-[9%] m-auto">
        <th>
          <slot name="action_main"></slot>
        </th>
      </tr>
    </thead>
  </table>
</template>