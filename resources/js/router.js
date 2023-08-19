import { createRouter, createWebHistory } from 'vue-router';




import LeadForm from './components/LeadForm.vue';


const routes = [
  {
    path: '/',
    component: LeadForm,
    name: 'home',
  },

  
  
  

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

