<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\home_controller;
use App\Http\Controllers\Website\project_controller;
use App\Http\Controllers\Website\blog_controller;
use App\Http\Controllers\Website\static_controller;
use App\Http\Controllers\Website\common_controller;
use App\Http\Controllers\Website\pricing_controller;
use App\Http\Controllers\Website\wishlist_controller;
use App\Http\Controllers\Website\subscribe_controller;
use App\Http\Controllers\Website\contact_controller;
use App\Http\Controllers\Website\traffic_controller;
use App\Http\Controllers\Website\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::GET("/Traffic/Insert",[traffic_controller::class,"Insert"]);

Route::GET("/",[home_controller::class,"index"]);
Route::view('/premium-package', 'website.static.premium');
Route::GET("/blog",[blog_controller::class,"index"]);
Route::POST("/Get/Blogs",[blog_controller::class,"GET"]);
Route::GET("/blog/{URL}",[blog_controller::class,"Detail"]);
Route::GET("/Get/Popular/Blogs",[blog_controller::class,"Get_Popular"]);
Route::GET("/Get/Blog/{URL}/Detail",[blog_controller::class,"Get_Detail"]);
Route::POST("/Blogs/Search",[blog_controller::class,"Search"]);
Route::POST("/Insert/Comment",[blog_controller::class,"Insert"]);

// Common Data
// Route::GET("/Get/Category",[home_controller::class,"Get_Category"]);


// Prejects
Route::GET("/project",[project_controller::class,"index"]);
Route::POST("/Project/Filter",[project_controller::class,"Filter"]);
Route::GET("/project/{URL}",[project_controller::class,"Detail"]);
// Filter Redirect
Route::GET("/project/category/{URL}/{Type}",[project_controller::class,"Category_Redirect"]);
Route::GET("/project/location/{URL}/{Type}",[project_controller::class,"Location_Redirect"]);
Route::GET("/project/keywords/{URL}/{Type}",[project_controller::class,"Keywords_Redirect"]);
Route::GET("/project/category/{CAT_URL}/location/{LOC_URL}/{Type}",[project_controller::class,"Category_And_Location_Redirect"]);
Route::GET("/project/location/{LOC_URL}/keywords/{KEYWORDS}/{Type}",[project_controller::class,"Location_And_Keywords_Redirect"]);
Route::GET("/project/category/{CAT_URL}/keywords/{KEYWORDS}/{Type}",[project_controller::class,"Category_And_Keywords_Redirect"]);
Route::GET("/project/category/{CAT_URL}/location/{LOC_URL}/keywords/{KEYWORDS}/{Type}",[project_controller::class,"Category_And_Location_Keywords_Redirect"]);
Route::GET("/premium",[project_controller::class,"Project_Premium"]);
// WishList
Route::POST("/Wishlist/Insert",[wishlist_controller::class,"Insert"]);

// Chat
Route::GET("/chat/{CODE}",[project_controller::class,"Redirect_To_Chat"]);


// Privacy
Route::view('/privacy', 'website.privacy.index');
Route::view('/term', 'website.privacy.terms');


// Pricing
Route::GET("/pricing",[pricing_controller::class,"index"]);
Route::GET("/plan/{name}",[pricing_controller::class,"plan"]);
Route::GET("/Get/Plan/Card/{plan_id}",[pricing_controller::class,"Get_Plan_Card"]);
Route::POST("/Plan/Buy",[pricing_controller::class,"Plan_Buy"]);


// Common
Route::GET("/Get/Category",[common_controller::class,"Get_Category"]);
Route::GET("/Get/Location",[common_controller::class,"Get_Location"]);


// Static Pages
Route::GET("/about",[static_controller::class,"about"]);
Route::GET("/investor",[static_controller::class,"investor"]);
// Route::GET("/pricing",[static_controller::class,"pricing"]);


// Subscribe
Route::POST("/Subscribe",[subscribe_controller::class,"Insert"]);

// Contact
Route::GET("/contact",[contact_controller::class,"Index"]);
Route::POST("/contact",[contact_controller::class,"Insert"]);

// Static
Route::VIEW("/features","website.feature.index");
Route::VIEW("/capital-raising","website.capital.index");

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
