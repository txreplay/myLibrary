<?php
namespace AppBundle\Services;

use Tmdb\Client;

class TmdbApiServices
{

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

    public function genres()
    {
        $genres = $this->client->getGenresApi()->getGenres(array(
            'language' => 'fr')
        );

        return $genres['genres'];
    }

    public function genre($id) 
    {
        return $this->client->getGenresApi()->getGenre($id, array(
            'language' => 'fr')
        );
    }

    public function search($movieRequest)
    {
        return $this->client->getSearchApi()->searchMovies($movieRequest);
    }

    public function movies($id)
    {
        return $this->client->getGenresApi()->getMovies($id, array(
            'language' => 'fr')
        );
    }

    public function discover()
    {
        return $movies = $this->client->getDiscoverApi()->discoverMovies(array(
            'page' => 1,
            'language' => 'fr'
        ));
    }

    public function video($id)
    {
        return $this->client->getMoviesApi()->getVideos($id, array(
            'language' => 'fr'
        ));
    }

    public function similar($id)
    {
        return $this->client->getMoviesApi()->getSimilar($id);
    }

    public function keywords($id)
    {
        $keywords = $this->client->getMoviesApi()->getKeywords($id, array(
            'language' => 'fr'
        ));

        return $keywords['keywords'];
    }

    public function keyword($id)
    {
        return $this->client->getKeywordsApi()->getMovies($id, array(
            'language' => 'fr'
        ));
    }

    public function credits($id)
    {
        return $this->client->getMoviesApi()->getCredits($id, array(
            'language' => 'fr'
        ));
    }

    public function allMoviesActor($id)
    {
        return $this->client->getPeopleApi()->getMovieCredits($id, array(
            'language' => 'fr'
        ));
    }

    public function actors()
    {
        return $this->client->getPeopleApi()->getPopular(array(
            'language' => 'fr'
        ));
    }

    public function actor($id)
    {
        return $this->client->getPeopleApi()->getPerson($id, array(
            'language' => 'fr'
        ));
    }

    public function images($id)
    {
        return $this->client->getPeopleApi()->getImages($id, array(
            'language' => 'fr'
        ));
    }

    public function taggedImages($id)
    {
        return $this->client->getPeopleApi()->getTaggedImages($id, array(
            'language' => 'fr'
        ));
    }

    public function collection($id)
    {
        return $this->client->getCollectionsApi()->getCollection($id, array(
            'language' => 'fr',
        ));
    }
}