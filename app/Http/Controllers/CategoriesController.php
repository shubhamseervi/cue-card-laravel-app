<?php

namespace cue\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use cue\Category;
use \Auth;
use Carbon\Carbon;
use Validator;

class CategoriesController extends Controller
{

  public function store(Request $request)
  {
    $user = Auth::user()->id;
    $messages = [
    'unique_with' => 'The :attribute field already exist.',
];

    $rules = array(
            'category_name' => "required|unique_with:categories,user_id|max:80",
            'user_id'       => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
         {
           return back()
                  ->withErrors($validator)
                  ->withInput();
         }

   //
  //   $messages = [
  //   'category_name' => 'You already have this category'
  //   ];
   //
  //   $rules = array(
  //       'category_name' => 'required|unique_with:categories,user_id|max:80',
  //       'body'          => 'required',
  //   );
   //
  //   $validator = Validator::make($request->all(), $rules, $messages);
   //
  //  if ($validator->fails())
  //   {
  //         return back()
  //                 ->withErrors($validator)
  //                 ->withInput();
  //   }

    Category::create([
              'user_id'       => Auth::user()->id,
              'category_name' => $request->input('category_name'),
              'created_at'    => Carbon::now(),
              ]);



    return back()->with([
              'message'    => "Category {$request->input('category_name')} successfully added!",
              'alert-type' => 'success',
            ]);
  }



}
