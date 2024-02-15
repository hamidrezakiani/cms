<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Tests\Controller\Post;
use App\Models\Page;
class languagableController extends Controller
{
    public function index()
    {
        $page = Page::with('languageable')->find(2);
        dd($page->status);
    }
}
