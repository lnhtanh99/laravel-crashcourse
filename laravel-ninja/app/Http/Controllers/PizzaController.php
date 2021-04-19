<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    //second way to protecting route -> using construct methods in controller
    //use this way to protect all routes in this controller
    //if you want to execpt some route, add except methods
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'create']);
    }

    public function index()
    {
        //get data from database and pass it as an array into the view
        //get all data
        $pizzas = Pizza::all();
        //get all data with order
        // $pizzas = Pizza::orderBy('name')->get();
        //get data with query
        // $pizzas = Pizza::where('type','hawaiian')->get();
        return view('pizzas.index', [
            "pizzas" => $pizzas,
            //query parameters->link có tham số và giá trị tham số 
            // VD: /pizzas?name=hanzo&age=30
            "name" => request('name'),
            "age" => request('age'),
        ]);
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store()
    {
        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
