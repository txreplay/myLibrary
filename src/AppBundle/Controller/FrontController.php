<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\SearchType;
use AppBundle\Form\Dto\SearchDto;

/**
 * Class FrontController
 * @package AppBundle\Controller
 */
class FrontController extends Controller
{

    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $genres = $api->genres();

        return $this->render(':front:index.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres
        ));
    }

    /**
     * @Route("/movies", name="movies")
     */
    public function moviesAction()
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $discover = $api->discover();
        $genres = $api->genres();

        return $this->render(':front:movies.html.twig', array(
            'form' => $form->createView(),
            'movies' => $discover,
            'genres' => $genres
        ));
    }

    /**
     * @Route("/movie/{id}", name="movie")
     */
    public function movieAction($id) 
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $movie = $this->get('wtfz_tmdb.movie_repository')->load($id, ['language' => 'fr']);
        $genres = $api->genres();
        $video = $api->video($id);
        $similar = $api->similar($id);
        $keywords = $api->keywords($id);
        $credits = $api->credits($id);

        return $this->render(':front:movie.html.twig', array(
            'form' => $form->createView(),
            'movie' => $movie,
            'genres' => $genres,
            'video' => $video,
            'movies' => $similar,
            'keywords' => $keywords,
            'credits' => $credits
        ));

    }

    /**
     * @Route("/search/", name="search")
     */
    public function searchAction(Request $request) 
    {
        $api = $this->get('mylib.tmdb_api');

        $form = $this->createForm(new SearchType(), new SearchDto());

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $dto = $form->getData();

                $this->get('mylib.manager.search')->confirm($dto);

                $movieRequest = $form->get('movieRequest')->getData();
                $searchResult = $api->search($movieRequest);
                $genres = $api->genres();

                return $this->render(':front:search.html.twig', array(
                    'form' => $form->createView(),
                    'movieRequest'  => $movieRequest,
                    'movies'  => $searchResult,
                    'genres' => $genres
                ));
            } else {
                throw new Exception();
            }
        } else {
            throw new Exception();
        }

//        if ($form->isValid()) {
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($search);
//            $em->flush();
//
//            $movieRequest = $form->get('movieRequest')->getData();
//            $searchResult = $api->search($movieRequest);
//            $genres = $api->genres();
//
//            return $this->render(':front:search.html.twig', array(
//                'form' => $form->createView(),
//                'movieRequest'  => $movieRequest,
//                'movies'  => $searchResult,
//                'genres' => $genres
//            ));
//        } else {
//            // TODO: Return if $form is not valid
//        }

    }

    /**
     * @Route("/genre/{id}", name="genre")
     */
    public function genreAction($id) 
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());
        
        $genres = $api->genres();
        $genre = $api->genre($id);
        $movies = $api->movies($id);

        return $this->render(':front:genre.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres,
            'genre' => $genre,
            'movies' => $movies
        ));
    }

    /**
     * @Route("/keyword/{id}", name="keyword")
     */
    public function keywordAction($id)
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());
        
        $genres = $api->genres();
        $keyword = $api->keyword($id);
        $genre = $api->genre($id);
        $movies = $api->movies($id);

        return $this->render(':front:keyword.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres,
            'genre' => $genre,
            'movies' => $movies,
            'keyword' => $keyword
        ));
    }

    /**
     * @Route("/actor/{id}", name="actor")
     */
    public function actorAction($id)
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $genres = $api->genres();
        $genre = $api->genre($id);
        $allMoviesActor = $api->allMoviesActor($id);
        $actor = $api->actor($id);
        $taggedImages = $api->taggedImages($id);
        $images = $api->images($id);

        return $this->render(':front:actor.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres,
            'genre' => $genre,
            'movies' => $allMoviesActor,
            'actor' => $actor,
            'images' => $images,
            'taggedImages' => $taggedImages
        ));
    }

    /**
     * @Route("/actors", name="actors")
     */
    public function actorsAction()
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $genres = $api->genres();
        $actors = $api->actors();

        return $this->render(':front:actors.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres,
            'actors' => $actors
        ));
    
    }

    /**
     * @Route("/collection/{id}", name="collection")
     */
    public function collectionAction($id)
    {
        $api = $this->get('mylib.tmdb_api');
        $form = $this->createForm(new SearchType(), new SearchDto());

        $genres = $api->genres();
        $collection = $api->collection($id);

        $collectionMovies = $collection['parts'];

        return $this->render(':front:collection.html.twig', array(
            'form' => $form->createView(),
            'genres' => $genres,
            'movies' => $collectionMovies,
            'collection' => $collection
        ));
    }
}