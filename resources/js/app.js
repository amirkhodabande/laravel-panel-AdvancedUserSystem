/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


window.events = new Vue()

window.noty = function (notification) {
    window.events.$emit('notification', notification)
}

window
    .handleErrors = function (error) {
        switch (error.response.status) {
            case 422:
                window.noty({
                    title: "خطا",
                    text: "لطفا در وارد نمودن اطلاعات دقت نمایید.",
                    icon: "error",
                    button: "ادامه!",
                });
                break;
            case 404:
                window.noty({
                    title: "خطا",
                    text: "صفحه مورد نظر یافت نشد, لطفا دوباره امتحان کنید",
                    icon: "error",
                    button: "ادامه!",
                });
                break;

            default:
                window.noty({
                    title: "خطا",
                    text: "مشکلی پیش آمده, لطفا دوباره امتحان نمایید.",
                    icon: "error",
                    button: "ادامه!",
                });
                break;
        }
    }

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("vue-noty", require("./components/Noty.vue").default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('permission-component', require('./components/PermissionComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
