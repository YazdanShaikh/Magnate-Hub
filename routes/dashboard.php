<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\login_controller;
use App\Http\Controllers\Dashboard\home_controller;
use App\Http\Controllers\Dashboard\account_controller;
use App\Http\Controllers\Dashboard\profile_controller;
use App\Http\Controllers\Dashboard\forgot_controller;
use App\Http\Controllers\Dashboard\category_controller;
use App\Http\Controllers\Dashboard\location_controller;
use App\Http\Controllers\Dashboard\image_controller;
use App\Http\Controllers\Dashboard\blog_controller;
use App\Http\Controllers\Dashboard\project_controller;
use App\Http\Controllers\Dashboard\user_controller;
use App\Http\Controllers\Dashboard\plan_controller;
use App\Http\Controllers\Dashboard\raising_controller;
use App\Http\Controllers\Dashboard\contact_controller;
use App\Http\Controllers\Dashboard\traffic_controller;
use App\Http\Controllers\Dashboard\subscriber_controller;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Dashboard" middleware group. Now create something great!
|
*/

// Check Login
Route::GET("/Check/Session",[login_controller::class,"Check_Session"]);


Route::GET("/dashboard/login",[login_controller::class,"login_page"]);
Route::POST("/dashboard/login",[login_controller::class,"login_check"]);
Route::GET("/otp/verification/{code}",[login_controller::class,"otp_verification_page"]);
Route::POST("/resend-otp/",[login_controller::class,"resend_otp"]);
Route::POST("/otp-verification/",[login_controller::class,"otp_verification"]);
Route::GET("/dashboard/logout",[login_controller::class,"logout"]);
Route::GET("/dashboard/home",[home_controller::class,"index"]);

// Account
Route::GET("/dashboard/account",[account_controller::class,"index"]);
Route::POST("/Account/Get",[account_controller::class,"Get"]);
Route::POST("/Account/Insert",[account_controller::class,"Insert"]);
Route::POST("/Account/Status",[account_controller::class,"Status"]);
Route::POST("/Account/Delete",[account_controller::class,"Delete"]);
Route::GET("/dashboard/account/{code}/edit",[account_controller::class,"Edit"]);
Route::POST("/Account/Update",[account_controller::class,"Update"]);

// Profile
Route::GET("/dashboard/profile",[profile_controller::class,"index"]);
Route::POST("/Profile/Update/Name",[profile_controller::class,"Name"]);
Route::POST("/Profile/Update/Email",[profile_controller::class,"Email"]);
Route::POST("/Profile/Update/Password",[profile_controller::class,"Password"]);

// Forgot
Route::GET("/dashboard/forgot",[forgot_controller::class,"index"]);
Route::POST("/dashboard/Find",[forgot_controller::class,"Find"]);
Route::GET("/dashboard/email/verification/{code}",[forgot_controller::class,"Verification"]);
Route::POST("/dashboard/verified",[forgot_controller::class,"Verified"]);
Route::GET("/dashboard/change/password/{code}",[forgot_controller::class,"Change"]);
Route::POST("/dashboard/change/password",[forgot_controller::class,"Change_Password"]);

// Category
Route::GET("/dashboard/category",[category_controller::class,"index"]);
Route::POST("/Category/Get",[category_controller::class,"Get"]);
Route::POST("/Category/Insert",[category_controller::class,"Insert"]);
Route::POST("/Category/Delete",[category_controller::class,"Delete"]);
Route::GET("/dashboard/category/{code}/edit",[category_controller::class,"Edit"]);
Route::POST("/Category/Update",[category_controller::class,"Update"]);
Route::POST("/Category/Status",[category_controller::class,"Status"]);

// Locations
Route::GET("/dashboard/location",[location_controller::class,"index"]);
Route::GET("/Location/Category",[location_controller::class,"Category"]);
Route::POST("/Location/Get",[location_controller::class,"Get"]);
Route::POST("/Location/Insert",[location_controller::class,"Insert"]);
Route::POST("/Location/Delete",[location_controller::class,"Delete"]);
Route::GET("/dashboard/location/{code}/edit",[location_controller::class,"Edit"]);
Route::POST("/Location/Update",[location_controller::class,"Update"]);
Route::POST("/Location/Status",[location_controller::class,"Status"]);

// Image
Route::GET("/dashboard/image",[image_controller::class,"index"]);
Route::GET("/Image/Get",[image_controller::class,"Get"]);
Route::POST("/Image/Insert",[image_controller::class,"Insert"]);
Route::POST("/Image/Delete",[image_controller::class,"Delete"]);

// Blog
Route::GET("/dashboard/blog",[blog_controller::class,"index"]);
Route::POST("/Blog/Get",[blog_controller::class,"Get"]);
Route::POST("/Blog/Insert",[blog_controller::class,"Insert"]);
Route::POST("/Blog/Delete",[blog_controller::class,"Delete"]);
Route::GET("/dashboard/blog/{code}/edit",[blog_controller::class,"Edit"]);
Route::POST("/Blog/Update",[blog_controller::class,"Update"]);
Route::POST("/Blog/Status",[blog_controller::class,"Status"]);
Route::GET("/dashboard/blog/{code}/write",[blog_controller::class,"Write"]);
Route::GET("/Blog/Get/Image",[blog_controller::class,"Get_Image"]);
Route::POST("/Blog/Save",[blog_controller::class,"Save"]);

