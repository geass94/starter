<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sandbox;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.dashboard', ['data' => Sandbox::query()->first()]);
    }

    public function media() {
        return view('admin.media.index');
    }

    public function store(Request $request) {
        $model = Sandbox::create(['name' => $request->get('sandbox_name')]);
        $model->media()->attach($request->get('media'));
    }
}
