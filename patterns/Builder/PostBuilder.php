<?php

declare(strict_types=1);

class PostBuilder implements PostBuilderInterface
{
    private Post $post;

    public function __construct()
    {
        $this->create();
    }

    public function create(): void
    {
        $this->post = new Post();
    }

    public function setTitle(string $val): PostBuilderInterface
    {
        $this->post->title = $val;

        return $this;
    }

    public function setCategory(string $val): PostBuilderInterface
    {
        $this->post->category = $val;

        return $this;
    }

    public function setTags(array $tags): PostBuilderInterface
    {
        $this->post->tags = $tags;

        return $this;
    }

    public function setBody(string $val): PostBuilderInterface
    {
        $this->post->body = $val;

        return $this;
    }

    public function get(): Post
    {
        $result = $this->post;
        $this->create();

        return $result;
    }
}
