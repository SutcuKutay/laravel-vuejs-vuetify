<template>
  <v-card max-width="448" class="mx-auto" color="grey-lighten-3">
    <v-layout>
      <v-app-bar color="teal-darken-4" image="https://picsum.photos/1920/1080?random">
        <template v-slot:image>
          <v-img
            gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"
          ></v-img>
        </template>
        <v-img
          class="mx-6 my-6"
          max-width="228"
          src="https://cdn.vuetifyjs.com/docs/images/logos/vuetify-logo-v3-slim-text-light.svg"
        ></v-img>
        <v-spacer></v-spacer>
        <v-btn @click="goToLoginPage"> Login </v-btn>
        <v-btn @click="goToRegisterPage"> Register </v-btn>
      </v-app-bar>
    </v-layout>
  </v-card>
</template>
<script>
export default {
  data() {
    return {};
  },
  methods: {
    goToLoginPage() {
      window.location.href = "http://127.0.0.1:8000/loginPage";
    },
    goToRegisterPage() {
      window.location.href = "http://127.0.0.1:8000/registerPage";
    },
  },
};
</script>
