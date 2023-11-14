import './bootstrap';

import {createApp} from 'vue'

import Test from './components/Test.vue'

const app = createApp({});
// Components Here
app.component('Test', Test)

app.mount('#app');