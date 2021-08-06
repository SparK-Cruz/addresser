<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    const DISPLAY_PER_PAGE = 50;

    private static $properties = [
        'zip_code' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'neighborhood' => 'sometimes',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::latest()->paginate(self::DISPLAY_PER_PAGE);
        $page = request()->input('page', 1);
        $offset = ($page - 1) * self::DISPLAY_PER_PAGE;

        return view('addresses.index', ['addresses' => $addresses])
            ->with('i', $offset);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(self::$properties);

        // Only accepting attributes we validated
        Address::create($request->all(array_keys(self::$properties)));

        // TODO: Use translated strings for messages
        return redirect()->route('addresses.index')
            ->with('success', 'Address created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        return view('addresses.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        return view('addresses.edit', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {
        $request->validate(self::$properties);

        $address->update($request->all(array_keys(self::$properties)));

        // TODO: Use translated strings for messages
        return redirect()->route('addresses.index')
            ->with('success', 'Address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        $address->delete();

        // TODO: Use translated strings for messages
        return redirect()->route('addresses.index')
            ->with('success', 'Address deleted!');
    }
}
