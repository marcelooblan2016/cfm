import './bootstrap';

import {createApp} from 'vue'
import ButtonGoogleDrive from './components/ButtonGoogleDrive.vue';
import CreateDelivery from './components/Deliveries/Create.vue';
const app = createApp({});
// Components Here
app.component('ButtonGoogleDrive', ButtonGoogleDrive)
app.component('CreateDelivery', CreateDelivery);

app.mount('#app');