<template>
    <div class="col-12 offset-md-1 col-md-10">
        <h3>Список задач</h3>

        <router-link :to="{name: 'task-create'}" class="btn btn-secondary">Создать</router-link>

        <div class="row">
            <table v-if="dataIsLoaded" id="task-list-table" class="table table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Задача</th>
                    <th>Статус</th>
                    <th>Время создания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(task, index) in tasks" :key="task.id">
                    <td>{{index+1}}</td>
                    <td><router-link :to="{name: 'task-edit', params: { id: task.id }}">{{task.name}}</router-link></td>
                    <td>{{task.status_name}}</td>
                    <td>{{task.created_at}}</td>
                    <td><i v-on:click="remove(task.id)" class="fas fa-trash-alt"></i></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <Pagination v-bind:links="links"/>
        </div>

    </div>
</template>

<script>

    import TaskApi from './api';
    import Pagination from './Pagination';

    export default {
        name: 'TaskList',
        components: {
            Pagination
        },
        data() {
            return {
                tasks: {},
                links: []
            }
        },
        mounted () {
            this.getList();
        },
        computed: {
            dataIsLoaded: function () {
                return this.tasks.length > 0;
            }
        },
        methods: {
            getList() {
                return TaskApi.list(this.$route.query).then(rsp => {
                    this.tasks = rsp?.data?.data;
                    this.links = rsp?.data?.links;
                });
            },
            remove(id){
                return TaskApi.remove(id).then(() => {
                    this.getList();
                });
            }
        },
        watch: {
            $route() {
                this.getList();
            }
        }
    }
</script>

<style scoped lang="scss">
    #task-list-table {
        margin-top: 20px;
    }
    .fas {
        font-size: 20px;
    }
    .fa-trash-alt {
        cursor: pointer;
    }
</style>
