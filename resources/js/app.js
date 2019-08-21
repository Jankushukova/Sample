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

//users

import UserIndex from "./components/users/UserIndex";
import UserEdit from "./components/users/UserEdit";
import UserCreate from "./components/users/UserCreate";

//access

import AccessIndex from "./components/accesses/AccessIndex";
import StudentIndex from "./components/accesses/students/StudentIndex";
import TeacherIndex from "./components/accesses/teachers/TeacherIndex";

const router = new VueRouter({
    routes: [

        {
            path: '/admin/courses',
            component: CoursesWrapper,
            children: [
                {
                    path: '/admin/courses/',
                    component: CoursesIndex,
                    name: 'indexCourse'
                },
                {
                    path: '/admin/courses/create',
                    component: CoursesCreate,
                    name: 'createCourse'
                },
                {
                    path: '/admin/courses/edit',
                    component: CoursesEdit,
                    name: 'editCourse'
                },
                {
                    path: '/admin/courses/lesson:id',
                    component: LessonsIndex,
                    name: 'indexLesson'
                },
                {
                    path: '/admin/courses/lesson/create:id',
                    component: LessonsCreate,
                    name: 'createLesson'
                },{
                    path: '/admin/courses/lesson/edit:id',
                    component: LessonsEdit,
                    name: 'editLesson'
                },
                {
                    path: '/admin/courses/lesson/material:id',
                    component: MaterialIndex,
                    name: 'indexMaterial'
                },
                {
                    path: '/admin/courses/lesson/material/create:id',
                    component: MaterialCreate,
                    name: 'createMaterial'
                },
                {
                    path: '/admin/courses/lesson/material/edit:id',
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
            children: [
                {
                    path: '/admin/users/',
                    component: UserIndex,
                    name: 'indexUser'
                },
                {
                    path: '/admin/users/create',
                    component: UserCreate,
                    name: 'createUser'
                },
                {
                    path: '/admin/users/edit',
                    component: UserEdit,
                    name: 'editUser'
                },
            ],
        },
        {
            path: '/admin/accesses',
            component: AccessesWrapper,
            name: 'wrapperAccess',
            children: [
                {
                    path: '/admin/accesses/',
                    component: AccessIndex,
                    name: 'indexAccess'
                },
                {
                    path: '/admin/accesses/students',
                    component: StudentIndex,
                    name: 'studentAccessIndex'
                },
                {
                    path: '/admin/accesses/teachers',
                    component: TeacherIndex,
                    name: 'teacherAccessIndex'
                },
            ],
        },
        {path: '/',component: ExampleComponent, name:"index",
            children: [
            ]
        },
    ]
})

const main = new Vue({ router }).$mount('#app');





