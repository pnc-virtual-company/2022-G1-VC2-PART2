<template>
    <div class="w-[100%] flex flex-wrap ">
        <div class="w-[80%] flex flex-wrap m-auto mt-11">
            <!-- Total alumni -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">200</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md">Total Alumni</h5>
                    </div>
                </div>
                <div class="w-[45%] m-auto">
                    <img src="../../assets/Totalalumni.png">
                </div>
            </div>
            <!-- active alimni -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto  mt-5 rounded-xl">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">150</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md text-green-500">Active</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img src="../../assets/active.png">
                </div>
            </div>
            <!-- invite -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto mt-5 h-24 rounded-xl">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">40</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md  text-blue-500">Invite</h5>
                    </div>
                </div>
                <div class="w-[35%] m-auto">
                    <img src="../../assets/invite.png">
                </div>
            </div>
            <!-- pending -->
            <div class="w-[20%] flex flex-wrap bg-gray-300 m-auto h-24 mt-5 rounded-xl">
                <div class="w-[55%] flex flex-wrap p-2">
                    <div class="w-[88%]  p-2 text-start">
                        <h1 class="text-4xl">200</h1>
                    </div>
                    <div class="w-[88%] m-auto">
                        <h5 class="text-md  text-yellow-500">Pendding</h5>
                    </div>
                </div>
                <div class="w-[40%] m-auto">
                    <img src="../../assets/padding.png">
                </div>
            </div>
        </div>
        <!-- formlist -->
        <ListAlumni/>
    </div>
</template>

<script>
import ListAlumni from './ListformAlumni.vue'
export default {
    name:"show-list",
    components:{
        ListAlumni,
    }
}
</script>

<style>

</style>