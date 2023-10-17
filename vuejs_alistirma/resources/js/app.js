import { createApp } from 'vue/dist/vue.esm-bundler.js';
import LoginForm from './components/LoginForm.vue';
import RegisterForm from './components/RegisterForm.vue';
import Appbar from './components/Appbar.vue';
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
});

const app = createApp({
    components: {
        LoginForm,
        RegisterForm,
        Appbar,
    },
});
app.use(vuetify).mount("#app");