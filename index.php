<?php

// autoload classes
spl_autoload_register(function($class) {
    require_once 'app/' . $class . '.php';
});

// create model
$voteModel = new Vote;
// create controller
$voteController = new VoteController($voteModel);

// get votes
$voteController->getVotes();

// check if vote submitted and which request method was used
if ($_SERVER['REQUEST_METHOD']) {
    if (
        $_SERVER['REQUEST_METHOD'] === 'GET' &&
        isset($_GET) &&
        !empty($_GET)
    ) {
        $voteController->addVote($_GET);
    } elseif (
                $_SERVER['REQUEST_METHOD'] === 'POST' &&
                isset($_POST) &&
                !empty($_POST)
    ) {
        $voteController->addVote($_POST);
    }
}

// create View
$view = new VoteView($voteModel, $voteController);
// output View
$view->output();
