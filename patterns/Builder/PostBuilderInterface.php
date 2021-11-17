<?php

declare(strict_types=1);

interface PostBuilderInterface
{
    public function create(): void;

    public function setTitle(string $val): PostBuilderInterface;

    public function setCategory(string $val): PostBuilderInterface;

    public function setTags(array $tags): PostBuilderInterface;

    public function setBody(string $val): PostBuilderInterface;

    public function get(): Post;
}