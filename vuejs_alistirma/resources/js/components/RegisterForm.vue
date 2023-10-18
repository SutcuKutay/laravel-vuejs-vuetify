<template>
  <v-img
    class="mx-auto my-6"
    max-width="228"
    src="https://cdn.vuetifyjs.com/docs/images/logos/vuetify-logo-v3-slim-text-light.svg"
  ></v-img>
  <v-divider></v-divider>
  <v-card class="mx-auto mt-8 px-6 py-8" max-width="344">
    <v-form class="px-3">
      <v-text-field label="Name" v-model="name"></v-text-field>
      <v-text-field label="E-Mail" v-model="email"></v-text-field>
      <v-text-field label="Password" v-model="password"></v-text-field>
      <v-btn color="success" @click="post">Register</v-btn>
    </v-form>
  </v-card>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
    };
  },
  methods: {
    post() {
      var page = "http://127.0.0.1:8000/api/createUser";
      axios
        .post(page, {
          name: this.name,
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          console.log(response);
          alert(response.data.message);
        });
    },
  },
};
</script>
