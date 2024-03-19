<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Order;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;




class CategoryController extends Controller
{
    public function getCategorybyProduct($id)
    {
        $product = Article::find($id);
        $category = $product->category;
        return $category->cat_name;
    }

    public function index()
    {
        $categories=Category::all();
        return view('categories',['categories'=>$categories]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        $request->validated();
        $cat_name=$request->input('cat_name');
        $cat_image=$request->file('cat_image')->getClientOriginalName();

        $Category= new Category();

        $Category->cat_name=$cat_name;
        $Category->cat_image=$cat_image;

        $Category->save();
        $request->file('cat_image')->move(public_path('img'), $cat_image);


       return back()->with('success','You have successfully added an category.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::find($id);
        return view('editCategory')->with('categories', $categories);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryRequest $request, string $id)
    {
        $request->validated();
        $cat_name = $request->input('cat_name');
        $cat_image = '';

        $Category = Category::find($id);


        if ($request->hasFile('cat_image')) {
            $cat_image = $request->file('cat_image')->getClientOriginalName();
            $request->file('cat_image')->move(public_path('img'), $cat_image);
        } else {
            $cat_image = $Category->cat_image;
        }

        $Category->cat_name = $cat_name;
        $Category->cat_image = $cat_image;

        $Category->save();



          return back()->with('successupdate','You have successfully updated a category.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);

        $category->delete();

        return back()->with('successdelete','You have successfully deleted this  category.');
    }
    public function recherche(Request $request){
            $nomProduit=$request->input('nomproduit');
            $resulta=Article::where('Product_name', $nomProduit)->first();


    }



    public function AfficherCategoryAdmin(){
        $categories=Category::all();
        return view('categoryAdmin')->with('categories',$categories);
    }


    public function AfficherCommandesAdmin(){
        $commandes=Order::all();
        return view('CommandesAdmin')->with('commandes',$commandes);

    }
    public function AfficherdetailCommande($id){
        $order=Order::where('id',$id)->first();
        $detailCommande=$order->orderdetail();
        return view('detailCommande')->with('detailCommande',$detailCommande);

    }



    public function email()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'recipientName' => $request->input('recipientName'),
            'recipient_email' => $request->input('recipient_email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        // Envoyer l'e-mail en utilisant la classe Mailable
        Mail::to($data['recipient_email'])->send(new TestMail($data));

        return back()->with('success','Email sent successfully!');
    }
}



