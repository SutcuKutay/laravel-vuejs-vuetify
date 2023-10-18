<template>
  <v-img
    class="mx-auto my-6"
    max-width="228"
    src="https://cdn.vuetifyjs.com/docs/images/logos/vuetify-logo-v3-slim-text-light.svg"
  ></v-img>
  <v-divider></v-divider>
  <v-card class="mx-auto mt-8 px-6 py-8" max-width="344">
    <v-form class="px-3">
      <v-text-field label="Email" v-model="email"></v-text-field>
      <v-text-field label="Password" v-model="password"></v-text-field>
      <v-btn color="success" @click="submit">Login</v-btn>
    </v-form>
  </v-card>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    submit() {
      var data = new FormData();
      data.append("email", this.email);
      data.append("password", this.password);
      axios.post("http://127.0.0.1:8000/api/login", data).then((response) => {
        console.log(response);
        if (response.data.status == 200) {
          window.location.replace("http://127.0.0.1:8000/");
          alert(response.data.message);
        } else {
          alert(response.data.message);
        }
      });
    },
  },
};
</script>
