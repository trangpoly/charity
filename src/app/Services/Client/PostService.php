<?php

namespace App\Services\Client;

use App\Repositories\Client\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getData()
    {
        return $this->postRepository->getData();
    }
}
