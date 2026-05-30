<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function work()
    {
        return view('pages.work');
    }

    public function skills()
    {
        return view('pages.skills');
    }

    public function experience()
    {
        return view('pages.experience');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
