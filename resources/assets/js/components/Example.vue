<template>
    <div>
        <button @click="redirect" class="btn btn-info">Go to User...</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            redirect() {
                this.$router.push({
                    name: 'userIndex'
                })
            }
        }
    }
</script>
