<?php
// Création d'une class Film

class Film
{
    public function __construct($idMovie, $slug, $title, $year, $genres, $plot, $directors, $cast, $writers, $runtime, $mpaa, $rating, $popularity, $modified, $created, $posterFlag)
    {
        $this->setIdMovie($idMovie);
        $this->setSlug($slug);
        $this->setTitle($title);
        $this->setYear($year);
        $this->setGenres($genres);
        $this->setPlot($plot);
        $this->setDirectors($directors);
        $this->setCast($cast);
        $this->setWriters($writers);
        $this->setRuntime($runtime);
        $this->setMpaa($mpaa);
        $this->setRating($rating);
        $this->setPopularity($popularity);
        $this->setModified($modified);
        $this->setCreated($created);
        $this->setPosterFlag($posterFlag);
    }

    // Propriétés
    private $idMovie;
    private $slug;
    private $title;
    private $year;
    private $genres;
    private $plot;
    private $directors;
    private $cast;
    private $writers;
    private $runtime;
    private $mpaa;
    private $rating;
    private $popularity;
    private $modified;
    private $created;
    private $posterFlag;

    public function getIdMovie()
    {
        return $this->idMovie;
    }

    public function setIdMovie($idMovie)
    {
        $this->idMovie = $idMovie;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (strlen($title) > 1)
            $this->title = $title;
    }


    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        if ($year > 1800)
            $this->year = $year;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    public function getPlot()
    {
        return $this->plot;
    }

    public function setPlot($plot)
    {
        $this->plot = $plot;
    }

    public function getDirectors()
    {
        return $this->directors;
    }

    public function setDirectors($directors)
    {
        $this->directors = $directors;
    }

    public function getCast()
    {
        return $this->cast;
    }

    public function setCast($cast)
    {
        $this->cast = $cast;
    }

    public function getWriters()
    {
        return $this->writers;
    }

    public function setWriters($writers)
    {
        $this->writers = $writers;
    }

    public function getRuntime()
    {
        return $this->runtime;
    }

    public function setRuntime($runtime)
    {
        if ($runtime >= 0)
            $this->runtime = $runtime;
    }

    public function getMpaa()
    {
        return $this->mpaa;
    }

    public function setMpaa($mpaa)
    {
        $this->mpaa = $mpaa;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        if ($rating >= 0 && $rating <= 100)
            $this->rating = $rating;
    }

    public function getPopularity()
    {
        return $this->popularity;
    }

    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getPosterFlag()
    {
        return $this->posterFlag;
    }

    public function setPosterFlag($posterFlag)
    {
        if (is_bool($posterFlag))
            $this->posterFlag = $posterFlag;
    }
}