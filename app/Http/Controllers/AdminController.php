<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    
    
    public function index()
    {
        return view('admin.admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        //
    }
}
