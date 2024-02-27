<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function index(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('backend.blog.comment.index');
    }
}
