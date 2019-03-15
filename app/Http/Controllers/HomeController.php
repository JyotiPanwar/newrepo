<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Image\ImageRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new ImageRepository();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $allImages=$this->model->fetchAll();     
      
       return view('home')->with(['allImages'=>$allImages,'user'=>$user]);
    }
}
