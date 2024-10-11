<?php

namespace App\Http\Controllers\Backend\Knowledge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainKnowledgeBaseController extends Controller
{
    public function index()
    {
        return view('backend.knowledge.index');
    }

    public function manage_groups()
    {
        return view('backend.knowledge.manage_groups');
    }

    public function group_wise_article()
    {
        return view('backend.knowledge.group_wise_article');
    }

    public function single_group_article()
    {
        return view('backend.knowledge.single_group_article');
    }
}
