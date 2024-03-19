<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\AddArticleRequest;

class CrudArticleController extends Controller
{

    public function home()
    {
          return view('home');
    }

    // public function getProductsByCategorie(Request $rq){
    //     $cat=$rq->route('cat');
    //     $articles=Article::where('category','=',$cat)->paginate(4);
    //     return view('articles', [
    //      'articles' => $articles

    //      ]);
    //   }

    public function create()
    {
        $categories=Category::all();
        // dd($categories);
        return view('AddProd')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleRequest $request)
    {
        $request->validated();
        $Product_name=$request->input('Product_name');
        $Description=$request->input('Description');
        $price=$request->input('price');
        $image=$request->file('image')->getClientOriginalName();
        $category=$request->input('category_id');

        $Article= new Article();

        $Article->Product_name=$Product_name;
        $Article->Description=$Description;
        $Article->price=$price;
        $Article->image=$image;
        $Article->category_id=$category;

        $Article->save();
        $request->file('image')->move(public_path('img'), $image);


       return back()->with('success','You have successfully added an article.');






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
             $article=Article::find($id);
             return view('edit')->with('articles', $article);




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddArticleRequest $request, string $id)
    {
        $request->validated();
        $Product_name=$request->input('Product_name');
        $Description=$request->input('Description');
        $price=$request->input('price');
        $category=$request->input('category');
        $image='';

        $Article=Article::find($id);


         $Article->Product_name=$Product_name;
         $Article->Description=$Description;
         $Article->price=$price;
        //  $Article->category=$category;
         if($request->hasFile('image')) {
            $image=$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('img'), $image);

        }else{
            $image= $Article->image;
        }
         $Article->image=$image;


         $Article->save();



          return back()->with('successupdate','You have successfully updated a product.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


     $Produit=Article::find($id);

     $Produit->delete();

     return back()->with('successdelete','You have successfully deleted a product.');

    }
    public function displayProducts(){
        $articles=Article::
        paginate(6);
        return view('articles')->with('articles',$articles);
    }
}
