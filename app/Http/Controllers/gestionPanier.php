<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProcessPaiment;
use App\Http\Requests\AddProcessLivraison;
use App\Models\User;
use App\Models\Article;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Payementdetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmation;
use App\Models\OrderConfirmations;


// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;


// namespace App\Http\Controllers;




class gestionPanier extends Controller
{
   public function index(){
       return view('Panier');
   }
   public function Addtocart($id){
    // trouve l'article acvec cet id
       $product=Article::find($id);
    // recupere session cart
       $cart=session()->get('cart');
    //    si session carte est vide
       if(!$cart){
         $cart=[
            $id=>[
                "name"=>$product->Product_name,
                "quantity"=>1,
                 "price"=>$product->price,
                 "image"=>$product->image
            ]
            ];
            session()->put('cart',$cart);
            return redirect()->back()->with('success',"Ajouté aux panier !");
       }
    //    si la seesion existe incrementer
       if (isset($cart[$id])){
          $cart[$id]['quantity']++;
          session()->put('cart',$cart);
          return redirect()->back()->with('success',"Ajouté aux panier !");
       }
       $cart[$id]=[
        "name"=>$product->Product_name,
        "quantity"=>1,
         "price"=>$product->price,
        "image"=>$product->image
       ];
    session()->put('cart',$cart);
    return redirect()->back()->with('success',"Ajouté aux panier !");
}
public function updatec(Request $request)
{
    if($request->id and $request->quantity)
    {
        $cart = session()->get('cart');

        $cart[$request->id]["quantity"] = $request->quantity;

        session()->put('cart', $cart);

        session()->flash('success', 'Cart updated successfully');
    }

}

// delete or remove product of choose in cart
public function removec(Request $request)
{
    if($request->id) {

        $cart = session()->get('cart');

        if(isset($cart[$request->id])) {

            unset($cart[$request->id]);

            session()->put('cart', $cart);
        }

        session()->flash('success', 'Product removed successfully');
    }

}
public function livraison(){
    return view('Livraison-info');
}



public function processForm(AddProcessLivraison $request)
{

    $request->validated();
    $email=$request->input('email');
    $shipping_address=$request->input('shipping_address');
    $shipping_city=$request->input('shipping_city');
    $shipping_postal_code=$request->input('shipping_postal_code');
    $phone_number=$request->input('phone_number');
    $name=$request->input('name');


    $user = User::where('email', $email)->first();

    if ($user) {
        $user->update([
            'shipping_address' => $shipping_address,
            'shipping_city' => $shipping_city,
            'shipping_postal_code' => $shipping_postal_code,
            'phone_number' =>$phone_number,
        ]);


    } else {

        $user = User::create([
            'shipping_address' => $shipping_address,
            'shipping_city' => $shipping_city,
            'shipping_postal_code' => $shipping_postal_code,
            'phone_number' =>$phone_number,
            'name' => $name,
            'role'=>'USER',
            'password'=>'123456789',
            'email' => $email,
        ]);
    }

        Session::put('shipping_info', $request->all());
    return back()->with('successShippement','You have successfully added shippemnt detail.');
}





public function processPaiement(AddProcessPaiment $request){
    if (Session::has('shipping_info')) {
    $shippingInfo = Session::get('shipping_info');

    $request->validated();
    $NumCarte=$request->input('NumCarte');
    $DateExp=$request->input('DateExp');
    $password=$request->input('password');

    $PayementDetail= new PayementDetail();
    $PayementDetail->NumCarte=$NumCarte;
    $PayementDetail->DateExp=$DateExp;
    $PayementDetail->password=$password;
    $user = Auth::user();
    if ($user) {
        $PayementDetail->id_client = $user->id;
    } else {

        return redirect()->route('login')->with('error', 'You need to login to make a payment.');
    }
    $PayementDetail->save();
// création de order
    $order=new Order();
    // $payementDetail = PayementDetail::find($PayementDetail->id_client);
    // $idClient = $user->id;

    $order->id_client=$user->id;
    $order->Adresse_Livraison = $shippingInfo['shipping_address'];
    $order->ville = $shippingInfo['shipping_city'];
    $order->totalPayer = $request->input('prixTotal');
    $order->save();
    // $order->paymentDetails()->save($PayementDetail);
    // Mail::to($request->user())->send(new OrderConfirmation($order));

    }
    return back()->with('successPaiement', 'Formulaire soumis avec succès.');

}


public function validerCommande(Request $request){
    $cartItems = $request->input('cart');

        foreach ($cartItems as $id => $details) {
            $orderDetail = new orderDetail();
            $orderDetail->product_id = $id;
            $orderDetail->product_name=$details['name'];
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->price = $details['price'];
            $orderDetail->save();
        }

    return view('MercideVotreCommande');
}


// public function generateQRCode()
// {
//     // Generate a QR code with custom options
//     $qrCode = QrCode::size(300)
//                     ->backgroundColor(255, 255, 204)
//                     ->generate('Hello, world!');

//     // Return the view with the QR code image
//     return view('qr_code')->with('qrCode', $qrCode);
// }


}

