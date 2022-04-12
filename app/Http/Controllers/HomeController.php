<?php

namespace App\Http\Controllers;

use App\GuestBook;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $guest_books = GuestBook::all();
        return view('home.index', compact(
            'title',
            'guest_books'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add';
        $provinces = Province::orderBy('name', 'ASC')->get();
        return view('home.create', compact(
            'title',
            'provinces'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'organization' => 'required|min:3|max:100',
            'address' => 'required|min:3|max:100',
            'province' => 'required',
            'city' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $guest_book = new GuestBook([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'organization' => $request->organization,
                'address' => $request->address,
                'province_code' => $request->province,
                'city_code' => $request->city,
            ]);
            $guest_book->save();
            return redirect('/')->with('toast_success', 'GuestBook created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
