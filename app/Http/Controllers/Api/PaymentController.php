<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request, Order $order)
    {
        if ($order->user_id !== $request->user()->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        if ($order->status === 'paid') {
            return response()->json(['message' => 'Esta orden ya ha sido pagada'], 400);
        }

        $validated = $request->validate([
            'stripe_payment_id' => 'required|string',
        ]);

        $payment = Payment::create([
            'order_id' => $order->id,
            'stripe_payment_id' => $validated['stripe_payment_id'],
            'amount' => $order->total_amount,
            'currency' => 'usd',
            'status' => 'succeeded',
        ]);

        $order->update(['status' => 'paid']);

        return response()->json([
            'message' => 'Pago procesado exitosamente',
            'payment' => $payment,
            'order' => $order,
        ], 200);
    }
}