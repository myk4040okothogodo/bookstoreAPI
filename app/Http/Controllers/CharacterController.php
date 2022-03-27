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
      $responding = array();
      $ageTotal = 0;
      $characters = Character::all();
      $no_of_hits = count($characters);
      foreach($characters as $character){
          $ageTotal += $character->age;
      }
      $responding["Characters"] = $characters;
      $responding["No_of_matching_characters"] = $no_of_hits;
      $responding["Total_age_of_characters"] = $ageTotal;
      return response()->json($responding);
      
  }

  public function showOneCharacter($id)
  {
      $responding = array(); 
      $character = Character::find($id);
      $ageTotal = $character->age;
      $no_of_hits = count($character);
      $responding["Characters"] = $character;
      $responding["No_of_matching_characters"] = $no_of_hits;
      $responding["Total_age_of_characters"] = $ageTotal;
      return response()->json($responding);
  }


  public function showFilteredCharacters(Request $request)
  {
    $responding = array();
    $ageTotal = 0;
    $characters = Character::filter($request)->get();
    $no_of_hits = count($characters);
    foreach($characters as $character){
        $ageTotal += $character->age;
    }
    $responding["Characters"] = $characters;
    $responding["No_of_matching_characters"] = $no_of_hits;
    $responding["Total_age_of_characters"] = $ageTotal;
    return response()->json($responding);

  }

  public function sortCharacters(Request $request)
  {
      
      $responding = array();
      $ageTotal = 0;
      $characters = Character::sorter($request)->get();
      $no_of_hits = count($characters);
      foreach($characters as $character){
          $ageTotal += $character->age;
      }
      $responding["Characters"] = $characters;
      $responding["No_of_matching_characters"] = $no_of_hits;
      $responding["Total_age_of_characters"] = $ageTotal;
      return response()->json($responding);
  }
   
}
