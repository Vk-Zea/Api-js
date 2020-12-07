require('./bootstrap');

window.Vue = require('vue')

Vue.component('category-main-component', require('./categories/components/CategoryMain.vue').default);
Vue.component('movie-main-component', require('./movie/components/MovieMain.vue').default);
Vue.component('rental-main-component', require('./rental/components/RentalMain.vue').default);
Vue.component('rol-main-component', require('./rol/components/RolMain.vue').default);
Vue.component('status-main-component', require('./status/components/StatusMain.vue').default);
Vue.component('typestatus-main-component', require('./typestatus/components/TypestatusMain.vue').default);
Vue.component('user-main-component', require('./usuarios/components/UsuariosMain.vue').default);

new Vue ({
    el: "#app"
})