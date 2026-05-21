import { createApp } from 'vue';
import App from './App.vue';

const element = document.getElementById('app');
const initialOrders = JSON.parse(element?.dataset.orders ?? '[]');

createApp(App, { initialOrders }).mount('#app');
