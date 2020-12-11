import Vue from "vue";
import VueRouter from "vue-router";

import TaskIndex from "./modules/task/Index"
import TaskCreate from "./modules/task/Create"
import TaskEdit from "./modules/task/Edit"

Vue.use(VueRouter)

const router = new VueRouter({
    routes : [
        {
            path: '/',
            name : 'task',
            component: TaskIndex
        },
        {
            path: '/task',
            name : 'task-page',
            component: TaskIndex
        },
        {
            path: '/task/create',
            name : 'task-create',
            component: TaskCreate
        },
        {
            path: '/task/:id',
            name : 'task-edit',
            component: TaskEdit
        }
    ],
    mode: 'history'
})

Vue.router = router

export default router
