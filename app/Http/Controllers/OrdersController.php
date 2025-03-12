<?php

namespace App\Http\Controllers;

use App\Models\Burgers;
use App\Models\Order_items;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->with('burger')->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'burger_id' => 'required|exists:burgers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer le burger
        $burger = Burgers::findOrFail($request->burger_id);

        // Créer la commande
        $order = new Orders();
        $order->user_id = auth()->id();
        $order->status = 'en_attente'; // Utilisez une valeur valide pour le statut
        $order->total_amount = $burger->price * $request->quantity; // Calculer le montant total
        $order->save();

        // Ajouter l'item de commande
        $orderItem = new Order_Items();
        $orderItem->order_id = $order->id;
        $orderItem->burger_id = $burger->id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price = $burger->price; // Vous pouvez également stocker le prix unitaire ici
        $orderItem->save();

        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès!');
    }
    public function placeOrder(Request $request)
    {
        // Validation des données de la commande
        $request->validate([
            'burger_id' => 'required|exists:burgers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer le burger
        $burger = Burgers::findOrFail($request->burger_id);

        // Vérifier la disponibilité du stock
        if ($burger->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Désolé, ce burger est en rupture de stock.');
        }

        // Logique pour passer la commande
        // (par exemple, créer une entrée dans une table de commandes)

        // Réduire le stock
        $burger->stock -= $request->quantity;
        $burger->save();

        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès.');
    }
}
