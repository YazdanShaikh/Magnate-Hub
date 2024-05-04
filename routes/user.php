<?php

use App\Http\Controllers\User\login_controller;
use App\Http\Controllers\User\register_controller;
use App\Http\Controllers\User\dashboard_controller;
use App\Http\Controllers\User\forgot_controller;
use App\Http\Controllers\User\project_controller;
use App\Http\Controllers\User\chat_controller;
use App\Http\Controllers\User\wishlist_controller;
use App\Http\Controllers\User\setting_controller;



// User

// Login
Route::GET("/login",[login_controller::class,"index"]);
Route::POST("/login",[login_controller::class,"Check"]);

// Logout
Route::GET("/logout",[login_controller::class,"logout"]);

// Register
Route::GET("/register",[register_controller::class,"index"]);
Route::POST("/User/Register",[register_controller::class,"Insert"]);

// Verification
Route::GET("/verification/{CODE}",[register_controller::class,"Verification_Page"]);
Route::POST("/Check/Otp",[register_controller::class,"Check"]);

// Resend OTP
Route::POST("/Resend/Otp",[register_controller::class,"Resend"]);

// Forgot
Route::GET("/forgot",[forgot_controller::class,"index"]);
Route::POST("/Find",[forgot_controller::class,"Find"]);
Route::GET("/forgot/verification/{CODE}",[forgot_controller::class,"Verification_Page"]);
Route::POST("/Forgot/Check/Otp",[forgot_controller::class,"Check"]);
Route::GET("/change/password/{CODE}",[forgot_controller::class,"Change_Password_Page"]);
Route::POST("/Forgot/Change/Password",[forgot_controller::class,"Change"]);

// Dashboard
Route::GET("/dashboard/user",[dashboard_controller::class,"index"]);

// Projects
Route::GET("/dashboard/user/project",[project_controller::class,"index"]);
Route::GET("/User/Project/Get/Category",[project_controller::class,"Category"]);
Route::GET("/User/Project/Get/Location",[project_controller::class,"Location"]);
Route::POST("/User/Project/Insert",[project_controller::class,"Insert"]);
Route::POST("/User/Project/Get",[project_controller::class,"Get"]);
Route::POST("/User/Project/Status",[project_controller::class,"Status"]);

// Chat
Route::GET("/dashboard/user/chat",[chat_controller::class,"index"]);
Route::POST("/User/Chat/Insert",[chat_controller::class,"Insert"]);
Route::POST("/User/Chat/List",[chat_controller::class,"List"]);
Route::POST("/User/Chat/Get",[chat_controller::class,"Get"]);
Route::POST("/User/Chat/Check",[chat_controller::class,"Check"]);
Route::POST("/User/Chat/UnRead",[chat_controller::class,"UnRead"]);
Route::GET("/User/Chat/Notification",[chat_controller::class,"Notification"]);
Route::GET("/dashboard/user/chat/{CODE}",[chat_controller::class,"Redirect_On_Chat"]);

// Profile
Route::GET("/dashboard/user/professional/{code}",[chat_controller::class,"raising_profile"]);

// Wishlists
Route::GET("/dashboard/user/wishlist/",[wishlist_controller::class,"Index"]);
Route::POST("/User/Wishlist/Get",[wishlist_controller::class,"Get"]);
Route::POST("/User/Wishlist/Remove",[wishlist_controller::class,"Remove"]);

// Setting
Route::GET("/User/Setting/Get/Location",[setting_controller::class,"Location"]);
Route::GET("/dashboard/user/setting/",[setting_controller::class,"Index"]);
Route::POST("/User/Setting/General",[setting_controller::class,"General"]);
Route::POST("/User/Setting/Password",[setting_controller::class,"Password"]);
Route::POST("/User/Setting/Personal",[setting_controller::class,"Personal"]);
