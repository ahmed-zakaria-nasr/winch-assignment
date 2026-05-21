import { ref } from 'vue';
import { assignOrder } from '../api/orders';

export function useOrders(initialOrders = []) {
    const orders = ref([...initialOrders]);
    const assigningId = ref(null);
    const error = ref(null);

    async function assign(orderId) {
        assigningId.value = orderId;
        error.value = null;

        try {
            await assignOrder(orderId);
            orders.value = orders.value.filter((order) => order.id !== orderId);
        } catch (e) {
            error.value = e.message;
        } finally {
            assigningId.value = null;
        }
    }

    return {
        orders,
        assigningId,
        error,
        assign,
    };
}
