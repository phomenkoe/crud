<template>
    <div class="col-12 offset-md-1 col-md-4">
        <Form v-if="dataIsLoaded" :task="task" @save-task="update"/>
    </div>
</template>

<script>

    import TaskApi from './api';
    import Form from './Form';
    import Task from './Task';

    export default {
        name: 'EditTask',
        components: {
            Form
        },
        data() {
            return {
                task: {}
            }
        },
        mounted () {
            this.getTask(this.$route.params?.id);
        },
        computed: {
            dataIsLoaded: function () {
                return Object.keys(this.task).length !== 0;
            }
        },
        methods: {
            async update(task){
                await TaskApi.update(task);
                this.$router.push({name: 'task'});
            },
            getTask(id){
                return TaskApi.edit(id).then(rsp => {
                    this.task = new Task(rsp?.data);
                });
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
