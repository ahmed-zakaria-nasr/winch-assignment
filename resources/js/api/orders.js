export async function assignOrder(orderId) {
    const response = await fetch(`/api/orders/${orderId}/assign`, {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
        },
    });

    const body = await response.json().catch(() => ({}));

    if (!response.ok) {
        throw new Error(body.message ?? 'Failed to assign order.');
    }

    return body;
}
