<?php

use App\Http\Controllers\UserComment;
use Illuminate\Support\Facades\Route;

/* main comments */

Route::post('/About_Me/{user_id}/comment', [UserComment::class, 'store'])->name('comment.store'); // middle auth
Route::get('/About_Me/{user_id}/comments', [UserComment::class, 'showComments'])->name('comments.index');



/* reply comments */

Route::post('/About_Me/{user_id}/reply_comment', [UserComment::class, 'store_reply'])->name('reply_comment.store'); // should be middleware auth


/* report comments */

Route::post('/About_Me', [UserComment::class, 'report_comment'])->name('report_comment');

/* delete comments */

Route::post('/About_Me/delete', [UserComment::class, 'delete_comment'])->name('user_delete_comment');

/* update comments */

Route::post('/About_Me/update/{id}', [UserComment::class, 'update_comment'])->name('user_update_comment');

