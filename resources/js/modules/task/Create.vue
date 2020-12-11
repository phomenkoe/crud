<template>
    <div class="col-12 offset-md-1 col-md-4">
        <Form :task="task" @save-task="create"/>
    </div>
</template>

<script>

    import TaskApi from './api';
    import Form from './Form';
    import Task from './Task';

    export default {
        name: 'CreateTask',
        components: {
            Form
        },
        data() {
            return {
                task: {}
            }
        },
        mounted () {
            this.task = new Task({});
        },
        methods: {
            async create(task){
                await TaskApi.store(task);
                this.$router.push({name: 'task'});
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
