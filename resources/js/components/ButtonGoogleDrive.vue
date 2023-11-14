<template>
    <div>
        <a :href="actionUrl" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Login to Google Drive
        </a>
    </div>
</template>
<script>
    export default {
        props: {
            actionUrl: {
                type: String,
                require: true,
            }
        },
        setup () {
            //
        },
        created () {
            // 
        }
    }
</script>