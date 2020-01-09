<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function postDashboard(Request $request)
    {
        $admin_email    = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result         = Admin::where('admin_email', '=', $admin_email)
            ->where('admin_password', '=', $admin_password)->first();

        if ($result) {
            return route('get.admin_dashboard');
        }

        Session::put('message', 'Mật khẩu hoặc tài khoản bị sai, Làm ơn nhập lại');
        return route('get.admin_dashboard');
    }

    public function log_out()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
}
