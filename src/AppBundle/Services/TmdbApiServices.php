<?php
namespace AppBundle\Services;

use Tmdb\Client;

/**
 * Class TmdbApiServices
 * @package AppBundle\Services
 */
class TmdbApiServices
{

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
	{
		$this->client = $client;
	}

    /**
     * @return mixed
     */
    public function genres()
    {
        $genres = $this->client->getGenresApi()->getGenres(array(
            'language' => 'fr')
        );

        return $genres['genres'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function genre($id)
    {
        return $this->client->getGenresApi()->getGenre($id, array(
            'language' => 'fr')
        );
    }

    /**
     * @param $movieRequest
     * @return mixed
     */
    public function search($movieRequest)
    {
        return $this->client->getSearchApi()->searchMovies($movieRequest);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function movies($id)
    {
        return $this->client->getGenresApi()->getMovies($id, array(
            'language' => 'fr')
        );
    }

    /**
     * @return mixed
     */
    public function discover()
    {
        return $movies = $this->client->getDiscoverApi()->discoverMovies(array(
            'page' => 1,
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function video($id)
    {
        return $this->client->getMoviesApi()->getVideos($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function similar($id)
    {
        return $this->client->getMoviesApi()->getSimilar($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function keywords($id)
    {
        $keywords = $this->client->getMoviesApi()->getKeywords($id, array(
            'language' => 'fr'
        ));

        return $keywords['keywords'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function keyword($id)
    {
        return $this->client->getKeywordsApi()->getMovies($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function credits($id)
    {
        return $this->client->getMoviesApi()->getCredits($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function allMoviesActor($id)
    {
        return $this->client->getPeopleApi()->getMovieCredits($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @return mixed
     */
    public function actors()
    {
        return $this->client->getPeopleApi()->getPopular(array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function actor($id)
    {
        return $this->client->getPeopleApi()->getPerson($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function images($id)
    {
        return $this->client->getPeopleApi()->getImages($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function taggedImages($id)
    {
        return $this->client->getPeopleApi()->getTaggedImages($id, array(
            'language' => 'fr'
        ));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function collection($id)
    {
        return $this->client->getCollectionsApi()->getCollection($id, array(
            'language' => 'fr',
        ));
    }
}