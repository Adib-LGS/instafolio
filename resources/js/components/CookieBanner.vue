<!--<template>
    <p :class="isDisplayed ? 'block' : 'hidden' ">By continuing to browse this school project, you consent to our use of cookies to improve your online experience. 
        <a href="https://eur-lex.europa.eu/legal-content/EN/TXT/HTML/?uri=CELEX:32017R1128&ampqid=1595942708334&ampfrom=EN#d1e707-1-1"> Learn More </a>
        <button type="button" @click="handleCookieStorageApproval">OK</button></p>
</template>
    
<style scoped>
    p {
        color: #bab6b8;
        width: 100%;
        position: fixed;
        top: 7rem;
        z-index: 99;
    }
    .hidden {
        display: none;
    }

    .block {
        display: block;
    }
</style>

<script>
import Cookies from 'js-cookie'

export default {

    data() {
        return {
            isDisplayed: false
        }
    },

    methods: {   
        handleCookieStorageApproval() {
            Cookies.set('user_has_agree_to_cookie_storage', 'true', { expires: 10 });
            this.isDisplayed = false
        }
    },

    //check
    mounted() {
        if (Cookies.get('user_has_agree_to_cookie_storage') === undefined) {
            this.isDisplayed = true;
        }
    },

}
</script>-->