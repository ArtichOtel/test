<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\Hero\HeroController;
use App\Http\Controllers\API\Link\LinkController;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\User\LoginController;
use App\Http\Controllers\API\Offer\OfferController;
use App\Http\Controllers\API\User\LogoutController;
use App\Http\Controllers\API\Video\VideoController;
use App\Http\Controllers\API\Offer\OffersController;
use App\Http\Controllers\API\Footer\FooterController;
use App\Http\Controllers\API\Review\ReviewController;
use App\Http\Controllers\API\Review\ReviewsController;
use App\Http\Controllers\API\NewInfo\NewInfoController;
use App\Http\Controllers\API\Section\SectionController;
use App\Http\Controllers\API\Advantage\AdvantageController;
use App\Http\Controllers\API\RoomsType\RoomsTypesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// GUESTS routes
Route::get('/sections', SectionController::class);
Route::apiResource('/hero', HeroController::class)->only(['index']);
Route::apiResource('/offers', OfferController::class)->only(['index']);
Route::apiResource('/advantages', AdvantagesController::class)->only(['index']);
Route::apiResource('/news', NewInfosController::class)->only(['index']);
Route::apiResource('/reviews', ReviewController::class)->only(['index']);
Route::apiResource('/room-types', RoomsTypesController::class)->only(['index']);
Route::apiResource('/footers', FooterController::class)->only(['index']);
Route::apiResource('/links', LinkController::class)->only(['index']);

Route::post('/user/login', LoginController::class);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/logout', LogoutController::class);
});




// GOD admin routes
Route::middleware(['auth:sanctum', 'ability:doAnything'])->group(function () {
    Route::apiResource('user', UserController::class);
    Route::apiResource('hero', HeroController::class)->except(['index']);
    Route::apiResource('offer', OfferController::class)->except(['index']);
    Route::apiResource('advantage', AdvantageController::class)->except(['index']);
    Route::apiResource('new', NewInfoController::class)->except(['index']);
    Route::apiResource('video', VideoController::class)->except(['index']);
    //Route::apiResource('review', ReviewController::class)->except(['index']);        // SPRINT 2
    Route::apiResource('footer', FooterController::class)->except(['index']);
    Route::apiResource('link', LinkController::class)->except(['index']);
});


// CUSTOMERS routes
//Route::middleware(['auth:sanctum', 'ability:getReviews'])->group(function () {
    //Route::get('/reviews', ReviewsController::class);
    //Route::apiResource('review', ReviewController::class);        // SPRINT 2
//});
