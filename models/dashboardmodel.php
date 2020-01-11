<?php

require 'models/entities/category.php';
require 'models/entities/comment.php';
require 'models/entities/post.php';
require 'models/entities/user.php';

class dashboardModel extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts()
    {
        // $posts = [];

        // try
        // {
        //     $query = $this->db->connect()->query('
        //     select * from posts
        //     inner join users on posts.user_id = users.user_id
        //     where publish_date < now() and is_public = true
        //     order by publish_date;');
            
            
        //     while($row = $query->fetch()){
        //         $post = new post();
        //         $post->post_id = $row['post_id'];
        //         $post->user_id    = $row['user_id'];
        //         $post->category_id  = $row['category_id'];
        //         $post->publish_date  = $row['publish_date'];
        //         $post->title  = $row['title'];
        //         $post->content  = $row['content'];
        //         $post->is_public  = $row['is_public'];
        //         array_push($posts, $post);
        //     }
            
<<<<<<< HEAD
        //     return $posts;
        // }
        // catch(PDOException $e)
        // {
        //     echo "sql error " . $e.getMessage();
        //     return [];
        // }
=======
            foreach ($posts as $post)
            {
                $post->comments = $this->getCommentsFromPostId($post->post_id);
                $post->user = $this->getUserByUserId($post->user_id);

                foreach ($post->comments as $comment)
                {
                    if ($comment->user_id != null)
                    {
                        $comment->user = $this->getUserByUserId($comment->user_id);
                    }
                }
            }

            var_dump($posts);

            return $posts;
        }
        catch(PDOException $e)
        {
            echo "sql error " . $e.getMessage();
            return [];
        }
>>>>>>> e9d75b6b32f0c525903e8f8fae50c0fe2f8e7a50
    }

    public function getUserByUserId($userId)
    {
        try
        {
            $query = $this->db->connect()->query('
            select * from users
            where user_id = ' . $userId . ';
            ');

            $row = $query->fetch();

            $user = new user();
            $user->user_id = $row['user_id'];
            $user->user_name    = $row['user_name'];
            $user->email  = $row['email'];
            $user->pass  = $row['pass'];
            
            
            return $user;
        }
        catch(PDOException $e)
        {
            echo "sql error " . $e.getMessage();
            return [];
        }
    }

    public function getCommentsFromPostId($postId)
    {
        // $comments = [];

        // try
        // {
        //     $query = $this->db->connect()->query('
        //     select * from comments
        //     where post_id = ' . $postId . ';
        //     ');

        //     while($row = $query->fetch()){
        //         $comment = new comment();
        //         $comment->comment_id = $row['comment_id'];
        //         $comment->user_id    = $row['user_id'];
        //         $comment->post_id  = $row['post_id'];
        //         $comment->comment_text  = $row['comment_text'];
        //         $comment->comment_date  = $row['comment_date'];
        //         array_push($comments, $comment);
        //     }
            
        //     return $comments;
        // }
        // catch(PDOException $e)
        // {
        //     echo "sql error " . $e.getMessage();
        //     return [];
        // }
    }
}

?>