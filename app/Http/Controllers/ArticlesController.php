<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function home(){
        $latestProducts = $this->getLastThreeProducts();
        return view('HomeClient', ['latestProducts' => $latestProducts]);
       }




    public function Promotion(){
        return view('Promotion');
    }
    // get prod by category
    // public function getProductsByCategory($cat_id){
    //     $category=Category::find($cat_id);
    //     $products=$category->products()->get();
    //     return view('cardArticle', ['products' => $products]);
    // }






        public function getProductsByCategory($cat_id){
            $category=Category::find($cat_id);
            $products=$category->products()->paginate(8);
            return view('cardArticle', ['products' => $products]);
        }

       


        public function getLastThreeProducts(){
            $latestProducts = Article::orderBy('created_at', 'desc')->take(6)->get();
            return $latestProducts;
        }



    public function cataloguepdf(){
        $products = Article::where('solde', 1)->get();

        $data = [

            'products' => $products
        ];

        // Générer le PDF
        $pdf =Pdf::loadView('catalogue',$data);

        // Télécharger le PDF
        return $pdf->stream();


        }


}
