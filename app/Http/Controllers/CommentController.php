<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->parent_id = 0;

        $comment->user()->associate($request->user());

        $aula = Aula::find($request->aula_id);

        //dd($comment->parent_id);

        $aula->comments()->save($comment);

        return back()
                ->with('message', 'Comentário postado');
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $aula = Aula::find($request->aula_id);

        //dd($aula);

        $aula->comments()->save($reply);

        return back()
                ->with('message', 'Resposta postada');
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        //$comment->delete = 1;
        $comment->user_id = null;
        $comment->comment = "Comentário deletado.";

        //dd($user->avatar);

        $comment->update();

        return redirect()
            ->back()
            ->with('message', 'Comentário deletado com sucesso.');
    }
}
