<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;


class CommentController extends Controller
{
  //
  public function showAllComments()
  {
    $resultComments = DB::table('comments')->orderBy('created_at', 'desc');
    //foreach ($resultComments as $resultComment){
     //     $resultComment->content = Str::limit($resultComment->content, 500);
      //}  
    return response()->json($resultComments);
  }
  public function showOneComment($id)
  {
      return resonse()->json(Comment::find($id));
  }
  public function create(Request $request)
  {
      $comment = Comment::create ($request->all());
      return response()->json($comment, 201)
  }

  public function update($id, Request $request)
  {
      $comment = Comment::findOrFail($id);
      $comment->update($request->all());

     return response()->json($author, 200); 
  }

  public function delete($id)
  {
      Comment::findOrFail($id)->delete();
      return response('Deleted Successfully', 200)
  
  }
}
