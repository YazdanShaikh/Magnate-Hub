<?php

use App\Http\Controllers\Raising\dashboard_controller;
use App\Http\Controllers\Raising\register_controller;
use App\Http\Controllers\Raising\login_controller;
use App\Http\Controllers\Raising\project_controller;
use App\Http\Controllers\Raising\chat_controller;
use App\Http\Controllers\Raising\plan_controller;
use App\Http\Controllers\Raising\setting_controller;
use App\Http\Controllers\Raising\subscribe_controller;
use App\Http\Controllers\Raising\forgot_controller;

// Raising
Route::group(['middleware'=> ['Already_Login','PreventBackHistory']],function () {
    // Register
    Route::GET("/register/raising",[register_controller::class,"index1"]);
    Route::GET("/register/seller",[register_controller::class,"index2"]);
    Route::POST("/Raising/Register",[register_controller::class,"Insert"]);

    // Verification
    Route::GET("/verification/raising/{CODE}",[register_controller::class,"Verification_Page"]);
    Route::POST("/Raising/Check/Otp",[register_controller::class,"Check"]);

    // Resend OTP
    Route::POST("/Raising/Resend/Otp",[register_controller::class,"Resend"]);

    // Login
    Route::GET("/login/professionals/",[login_controller::class,"index"]);
    Route::POST("/Raising/Login",[login_controller::class,"Check"]);

    // Logout
    Route::GET("/professionals/logout",[login_controller::class,"Logout"]);

    // Forgot
    Route::GET("/raising/forgot",[forgot_controller::class,"index"]);
    Route::POST("/Raising/Find",[forgot_controller::class,"Find"]);
    Route::GET("/raising/forgot/verification/{CODE}",[forgot_controller::class,"Verification_Page"]);
    Route::POST("/Raising/Forgot/Check/Otp",[forgot_controller::class,"Check"]);
    Route::GET("/raising/change/password/{CODE}",[forgot_controller::class,"Change_Password_Page"]);
    Route::POST("/Raising/Forgot/Change/Password",[forgot_controller::class,"Change"]);
});

Route::group(['middleware'=> ['login_check','PreventBackHistory']],function () {
    // Dashboard
    Route::GET("/dashboard/professionals/",[dashboard_controller::class,"index"]);

    // Projects
    Route::GET("/dashboard/professionals/project",[project_controller::class,"index"]);
    Route::GET("/dashboard/professionals/project/create",[project_controller::class,"Create"]);
    Route::GET("/Raising/Project/Get/Category",[project_controller::class,"Category"]);
    Route::GET("/Raising/Project/Get/Location",[project_controller::class,"Location"]);
    Route::POST("/Raising/Project/Insert",[project_controller::class,"Insert"]);
    Route::POST("/Raising/Project/Get",[project_controller::class,"Get"]);
    Route::POST("/Raising/Project/Status",[project_controller::class,"Status"]);
    Route::GET("/dashboard/professionals/project/{CODE}/edit",[project_controller::class,"Edit"]);
    Route::POST("/Raising/Project/Update",[project_controller::class,"Update"]);
    Route::POST("/Raising/Project/Premium",[project_controller::class,"Premium"]);
    Route::POST("/Raising/Project/Sold",[project_controller::class,"Sold"]);
    // Image
    Route::GET("/dashboard/professionals/project/{code}/images",[project_controller::class,"Project_Images"]);
    Route::POST("/Project/Raising/Upload/Images",[project_controller::class,"Project_Upload_Images"]);
    Route::POST("/Project/Raising/Get/Images",[project_controller::class,"Project_Get_Images"]);
    Route::POST("/Project/Raising/Delete/Images",[project_controller::class,"Project_Delete_Images"]);


    // Chat
    Route::GET("/dashboard/professionals/chat",[chat_controller::class,"index"]);
    Route::POST("/Raising/Chat/Insert",[chat_controller::class,"Insert"]);
    Route::POST("/Raising/Chat/List",[chat_controller::class,"List"]);
    Route::POST("/Raising/Chat/Get",[chat_controller::class,"Get"]);
    Route::POST("/Raising/Chat/Check",[chat_controller::class,"Check"]);
    Route::POST("/Raising/Chat/UnRead",[chat_controller::class,"UnRead"]);
    Route::GET("/Raising/Chat/Notification",[chat_controller::class,"Notification"]);
    Route::GET("/dashboard/professionals/chat/{CODE}",[chat_controller::class,"Redirect_On_Chat"]);

    // profile
    Route::GET("/dashboard/professionals/user/{code}",[chat_controller::class,"user_profile"]);

    // Plan
    Route::GET("/dashboard/professionals/plan",[plan_controller::class,"index"]);
    Route::POST("/Raising/Plan/Get",[plan_controller::class,"Get"]);

    // Setting
    Route::GET("/dashboard/professionals/setting",[setting_controller::class,"index"]);
    Route::POST("/Raising/Setting/General",[setting_controller::class,"General"]);
    Route::POST("/Raising/Setting/Personal",[setting_controller::class,"Personal"]);
    Route::POST("/Raising/Setting/Password",[setting_controller::class,"Password"]);

});