<script setup>
defineProps({
    order: {
        type: Object,
        required: true,
    },
    assigning: {
        type: Boolean,
        default: false,
    },
});

defineEmits(['assign']);
</script>

<template>
    <tr class="border-b border-gray-200">
        <td class="px-4 py-3 font-medium">#{{ order.id }}</td>
        <td class="px-4 py-3 text-sm text-gray-600">
            {{ order.pickup_latitude }}, {{ order.pickup_longitude }}
        </td>
        <td class="px-4 py-3">
            <span class="rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800">
                {{ order.status }}
            </span>
        </td>
        <td class="px-4 py-3">
            <button
                type="button"
                class="rounded bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50"
                :disabled="assigning"
                @click="$emit('assign', order.id)"
            >
                {{ assigning ? 'Assigning...' : 'Assign' }}
            </button>
        </td>
    </tr>
</template>
