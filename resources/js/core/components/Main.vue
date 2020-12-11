<template>
    <transition name="fade" mode="out-in">
        <router-view :key="$route.fullPath"></router-view>
    </transition>
</template>

<script>
    export default {
        name: "Main"
    }
</script>
