<template>
    <div class="row">
        <div class="col">
            <form v-on:submit.prevent="save">
                <input type="hidden" v-model="task.id">
                <div class="form-group row">
                    <label for="task-name" class="col-sm-4 col-form-label">Название</label>
                    <div class="col-sm-8">
                        <input type="text" v-model="task.name" class="form-control" id="task-name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="task-desc" class="col-sm-4 col-form-label">Описание</label>
                    <div class="col-sm-8">
                        <textarea v-model="task.description" class="form-control" id="task-desc"></textarea>
                    </div>
                </div>
                <div v-if="task.id" class="form-group row">
                    <label for="task-status" class="col-sm-4 col-form-label">Статус</label>
                    <div class="col-sm-8">
                        <select id="task-status" v-model="task.status" class="form-control">
                            <option
                                v-for="status in statusesList"
                                :value="status.value"
                                :key="status.value"
                                :selected="status.value === task.status ? 'selected' : ''"
                            >{{status.name}}</option>
                        </select>
                    </div>
                </div>
                <div v-if="task.id" class="form-group row">
                    <label class="col-sm-4 col-form-label">Дата создания</label>
                    <div class="col-sm-8">
                        {{task.created_at}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-secondary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Form',
        props: {
            task: Object
        },
        computed: {
            statusesList: function () {
                return [
                    {name: 'Выполняется', value: 'in_work'},
                    {name: 'Приостановлена', value: 'on_pause'},
                    {name: 'Завершена', value: 'finished'},
                ]
            }
        },
        methods: {
            save() {
                this.$emit('save-task', this.task);
            },
        }
    }
</script>
