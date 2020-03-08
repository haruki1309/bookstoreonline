<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getIndex(Request $re){
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;
    	return view('admin\dashboard', compact('can_edit', 'can_delete'));
    }
}
