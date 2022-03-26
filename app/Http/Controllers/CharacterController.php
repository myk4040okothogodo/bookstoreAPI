<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use Illuminate\Support\Facades\Http;


class CharacterController extends Controller
{
  //
  public function showAllCharacters(Request $request)
  {
    
    return response()->json(Character::all());
  }

  public function ShowOneCharacter($id)
  {
      return response()->json(Character::find($id));
  }

  public function create(Request $request)
  {
      $character = Character::create($request->all());
      return response()->json($character, 201);
  }

  public function update($id, Request $request)
  {
      $character = Character::findOrFail($id);
      $character->update($request->all());

      return response()-> json($character, 200);
  }

  public function delete($id)
  {
      Character::findOrFail($id)->delete();
      return response('Deleted Successfully', 200);
  }
  public function showFilteredCharacters(Request $request)
  {
      return Character::filter($request)->get();
  }

  public function sortCharacters(Request $request)
  {
      return Character::sorter($request)->get();
  }
   
}
