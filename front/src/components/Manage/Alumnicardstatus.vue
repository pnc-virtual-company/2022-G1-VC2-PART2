<template>
    <div class="">
        <div class="flex w-[80%] m-auto">
            <!-- Total alumni -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="this.$emit('matchAlumni', 'all')">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.length:0}}</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md text-start">Total Alumni</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img class="w-[50%] m-auto" src="../../assets/total.png">
                </div>
            </div>
            <!-- active alimni -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="this.$emit('matchAlumni', 'actived')">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='actived').length:0}}</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md text-green-500 text-start">Active</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img src="../../assets/active.png">
                </div>
            </div>
            <!-- invite -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="this.$emit('matchAlumni', 'invited')">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='invited').length:0}}</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md text-blue-500 text-start">Invite</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img src="../../assets/invite.png">
                </div>
            </div>
            <!-- pending -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl cursor-pointer" @click="this.$emit('matchAlumni', 'pending')">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">{{countAlumnis.length?countAlumnis.filter(active => active['status'].toLowerCase()=='pending').length:0}}</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md  text-yellow-500">Pending</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img src="../../assets/padding.png">
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
   props:['countAlumnis']
}
</script>
