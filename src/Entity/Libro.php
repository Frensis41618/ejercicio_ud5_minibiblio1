<?php

namespace App\Entity;
#[ORM\Entity(repositoryClass: LibroRepository::class)]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $titulo = null;
    #[ORM\Column(type: 'integer')]
    private ?int $anioPublicacion = null;
    #[ORM\Column(type: 'integer')]
    private ?int $paginas = null;
    #[ORM\ManyToOne(targetEntity: Editorial::class, inversedBy: 'libros')]
    private ?Editorial $editorial = null;
    #[ORM\ManyToMany(targetEntity: Autor::class, inversedBy: 'libros')]
    private Collection $autores;
    public function __construct()
    {
        $this->autores = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }
    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;
        return $this;
    }
    public function getAnioPublicacion(): ?int
    {
        return $this->anioPublicacion;
    }
    public function setAnioPublicacion(int $anioPublicacion): static
    {
        $this->anioPublicacion = $anioPublicacion;
        return $this;
    }
    public function getPaginas(): ?int
    {
        return $this->paginas;
    }
    public function setPaginas(int $paginas): static
    {
        $this->paginas = $paginas;
        return $this;
    }
    public function getEditorial(): ?Editorial
    {
        return $this->editorial;
    }
    public function setEditorial(?Editorial $editorial): static
    {
        $this->editorial = $editorial;
        return $this;
    }
    /**
     * @return Collection<int, Autor>
     */
    public function getAutores(): Collection
    {
        return $this->autores;
    }
    public function addAutor(Autor $autor): static
    {
        if (!$this->autores->contains($autor)) {
            $this->autores->add($autor);
        }
        return $this;
    }
    public function removeAutor(Autor $autor): static
    {
        $this->autores->removeElement($autor);
        return $this;
    }
}