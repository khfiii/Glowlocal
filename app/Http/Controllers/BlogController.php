<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index() {
        return view( 'pages.blog' );
    }

    public function detail() {
        return view( 'pages.detail-blog' );
    }
}
