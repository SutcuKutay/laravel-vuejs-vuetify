<template>
    <v-img class="mx-auto my-6" max-width="228"
        src="https://cdn.vuetifyjs.com/docs/images/logos/vuetify-logo-v3-slim-text-light.svg"></v-img>
    <v-divider></v-divider>
    <v-card class="mx-auto mt-8 px-6 py-8" max-width="344">
        <v-form class="px-3">
            <input type="hidden" name="_token" :value="csrf">
            <v-text-field label="Name" v-model="name"></v-text-field>
            <v-text-field label="Password" v-model="password"></v-text-field>
            <v-btn color="success" @click="submit">Login</v-btn>
        </v-form>
    </v-card>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            name: '',
            password: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        submit() {
            var page = "http://127.0.0.1:8000/api/login";
            // axios.get(page).then((response) => {
            //     console.log(response.data);
            //     response.data.forEach((user) => {
            //         if (this.name == user.name && this.password == user.password) {
            //             // sessionStorage.setItem("username", this.name);
            //             window.location.replace("http://127.0.0.1:8000/");
            //         }
            //     });
            // });
            axios.post(page, {
                name: this.name,
                password: this.password,
            }).then((response) => {
                console.log(response);
                alert(response.data.message);
            });
        },
    },
};
</script>