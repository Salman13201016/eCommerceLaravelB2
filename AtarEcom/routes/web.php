<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TestCatController;
use App\Http\Controllers\subCatController;
use App\Http\Controllers\productController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('catShow/',[CatController::class,'show'] );
Route::post('add_cat/',[CatController::class,'insert'] );
Route::get('show_edit/{cat_id}',[CatController::class,'showEdit'] );
Route::post('update/',[CatController::class,'update'] );
Route::get('delete/{cat_id}',[CatController::class,'delete'] );
Route::get('/',[FrontController::class,'homepage'] );

Route::resource('testCat', TestCatController::class);

Route::resource('subcat', subCatController::class);

Route::get('product/sel_sub_ajax/{id}',[productController::class,'subCatAjax']);
Route::resource('product', productController::class);



