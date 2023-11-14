<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Google\Interfaces\GoogleInterface;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.deliveries.index');
    }

    public function create(Request $request)
    {
        return view('pages.deliveries.create');
    }

    public function store(Request $request)
    {
        dd( $request->all(), "TODO: MIGRATION TABLE FOR DELIVERY, SAVE DELIVERY" );
    }
}