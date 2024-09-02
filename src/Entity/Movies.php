<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\MoviesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[ORM\Entity(repositoryClass: MoviesRepository::class)]
#[ApiResource(paginationItemsPerPage:8,paginationClientEnabled: true)]
#[ApiFilter(SearchFilter::class, properties: ['title' => 'partial'])]
class Movies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[SerializedName('backdrop_path')]
    #[ORM\Column(length: 255)]
    private ?string $backdropPath = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;


    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[SerializedName('original_title')]
    #[ORM\Column(length: 255)]
    private ?string $originalTitle = null;


    #[SerializedName('original_name')]

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $originalName = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $overview = null;

    #[SerializedName('poster_path')]

    #[ORM\Column(length: 255)]
    private ?string $posterPath = null;

    #[SerializedName('media_type')]
    #[ORM\Column(length: 255)]
    private ?string $mediaType = null;

    #[ORM\Column]
    private ?bool $adult = null;

    #[SerializedName('original_language')]

    #[ORM\Column(length: 255)]
    private ?string $originalLanguage = null;

    #[ORM\Column]
    private ?float $popularity = null;

    #[SerializedName('first_air_date')]
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $firstAirDate = null;

    #[SerializedName('vote_average')]
    #[ORM\Column]
    private ?float $voteAverage = null;
    #[SerializedName('vote_count')]

    #[ORM\Column]
    private ?int $voteCount = null;
    #[SerializedName('origin_country')]

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $originCountry = null;
    #[SerializedName('release_date')]

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column]
    private ?bool $video = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(string $backdropPath): static
    {
        $this->backdropPath = $backdropPath;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(?string $originalTitle): static
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): static
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): static
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(string $posterPath): static
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    public function setMediaType(string $mediaType): static
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function isAdult(): ?bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult): static
    {
        $this->adult = $adult;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): static
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getPopularity(): ?int
    {
        return $this->popularity;
    }

    public function setPopularity(int $popularity): static
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getFirstAirDate(): ?\DateTimeInterface
    {
        return $this->firstAirDate;
    }

    public function setFirstAirDate(\DateTimeInterface $firstAirDate): static
    {
        $this->firstAirDate = $firstAirDate;

        return $this;
    }

    public function getVoteAverage(): ?float
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float $voteAverage): static
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): static
    {
        $this->voteCount = $voteCount;

        return $this;
    }

    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry): static
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function isVideo(): ?bool
    {
        return $this->video;
    }

    public function setVideo(bool $video): static
    {
        $this->video = $video;

        return $this;
    }
}
