<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can cancel the order.
     */
    public function cancel(User $user, Order $order)
    {
        return $user->user_id === $order->user_id && in_array($order->status, ['pending', 'confirmed']);
    }   

    /**
     * Determine whether the user can reorder the order.
     */
    public function reorder(User $user, Order $order)
    {
        return $user->user_id === $order->user_id && $order->status === 'canceled';
    }
}
