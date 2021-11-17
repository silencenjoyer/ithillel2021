<?php

declare(strict_types=1);

class PostDirector
{
    private PostBuilderInterface $builder;

    public function setBuilder($builder): PostDirector
    {
        $this->builder = $builder;

        return $this;
    }

    public function createCleanPost()
    {
        return $this->builder->get();
    }

    public function createPostDogs(): Post
    {
        return $this->builder
            ->setTitle('Post About Dogs')
            ->setCategory('Dogs')
            ->setTags(['Dogs', 'Pets', 'Animals'])
            ->setBody('Some post about dogs, it is very interesting...')
            ->get();
    }

    public function createPostCars(): Post
    {
        return $this->builder
            ->setTitle('Post About Cars')
            ->setCategory('Cars')
            ->setTags(['Cars', 'Auto', 'Transport'])
            ->setBody('Some post about cars, it is very interesting story...')
            ->get();
    }
}
