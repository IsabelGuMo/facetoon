<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 50)]
    private string $title;

    #[ORM\Column(type: "string")]
    private string $text;

    #[ORM\ManyToOne(targetEntity: Member::class, inversedBy: "posts")]
    private Member $writer;

    #[ORM\Column(type: "datetime")]
    private DateTime $publishedOn;

    public function __construct(string $title, string $text, Member $writer)
    {
        $this->title = $title;
        $this->text = $text;
        $this->writer = $writer;
        $this->publishedOn = new DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getWriter(): Member
    {
        return $this->writer;
    }

    /**
     * @return DateTime
     */
    public function getPublishedOn(): DateTime
    {
        return $this->publishedOn;
    }

    /**
     * @param DateTime $publishedOn
     */
    public function setPublishedOn(DateTime $publishedOn): void
    {
        $this->publishedOn = $publishedOn;
    }
}