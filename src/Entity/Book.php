<?php

declare(strict_types=1);

namespace Guiziweb\SyliusTestPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Resource\Model\ResourceInterface;
use Sylius\Resource\Model\TimestampableInterface;
use Sylius\Resource\Model\TimestampableTrait;

#[ORM\Entity]
#[ORM\Table(name: 'guiziweb_book')]
class Book implements ResourceInterface, TimestampableInterface
{
    use TimestampableTrait;

    /** @var \DateTimeInterface|null */
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected $createdAt;

    /** @var \DateTimeInterface|null */
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected $updatedAt;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $author = null;

    #[ORM\Column(type: 'string', length: 13)]
    private ?string $isbn = null;

    #[ORM\Column(type: 'integer')]
    private ?int $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}
