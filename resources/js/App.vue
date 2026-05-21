<script setup>
import ActiveOrdersList from './components/ActiveOrdersList.vue';

defineProps({
    initialOrders: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <ActiveOrdersList :initial-orders="initialOrders" />
</template>
