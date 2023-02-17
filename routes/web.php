<?php

use App\Http\Controllers\UserController;

//Employee
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\empMaterialController;
use App\Http\Controllers\empWithdrawController;
use App\Http\Controllers\empReturnController;
use App\Http\Controllers\empHistoryController;
use App\Http\Controllers\empTrackController;
use App\Http\Controllers\empSettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WithdrawController;

//Manager
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\mngMaterialController;
use App\Http\Controllers\mngWithdrawController;
use App\Http\Controllers\mngReturnController;
use App\Http\Controllers\mngHistoryController;
use App\Http\Controllers\mngTrackController;
use App\Http\Controllers\mngSettingController;
use App\Http\Controllers\mngApproveController;
use App\Http\Controllers\mngReportController;

//director
use App\Http\Controllers\DirectorController; 
use App\Http\Controllers\dirWithdrawController;
use App\Http\Controllers\dirHistoryController;
use App\Http\Controllers\dirReportController;
use App\Http\Controllers\dirReturnController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\dirApproveController;
use App\Http\Controllers\dirTrackController;
use App\Http\Controllers\dirSettingController;

//spo 
use App\Http\Controllers\spoWithdrawController;
use App\Http\Controllers\spoApproveController;
use App\Http\Controllers\spoCategoryController;
use App\Http\Controllers\spoHistoryController;
use App\Http\Controllers\spoManageController;
use App\Http\Controllers\spoReportController;
use App\Http\Controllers\spoSettingController;
use App\Http\Controllers\spoTrackController;
use App\Http\Controllers\SupplyofficerController;


//admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnMateController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

//middleware jetsteem

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     $users = DB::table('users')->get();
//     return view('dashboard',compact('users'));
// })->name('dashboard');


Route::get('redirects', 'App\Http\Controllers\HomeController@index');
Route::get('empMaterial', 'App\Http\Controllers\empMaterialController@index');



