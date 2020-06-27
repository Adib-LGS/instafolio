<template>
    <div>
        <button class="btn btn-sm btn-primary" @click="followProfile" v-text="follow"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')  
        },

        props: ['profileId', 'follows'],

        data: function () {
            return {
                status: this.follows //Way to Edit follows props
            }
        },

        methods: {

            followProfile() {
                console.log('follow-Me')
                axios.post('/follows/' + this.profileId)
                .then(response => {
                   console.log(response.data)
                   this.status = !this.status //Dynamique Follow Unfollow Btn Changing
                })
                .catch(errors => {
                    if(errors.response.status === 401) {
                        window.location = '/login'
                    }
                })
            }
        },

        computed: {
            follow() {
                console.log('Unfollow-me');
                return (this.status) ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
