<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CrudArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\gestionPanier;
use App\Models\User;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider, and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [\App\Http\Controllers\ArticlesController::class, 'home']);

Route::middleware(['adminuser'])->group(function () {
Route::get('/produits/create',[CrudArticleController::class,'create'])->name('create');
Route::put('/produits/{id}', [CrudArticleController::class,'update']);
Route::delete('/produits/{id}', [CrudArticleController::class,'destroy'])->name('destroy');
Route::get('/produits/{id}/edit', [CrudArticleController::class,'edit'])->name('edit');
Route::post('/produits', [CrudArticleController::class,'store'])->name('store');
Route::get('/home', [CrudArticleController::class,'home']);
// Route::get('/produits/{cat}', [\App\Http\Controllers\CrudArticleController::class, 'getProductsByCategorie']);

});
Route::get('/produits/display', [CrudArticleController::class,'displayProducts']);



// articles/produits
Route::get('/Promotion', [ArticlesController::class,'Promotion'])->middleware('useruser');
Route::get('/catalogue', [ArticlesController::class,'cataloguepdf'])->middleware('useruser');
Route::get('/categories/{cat_Id}/products', [ArticlesController::class, 'getProductsByCategory']);


// categoryyyy
Route::get('/categories/{id}/products', [CategoryController::class, 'getCategorybyProduct']);
Route::get('/categories/Admin', [CategoryController::class, 'AfficherCategoryAdmin']);

Route::resource('categories', CategoryController::class);
Route::delete('/articles/{id}', [ArticleController::class,'destroy'])->name('destroy');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('create');
Route::get('/CommandesAdmin', [CategoryController::class, 'AfficherCommandesAdmin']);
Route::get('/detailCommande/{id}', [CategoryController::class, 'AfficherdetailCommande']);

Route::get('/email', [CategoryController::class,'email']);
Route::post('/send/email', [CategoryController::class, 'sendEmail'])->name('send.email');

// a revoire apres
// Route::get('/generate-qr-code', [CategoryController::class, 'generateQRCode']);





Auth::routes();


// routage panier

Route::get('/panier',[gestionPanier::class,'index']);
Route::get('/panier/addc/{id}',[gestionPanier::class,'Addtocart']);

Route::patch('update-cart', [gestionPanier::class,'updatec']);

Route::delete('remove-from-cart', [gestionPanier::class,'removec']);

Route::get('/livraison',[gestionPanier::class,'livraison']);
Route::post('/processForm', [gestionPanier::class, 'processForm']);
Route::post('/processPaiement', [gestionPanier::class, 'processPaiement']);

Route::post('/validerCommande', [gestionPanier::class, 'validerCommande']);
// Route::get('/recherche',[CategoryController::class,'recherche']);








