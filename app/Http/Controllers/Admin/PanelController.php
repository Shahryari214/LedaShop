<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PanelController extends Controller
{
    public function index()
    {
        //dd(auth()->user()->hasrole('admin'));کاربر نقش manager دارد
        //dd(auth()->user()->hasrole(Permission::whereName('add-product')->first()->roles));
        return view('admin.panel');
    }
}
