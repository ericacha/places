<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Places.php";

    session_start();

    if (empty($_SESSION['list_of_city'])) {
        $_SESSION['list_of_city'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('list.php', array('city' => Places::getAll()));
    });

    $app->post("/list", function() use ($app) {
        $place = new Places($_POST['description']);
        $place->save();
        return $app['twig']->render('delete_places.php');
    });

    $app->post("/delete", function() use ($app) {
        Task::deleteAll();
        return $app['twig']->render('delete.php');

    });

    return $app;

    ?>
