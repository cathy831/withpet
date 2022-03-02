<?php

namespace App\Http\Controllers;

use App\Image;
// use App\Review;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->image = new Image();
    }
    
    public function index(User $user)
    {
        $images = $this->image->get();
        return view('01.myreview', compact('images'))->with(['own_reviews' => $user->getOwnPaginateByLimit()]);
    }
}
