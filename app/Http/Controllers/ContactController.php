<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class ContactController extends Controller
{
    public $rules = [
        'name' => 'required',
        'phone' => 'required|regex:(^\+{0,1}[0-9]{10,13}$)|min:10|max:14',
        'email' => 'required|email',
        'message' => 'required'
    ];
    
    
    public function store(Request $request)
    {
        $params = $request->only(
            'name',
            'phone',
            'email',
            'message'
        );
        
        $filter = Validator::make($params, $this->rules);
        if($filter->fails()){
            $error = $filter->errors()->toArray();
            return view('contacts', ['input' => $params, 'error' => $error]);
        }
        
        unset($request);

        return redirect('contacts')->with('message', trans('messages.contacts'));
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
