<?php

use Slim\App;
use Core\Models\Post;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
         $args['posts'] = Post::orderBy('id', 'desc')->get();
        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->get('/posts', function ($request, $response, $args) {

        $posts = Post::all();
        $payload = [];
        foreach($posts as $post){
            $payload[] = [
                'id'          => $post->id,
                'title'       => $post->title,
                'content'     => $post->content,
                'created_at'  => $post->created_at
                                    
            ];
        }

        return $response->withStatus(200)->withJson($payload);

    });

    $app->get('/rate/{post_id}', function ($request, $response, $args) {

        // $post = Post::find(1);

        // $post->rates()->create(['post_id' => $args['post_id'], 'user_id' => 1, 'rate' => 4]);
        Rate::create(['post_id' => $args['post_id'], 'user_id' => 1, 'rate' => 4]);
        // $_message = new Message();
        // $messages = $_message->all();
        // $payload = [];
        // foreach($messages as $msg){
        //     $payload[$msg->id] = [
        //         'body'        => $msg->user_id,
        //         'user_id'     => $msg->user_id,
        //         'created_at'  => $msg->created_at
                                    
        //     ];
        // }

        // $data = ['post' => $post->toArray(), 'rate' => $post->rates->count()];
        return $response->withStatus(200);

    });
};
