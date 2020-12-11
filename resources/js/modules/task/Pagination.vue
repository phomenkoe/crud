<template>
    <nav aria-label="Pagination">
        <ul class="pagination">
            <li v-for="(link, index) in links" :key="link.label" class="page-item" v-bind:class="{disabled: link.url == null}">
                <router-link v-bind:to="link.url ? link.url : `#`" class="page-link">
                    <span v-html="link.label"></span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: 'Pagination',
        props: {
            links: Array
        }
    }
</script>

<style scoped lang="scss">
    nav {
        margin: auto;
    }
</style>
