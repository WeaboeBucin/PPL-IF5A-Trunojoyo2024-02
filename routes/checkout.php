<?php

use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\KomentarController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\PostinganController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FormRegisterController;
use App\Http\Controllers\GlobalChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\Merchant\CommentController as MerchantCommentController;
use App\Http\Controllers\Merchant\MerchantIndexController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\Merchant\ProfileController as MerchantProfileController;
use App\Http\Controllers\RegisterMerchantController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\CheckoutController;


Route::middleware('auth:user')->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'newCheckout'])->name('checkout');
});
