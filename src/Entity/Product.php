<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]


    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    private ?string $imageName = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $demountability = null;

    #[ORM\Column]
    private ?int $documentation = null;

    #[ORM\Column]
    public ?int $spare_part = null;

    #[ORM\OneToMany(mappedBy: 'products', targetEntity: DescriptionObsolescence::class)]
    private Collection $descriptionObsolescences;

    #[ORM\Column]
    private ?int $price_spartParts = null;

    #[ORM\Column]
    private ?int $specific_criterion = null;

    public function __construct()
    {
        $this->descriptionObsolescences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDemountability(): ?int
    {
        return $this->demountability;
    }

    public function setDemountability(int $demountability): self
    {
        $this->demountability = $demountability;

        return $this;
    }

    public function getDocumentation(): ?int
    {
        return $this->documentation;
    }

    public function setDocumentation(int $documentation): self
    {
        $this->documentation = $documentation;

        return $this;
    }

    public function getSparePart(): ?int
    {
        return $this->spare_part;
    }

    public function setSparePart(int $spare_part): self
    {
        $this->spare_part = $spare_part;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|null $imageFile
     */

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, DescriptionObsolescence>
     */
    public function getDescriptionObsolescences(): Collection
    {
        return $this->descriptionObsolescences;
    }

    public function addDescriptionObsolescence(DescriptionObsolescence $descriptionObsolescence): self
    {
        if (!$this->descriptionObsolescences->contains($descriptionObsolescence)) {
            $this->descriptionObsolescences->add($descriptionObsolescence);
            $descriptionObsolescence->setProducts($this);
        }

        return $this;
    }

    public function removeDescriptionObsolescence(DescriptionObsolescence $descriptionObsolescence): self
    {
        if ($this->descriptionObsolescences->removeElement($descriptionObsolescence)) {
            // set the owning side to null (unless already changed)
            if ($descriptionObsolescence->getProducts() === $this) {
                $descriptionObsolescence->setProducts(null);
            }
        }

        return $this;
    }

    public function getPriceSpartParts(): ?int
    {
        return $this->price_spartParts;
    }

    public function setPriceSpartParts(int $price_spartParts): self
    {
        $this->price_spartParts = $price_spartParts;

        return $this;
    }

    public function getSpecificCriterion(): ?int
    {
        return $this->specific_criterion;
    }

    public function setSpecificCriterion(int $specific_criterion): self
    {
        $this->specific_criterion = $specific_criterion;

        return $this;
    }

}
