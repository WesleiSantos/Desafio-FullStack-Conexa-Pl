<?php

use CComponent;

class Helper extends CComponent
{
    public function init()
    {
    }
    public function createPostModel(object $post, array $categories, array $users): Post
    {
        $data = new Post();
        $data->attributes = get_object_vars($post);
        $data->image = $post->image;

        $id = $post->categoryId;
        $data->category = array_reduce($categories, function ($foundCategory, $category) use ($id) {
            return $foundCategory ?: ($category->id == $id ? $category : null);
        });

        $userId = $post->userId;
        $data->user = array_reduce($users, function ($foundUser, $user) use ($userId) {
            return $foundUser ?: ($user->id == $userId ? $user : null);
        });

        return $data;
    }

    public function createCommentModel(object $comment, array $users): Comment
    {
        $data = new Comment();
        $data->attributes = get_object_vars($comment);

        $userId = $comment->userId;
        $data->user = array_reduce($users, function ($foundUser, $user) use ($userId) {
            return $foundUser ?: ($user->id == $userId ? $user : null);
        });

        return $data;
    }
}
