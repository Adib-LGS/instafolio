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
                status: this.follows
            }
        },

        methods: {

            followProfile() {
                console.log('follow-Me')
                axios.post('/follows/' + this.profileId)
                .then(response => {
                   console.log(response.data)
                   this.status = !this.status 
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
                if(this.status >= 1){
                    return 'Unfollow'
                } else if(this.status == false) {
                    return 'UnFollow'
                }else{
                    return 'Follow'
                }
                //return (this.status) ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
