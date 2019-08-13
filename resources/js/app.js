/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

//main
import AccessesWrapper from "./components/accesses/AccessesWrapper";
import GroupsWrapper from "./components/groups/GroupsWrapper";
import CoursesWrapper from "./components/courses/CoursesWrapper";
import UsersWrapper from "./components/users/UsersWrapper";
import ExampleComponent from "./components/ExampleComponent";

//courses
import CoursesIndex from "./components/courses/CourseIndex";
import CoursesCreate from "./components/courses/CoursesCreate";
import CoursesEdit from "./components/courses/CoursesEdit";

import LessonsIndex from "./components/courses/lessons/LessonsIndex";
import LessonsEdit from "./components/courses/lessons/LessonEdit";
import LessonsCreate from "./components/courses/lessons/LessonCreate";

import MaterialIndex from "./components/courses/materials/MaterialIndex";
import MaterialCreate from "./components/courses/materials/MaterialCreate";
import MaterialEdit from "./components/courses/materials/MaterialEdit";




const router = new VueRouter({
    routes: [

        {
            path: '/admin/courses',
            component: CoursesWrapper,
            children: [
                {
                    path: '/',
                    component: CoursesIndex,
                    name: 'indexCourse'
                },
                {
                    path: '/create',
                    component: CoursesCreate,
                    name: 'createCourse'
                },
                {
                    path: '/edit',
                    component: CoursesEdit,
                    name: 'editCourse'
                },
                {
                    path: '/lesson:id',
                    component: LessonsIndex,
                    name: 'indexLesson'
                },
                {
                    path: '/lesson/create:id',
                    component: LessonsCreate,
                    name: 'createLesson'
                },{
                    path: '/lesson/edit:id',
                    component: LessonsEdit,
                    name: 'editLesson'
                },
                {
                    path: '/lesson/material:id',
                    component: MaterialIndex,
                    name: 'indexMaterial'
                },
                {
                    path: '/lesson/material/create:id',
                    component: MaterialCreate,
                    name: 'createMaterial'
                },
                {
                    path: '/lesson/material/edit:id',
                    component: MaterialEdit,
                    name: 'editMaterial'
                },
            ],
        },
        {
            path: '/admin/groups',
            component: GroupsWrapper,
            name: 'wrapperGroup',
            children: [
            ],
        },
        {
            path: '/admin/users',
            component: UsersWrapper,
            name: 'wrapperUser',
            children: [
            ],
        },
        {
            path: '/admin/accesses',
            component: AccessesWrapper,
            name: 'wrapperAccess',
            children: [
            ],
        },
        {path: '/',component: ExampleComponent, name:"index",
            children: [
            ]
        },
    ]
})

const main = new Vue({ router }).$mount('#app');