Route::middleware(['auth:sanctum'])->group(function() {

    //Admin
    Route::resource('Admin', AdminController::class);
    // Route::resource('Admin', AdminController::class)->except([
    // 'index' , 'show' , 'create', 'store', 'update', 'destroy' , 'dashboard']);

    Route::resource('Home', HomeController::class);
    //users
    Route::resource('users', UserController::class);
    //profile
    Route::resource('profile', ProfileController::class);
    //material
    Route::resource('materials', MaterialController::class);
    //category
    Route::resource('categories', CategoriesController::class);
     //department
     Route::resource('departments', DepartmentController::class);
    //History
    Route::resource('history', HistoryController::class);
    //Profile
    Route::resource('profile', ProfileController::class);
    //Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::resource('Setting', ProfileController::class);  
    
    //employee
    Route::resource('employee', EmployeeController::class);
    
    Route::resource('empMaterial', empMaterialController::class);

 
    //Cart
    Route::get('cart-index',[MaterialController::class,'cartIndex'])->name('cart.index');
    Route::get('add-to-cart/{id}', [MaterialController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [MaterialController::class, 'updateCart'])->name('update.cart');
    Route::delete('remove-from-cart', [MaterialController::class, 'removeCart'])->name('remove.from.cart');
    Route::get('create/{id}', [MaterialController::class, 'create'])->name('create');


    //employee materials  new
    Route::get('emp-materials',[MaterialController::class,'empMaterials'])->name('emp.materials');
    Route::get('emp-materials.show{id}',[MaterialController::class,'empMaterialsShow'])->name('emp.materials.show');
    Route::get('search',[MaterialController::class,'search'])->name('search');

    Route::resource('withdraw', WithdrawController::class);
    Route::controller(WithdrawController::class)->group(function(){
        
        Route::get('mngWithdraw.index', 'mngWithdrawIndex')->name('mngWithdraw.index');
        Route::get('mngWithdraw.show{withdraw_id}', 'mngWithdrawShow')->name('mngWithdraw.show');
        Route::patch('mngWithdraw.approve{withdraw_id}', 'mngWithdrawApprove')->name('mngWithdraw.approve');
       

    });
    Route::resource('withdraw', WithdrawController::class);
    Route::resource('spoWithdraw', WithdrawController::class);
    Route::controller(WithdrawController::class)->group(function(){
        
        Route::get('spoWithdraw.show{withdraw_id}', 'spoWithdrawShow')->name('spoWithdraw.show');
        Route::patch('spoWithdraw.spoApprove{withdraw_id}', 'spoWithdrawApprove')->name('spoApprove');
        Route::get('spoWithdraw.checkout', 'spoWithdrawCheckout')->name('spoWithdraw.checkout');
        //Route::get('spoWithdraw.checkoutEdit{withdraw_id}', 'spoWithdrawCheckoutEdit')->name('spoWithdraw.checkoutEdit');
        //Route::get('spoWithdraw.checkoutView{withdraw_id}', 'spoWithdrawCheckoutView')->name('spoWithdraw.checkoutView');
        Route::match(['put', 'patch'], 'withdraw.checkUp{withdraw_id}', 'CheckUp')->name('withdraw.checkUp');
        Route::get('spoWithdraw.checkoutShow{withdraw_id}', 'spoWithdrawCheckoutShow')->name('spoWithdraw.checkoutShow');
        Route::get('dirWithdraw.show{withdraw_id}', 'dirWithdrawShow')->name('dirWithdraw.show');

    });
    Route::resource('withdraw', WithdrawController::class);
    Route::resource('dirWithdraw', WithdrawController::class);

    Route::resource('ReturnMate', ReturnMateController::class);
    Route::controller('ReturnMate', ReturnMateController::class)->group(function(){

        Route::get('ReturnMate.indexEmp', 'indexEmp')->name('ReturnMate.indexEmp');
        Route::get('ReturnMate.indexMng', 'indexMng')->name('ReturnMate.indexMng');
        Route::get('ReturnMate.indexSpo', 'indexSpo')->name('ReturnMate.indexSpo');
        Route::get('ReturnMate.indexDir', 'indexDir')->name('ReturnMate.indexDir');

        

    });
     
    Route::controller(UserController::class)->group(function(){

        Route::get('mngSetting.index{user_id}', 'mngSettingIndex')->name('mngSetting.index');
        Route::get('mngSetting.edit{user_id}', 'mngSetting')->name('mngSetting.edit');

    });

    Route::resource('empMaterial', MaterialController::class);
    //Route::get('withDraw', [WithdrawController::class,'index'])->name('withDraw.index'); 
    //Route::get('withDraw-stutus', [WithdrawController::class,'withdraw'])->name('withDraw.stutus');
    //Route::put('send', [WithdrawController::class,'send'])->name('withdraw.send'); 

    //empReturn
    Route::resource('empReturn', empReturnController::class);
    //empHistory
    Route::resource('empHistory', empHistoryController::class);
    //empTrack
    Route::resource('empTrack', empTrackController::class);


    
    //empSetting
    Route::resource('empSetting', ProfileController::class);
    Route::get('empSetting.show', [ProfileController::class, 'empSettingShow'])->name('empSetting.show');
    //mngSetting
    Route::resource('mngSetting', ProfileController::class);
    Route::get('mngSetting.show', [ProfileController::class, 'mngSettingShow'])->name('mngSetting.show');
    //spoSetting
    Route::resource('spoSetting', ProfileController::class); 
    Route::get('spoSetting.show', [ProfileController::class, 'spoSettingShow'])->name('spoSetting.show');
     //dirSetting
    Route::resource('dirSetting', ProfileController::class);    
    Route::get('dirSetting.show', [ProfileController::class, 'dirSettingShow'])->name('dirSetting.show'); 

    Route::resource('Setting', ProfileController::class); 
    Route::get('Setting.show', [ProfileController::class, 'SettingShow'])->name('Setting.show'); 


   

     //manager
     Route::resource('manager', ManagerController::class);
    //  Route::resource('manager', ManagerController::class)->except([
    //     'index' , 'show' , 'create', 'store', 'update', 'destroy' , 'dashboard']);
     //mngMaterial
     Route::resource('mngMaterial', mngMaterialController::class);
     //mngWithdraw
     //Route::resource('mngWithdraw', mngWithdrawController::class);
     //mngReturn
     Route::resource('mngReturn', mngReturnController::class);
     //mngHistory
     Route::resource('mngHistory', mngHistoryController::class);
     //mngTrack
     Route::resource('mngTrack', mngTrackController::class);
     //mngSetting
     Route::resource('mngSetting', ProfileController::class);
     //mngApprove
     Route::resource('mngApprove', mngApproveController::class);
     //mngReport
     Route::resource('mngReport', mngReportController::class);
    
     //director 
     Route::resource('Director', DirectorController::class);
    //  Route::resource('Director', DirectorController::class)->except([
    //     'index' , 'show' , 'create', 'store', 'update', 'destroy' , 'dashboard'
    //  ]);
     Route::resource('dirHistory', dirHistoryController::class);
     Route::resource('dirReport', dirReportController::class); 
     Route::resource('dirReturn', dirReturnController::class);
     Route::resource('dirApprove', dirApproveController::class);
     Route::resource('dirWithdraw', dirWithdrawController::class);
     Route::resource('dirTrack', dirTrackController::class);   
     //Route::resource('dirSetting', ProfileController::class);     

     //spo
     Route::resource('Supplyofficer', SupplyofficerController::class);
     
    //  Route::resource('Supplyofficer', SupplyofficerController::class)->except([
    //     'index' , 'show' , 'create', 'store', 'update', 'destroy' , 'dashboard']);
     
     Route::resource('spoApprove', spoApproveController::class);     
     Route::resource('spoCategory', spoCategoryController::class);  
     Route::resource('spoHistory', spoHistoryController::class);  
     Route::resource('spoManage', spoManageController::class);  
     Route::resource('spoReport', spoReportController::class);  
     Route::resource('spoTrack', spoTrackController::class); 
     Route::get('spoTrack.Track', [spoTrackController::class, 'Track'])->name('spoTrack.Track'); 
     //Route::resource('spoSetting', ProfileController::class);  

    });
   