<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Users\AdminUsers\AdminUserController;
use App\Http\Controllers\Admin\Users\CustomerUsers\CustomerUserController;
use App\Http\Controllers\Admin\Content\CategoryController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Advertising\AdsController;
use App\Http\Controllers\Admin\Advertising\GalleryController;
use App\Http\Controllers\Admin\Advertising\SlideShowController;
use App\Http\Controllers\Admin\Advertising\AdsCategoryController;
use App\Http\Controllers\Admin\Users\PermissionsController;
use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\RoleHasPermissionController;
use App\Http\Controllers\Admin\Users\ModelHasRoleController;
use App\Http\Controllers\Admin\Users\ModelHasPermissionController;

Route::prefix('admin')->group(function () {
    //admin-dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //users
    Route::prefix('users')->group(function () {
        //admin_user
        Route::get('admin_user/status/{user}', [AdminUserController::class, 'status'])->name('admin_user.status');
        Route::resource('admin_user', AdminUserController::class);

        //roles
        Route::get('roles/status/{role}', [RoleController::class, 'status'])->name('roles.status');
        Route::resource('roles', RoleController::class)->except('show');

        //permissions
        Route::get('permissions/status/{permission}', [PermissionsController::class, 'status'])->name('permissions.status');
        Route::resource('permissions', PermissionsController::class)->except('show');

        //role_has_permission
        Route::get('role_has_permission/createPermissionToRole/{role}', [RoleHasPermissionController::class, 'create'])->name('role_has_permission.create');
        Route::get('role_has_permission/givPermissionToRole/{role}', [RoleHasPermissionController::class, 'givPermissionToRole'])->name('role_has_permission.givPermissionToRole');

        //model_has_role
        Route::get('model_has_role/giveRole/{user}', [ModelHasRoleController::class, 'create'])->name('model_has_role.create');
        Route::get('model_has_role/givRoleToAdmin/{user}', [ModelHasRoleController::class, 'givRoleToAdmin'])->name('model_has_role.givRoleToAdmin');

        //model_has_permission
        Route::get('model_has_permission/createPermissionToAdmin/{user}', [ModelHasPermissionController::class, 'create'])->name('model_has_permission.create');
        Route::get('model_has_permission/givPermissionToAdmin/{user}', [ModelHasPermissionController::class, 'givPermissionToAdmin'])->name('model_has_permission.givPermissionToAdmin');

        //customer_user
        Route::get('customer_user/status/{user}', [CustomerUserController::class, 'status'])->name('customer_user.status');
        Route::resource('customer_user', CustomerUserController::class)->except(['edit','update']);


    });

    //content
    Route::prefix('content')->group(function () {
        //categories
        Route::get('postCategories/status/{postCategory}', [CategoryController::class, 'status'])->name('postCategories.status');
        Route::resource('postCategories', CategoryController::class)->except('show');

        //posts
        Route::get('posts/status/{post}', [PostController::class, 'status'])->name('post.status');
        Route::get('posts/commentable/{post}', [PostController::class, 'commentable'])->name('post.commentable');
        Route::resource('posts', PostController::class)->except('show');

        //comments
        Route::prefix('comment')->group(function(){
            Route::get('/', [ContentCommentController::class, 'index'])->name('content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('content.comment.show');
            Route::delete('/destroy/{comment}', [ContentCommentController::class, 'destroy'])->name('content.comment.destroy');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'])->name('content.comment.approved');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('content.comment.status');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('content.comment.answer');
        });

    });

    //advertising
    Route::prefix('advertising')->group(function () {
        //ads
        Route::get('ads/status/{ads}', [AdsController::class, 'status'])->name('ads.status');
        Route::resource('ads', AdsController::class)->except('show');

        //galleries
        Route::get('ads/gallery/{ad}', [GalleryController::class, 'gallery'])->name('ads.gallery');
        Route::post('ads/store-gallery-image/{ad}', [GalleryController::class, 'storeGalleryImage'])->name('ads.store_gallery_image');
        Route::get('ads/delete-gallery-image/{gallery}', [GalleryController::class, 'deleteGalleryImage'])->name('ads.delete_gallery_image');

        //slide_show
        Route::get('slide_show/status/{slide_show}', [SlideShowController::class, 'status'])->name('slide_show.status');
        Route::resource('slide_show', SlideShowController::class);

        //categories
        Route::get('ads_categories/status/{ads_category}', [AdsCategoryController::class, 'status'])->name('postCategories.status');
        Route::resource('ads_categories', AdsCategoryController::class)->except('show');


    });

});
