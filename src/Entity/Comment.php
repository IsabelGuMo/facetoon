<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private string $text;
    private string $writer;
    private \DateTime $publishedOn;

    public function __construct(int $id, string $text, string $writer, \DateTime $publishedOn)
    {
        $this->id = $id;
        $this->text = $text;
        $this->writer = $writer;
        $this->publishedOn = $publishedOn;
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

    /**
     * @return string
     */
    public function getWriter(): string
    {
        return $this->writer;
    }

    /**
     * @param string $writer
     */
    public function setWriter(string $writer): void
    {
        $this->writer = $writer;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedOn(): \DateTime
    {
        return $this->publishedOn;
    }

    /**
     * @param \DateTime $publishedOn
     */
    public function setPublishedOn(\DateTime $publishedOn): void
    {
        $this->publishedOn = $publishedOn;
    }
}