<?php

namespace App\Services;

use App\Entity\Post;
use App\Repository\MemberRepository;
use App\Repository\PostRepository;
use Exception;

class Publisher
{
    private MemberRepository $memberRepository;
    private PostRepository $postRepository;

    public function __construct(MemberRepository $memberRepository, PostRepository $postRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @throws Exception
     */
    public function publish(int $memberId, string $title, string $text): void
    {
        $member = $this->memberRepository->find($memberId);

        if (is_null($member)) {
            throw new Exception('No existe el miembro');
        }

        $post = new Post($title, $text, $member);

        $this->postRepository->save($post);
    }
}