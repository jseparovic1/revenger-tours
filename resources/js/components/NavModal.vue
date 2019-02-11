<template>
    <div class="fixed pin-t pin-l bg-black w-full h-full overflow-x-hidden z-40">
        <div class="flex justify-center flex-col items-center h-full text-center">
            <ul class="list-reset text-2xl font-semibold text-white flex flex-col">
                <li class="flex"><a class="text-white flex-1 px-5 py-2 hover:bg-black" href="#">TOURS</a></li>
                <li class="flex"><a class="text-white flex-1 px-5 py-2 hover:bg-black" href="#">PRIVATE TOURS</a></li>
                <li class="flex"><a class="text-white flex-1 px-5 py-2 hover:bg-black" href="#">TRANSFERS</a></li>
                <li class="flex"><a class="text-white flex-1 px-5 py-2 hover:bg-black" href="#">CONTACT</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            openModal: function() {
                console.log("I should open a modal!!");
            }
        }
    }
</script>
