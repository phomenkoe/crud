<template>
    <div class="app container-fluid">
        <Header />
        <Main />
    </div>
</template>

<script>
    import Header from './core/components/Header'
    import Main from './core/components/Main'

    export default {
        name: 'App',
        components: {
            Header,
            Main
        }
    }
</script>
