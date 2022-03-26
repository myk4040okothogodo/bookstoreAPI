<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Character;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
  //
  public function fetch()
  {
    $response = Http::get('https://anapioficeandfire.com/api/books');
    $apibooks = json_decode($response->body());
     
    foreach($apibooks as $apibook){
       /*$results = DB::table('books')->where('name',$apibook->name)->value('name');
        //$result = DB::select(select name from books where name=$apibook->name);
       if ($results == 0) {  */
        $book = new Book;
        $book->name = $apibook->name;
        $book->authors = $apibook->authors[0];
        $book->release_date = $apibook->released;
        $book->save();
         
        $characterurls = $apibook->characters;
        foreach ($characterurls as $characterurl){
            
       
            $response1 = Http::get($characterurl);
            $apicharacter = json_decode($response1->body());


            $results = DB::table('characters')->where('name',$apicharacter->name)->value('name');
            //$result = DB::select(select name from characters where name=$apicharacter->name);
            if ($results == 0) {
            $bookcharacter = new Character;
            $bookcharacter->name = $apicharacter->name;
            $bookcharacter->gender = $apicharacter->gender;
            $bookcharacter->age   = (intval($apicharacter->born) - intval($apicharacter->died));
            $bookcharacter->save();

            $book->characters()->attach($bookcharacter);
            } else {
              continue;
            }
        }
      /*  DB::commit();
    
      } catch(Exception $e){
    
      DB::rollback();
        }   
        } else {
            continue;
        
        }
  */
        }
        return "DONE";
        
        
        }
          
  public function showAllBooks()
  {

    $resultbooks = DB::table('books')->orderBy('release_date', 'asc')->get();
    $result = array();
    for ($x = 0; $x <= count($resultbooks)-1; $x++){
        $id = $resultbooks[$x]->id;
        $comments = Book::find($id)->comments;
        //$comments = DB::table('books')->join('comments', $id, '=', 'comments.book_id')->get();
        $resultbooks[$x]->{"comment_count"} = count($comments);
        //$result[$resultbooks[$x]] = count($comments);
    }
    return response()->json($resultbooks);
  } 

  public function showOneBook()
  {
      return response()->json(Book::find($id));
  }

  public function create(Request $request)
  {
      $book = Book::create($request->all());
      return response()->json($author, 201);
  }
    
}
