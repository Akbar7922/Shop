<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller {
    protected $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function store(Request $request) {
    }
}
