require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";
import App from "./components/App.vue";
import VueSweetalert2 from "vue-sweetalert2";
// If you don't need the styles, do not connect
import "sweetalert2/dist/sweetalert2.min.css";

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );

import Home from "./components/Home.vue";
import StudentIndex from "./components/Student/StudentIndex.vue";
import StudentCreate from "./components/Student/StudentCreate.vue";
import StudentShow from "./components/Student/StudentShow.vue";
import StudentEdit from "./components/Student/StudentEdit.vue";

import SubjectIndex from "./components/Subject/SubjectIndex.vue";
import SubjectCreate from "./components/Subject/SubjectCreate.vue";
import SubjectShow from "./components/Subject/SubjectShow.vue";
import SubjectEdit from "./components/Subject/SubjectEdit.vue";

// Router
const routes = [
    {
        name: "home",
        path: "/",
        component: Home
    },
    {
        name: "student",
        path: "/student",
        component: StudentIndex
    },
    {
        name: "create",
        path: "/student/create",
        component: StudentCreate
    },
    {
        name: "edit",
        path: "/student/edit/:id",
        component: StudentEdit
    },
    {
        name: "show",
        path: "/student/show/:id",
        component: StudentShow
    },
    {
        name: "subject",
        path: "/subject",
        component: SubjectIndex
    },
    {
        name: "subjectCreate",
        path: "/subject/create",
        component: SubjectCreate
    },
    {
        name: "subjectEdit",
        path: "/subject/edit/:id",
        component: SubjectEdit
    },
    {
        name: "subjectShow",
        path: "/subject/show/:id",
        component: SubjectShow
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");
// const app = new Vue({
//     el: "#app"
// });
