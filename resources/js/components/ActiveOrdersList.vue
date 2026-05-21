<script setup>
import OrderRow from './OrderRow.vue';
import { useOrders } from '../composables/useOrders';

const props = defineProps({
    initialOrders: {
        type: Array,
        default: () => [],
    },
});

const { orders, assigningId, error, assign } = useOrders(props.initialOrders);
</script>

<template>
    <div class="mx-auto max-w-4xl p-6">
        <h1 class="text-2xl font-semibold text-gray-900">Active Orders</h1>
        <p class="mt-1 text-sm text-gray-600">Pending orders waiting for driver assignment.</p>

        <p v-if="error" class="mt-4 rounded bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ error }}
        </p>

        <div v-if="orders.length === 0" class="mt-6 text-sm text-gray-500">
            No pending orders.
        </div>

        <div v-else class="mt-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
            <table class="min-w-full text-left">
                <thead class="bg-gray-50 text-sm text-gray-600">
                    <tr>
                        <th class="px-4 py-3 font-medium">Order</th>
                        <th class="px-4 py-3 font-medium">Pickup</th>
                        <th class="px-4 py-3 font-medium">Status</th>
                        <th class="px-4 py-3 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <OrderRow
                        v-for="order in orders"
                        :key="order.id"
                        :order="order"
                        :assigning="assigningId === order.id"
                        @assign="assign"
                    />
                </tbody>
            </table>
        </div>
    </div>
</template>
