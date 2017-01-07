<?php

namespace cue\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use cue\Card;
use cue\User;
use cue\Category;
use \Auth;
use Carbon\Carbon;

class CardsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index()
  {



    //dd( Auth::user()->id) ;
    //
    // return $user->card->toArray();
    //dd($cards->card()->toArray());

     dd(Auth::user()->card->groupBy('category_id')->toArray());
    // echo "<br>";
    //dd(Auth::user()->category->toArray());

    //dd(Category::find(33)->cards->toArray());

    //dd(Auth::user()->cards->toArray());


    //dd(Card::find(3)->userCard->toArray());

  }

  public function create()
  {
    $categories = Auth::user()->category->pluck('id', 'category_name')->toArray();
    return view('cards.create', compact('categories'));
  }


  

  public function store(Request $request)
  {
    $this->validate($request, [
        'category' => 'required',
        'front'    => 'required',
        'back'     => 'required',
    ]);

    Card::create([
                      'user_id'     => Auth::user()->id,
                      'category_id' => $request->input('category'),
                      'front'       => $request->input('front'),
                      'back'        => $request->input('back'),
                      'known'       => 0,
                      'created_at'  => Carbon::now(),
                      ]);

    return redirect('/')
            ->with([
                'message'    => "Successfully added ",
                'alert-type' => 'success',
              ]);


  }


}