// Projects
Route::GET("/dashboard/project",[project_controller::class,"index"]);
Route::GET("/Project/Get/Category",[project_controller::class,"Category"]);
Route::GET("/Project/Get/Location",[project_controller::class,"Location"]);
Route::POST("/Project/Get",[project_controller::class,"Get"]);
Route::POST("/Project/Insert",[project_controller::class,"Insert"]);
// Route::POST("/Project/Delete",[project_controller::class,"Delete"]);
Route::GET("/dashboard/project/{code}/edit",[project_controller::class,"Edit"]);
Route::POST("/Project/Update",[project_controller::class,"Update"]);
Route::POST("/Project/Status",[project_controller::class,"Status"]);
Route::POST("/Project/Ban",[project_controller::class,"Ban"]);
// Image
Route::GET("/dashboard/project/{code}/images",[project_controller::class,"Project_Images"]);
Route::POST("/Project/Upload/Images",[project_controller::class,"Project_Upload_Images"]);
Route::POST("/Project/Get/Images",[project_controller::class,"Project_Get_Images"]);
Route::POST("/Project/Delete/Images",[project_controller::class,"Project_Delete_Images"]);


// Users
Route::GET("/dashboard/users",[user_controller::class,"index"]);
Route::POST("/User/Get",[user_controller::class,"Get"]);
Route::POST("/User/Delete",[user_controller::class,"Delete"]);
Route::POST("/User/Status",[user_controller::class,"Status"]);

// Subscribers
Route::GET("/dashboard/subscriber",[subscriber_controller::class,"index"]);
Route::POST("/Subscriber/Get",[subscriber_controller::class,"Get"]);
Route::POST("/Subscriber/Delete",[subscriber_controller::class,"Delete"]);

// Plans
Route::GET("/dashboard/plan",[plan_controller::class,"index"]);
Route::POST("/Plan/Get",[plan_controller::class,"Get"]);
Route::POST("/Plan/Delete",[plan_controller::class,"Delete"]);
Route::POST("/Plan/Status",[plan_controller::class,"Status"]);

// Raising
Route::GET("/dashboard/raiser",[raising_controller::class,"index"]);
Route::POST("/Raising/Get",[raising_controller::class,"Get"]);
Route::POST("/Raising/Delete",[raising_controller::class,"Delete"]);
Route::POST("/Raising/Status",[raising_controller::class,"Status"]);
Route::GET("/dashboard/raiser/{code}/info",[raising_controller::class,"Info"]);

// Contact
Route::GET("/dashboard/contact",[contact_controller::class,"index"]);
Route::POST("/Contact/Get",[contact_controller::class,"Get"]);
Route::POST("/Contact/Read",[contact_controller::class,"Read"]);
Route::POST("/Contact/Delete",[contact_controller::class,"Delete"]);


// Traffic
Route::GET("/dashboard/traffic/date",[traffic_controller::class,"index_date"]);
Route::GET("/dashboard/traffic/date/{date}",[traffic_controller::class,"Redirect_date"]);
Route::POST("/Traffic/Get/Date",[traffic_controller::class,"Date"]);

Route::GET("/dashboard/traffic/day",[traffic_controller::class,"index_day"]);
Route::GET("/dashboard/traffic/day/{MONTH}/{YEAR}",[traffic_controller::class,"Redirect_day"]);
Route::POST("/Traffic/Get/Day",[traffic_controller::class,"Day"]);

Route::GET("/dashboard/traffic/month",[traffic_controller::class,"index_month"]);
Route::GET("/dashboard/traffic/month/{YEAR}",[traffic_controller::class,"Redirect_month"]);
Route::POST("/Traffic/Get/Month",[traffic_controller::class,"Month"]);

Route::GET("/dashboard/traffic/year",[traffic_controller::class,"index_year"]);
Route::POST("/Traffic/Get/Year",[traffic_controller::class,"Year"]);

Route::GET("/dashboard/traffic/country",[traffic_controller::class,"index_country"]);
Route::POST("/Traffic/Get/Country",[traffic_controller::class,"Country"]);

Route::GET("/dashboard/traffic/city",[traffic_controller::class,"index_city"]);
Route::GET("/dashboard/traffic/city/{COUNTRY}",[traffic_controller::class,"Redirect_city"]);
Route::POST("/Traffic/Get/City",[traffic_controller::class,"City"]);

Route::GET("/dashboard/traffic/city/{CITY}/{COUNTRY}",[traffic_controller::class,"index_city_and_country"]);
Route::GET("/Get/City/{country}",[traffic_controller::class,"Get_City"]);
Route::POST("/Traffic/Get/City/And/Country",[traffic_controller::class,"City_And_Country"]);
