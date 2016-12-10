<?php

class VoteController
{
    private $model;

    /**
     * Pass Vote object to controller's property
     *
     * @param object $model Vote model
     */
    public function __construct(Vote $model)
    {
        $this->model = $model;
    }

    /**
     * Pass a genre vote to Vote model to add count
     *
     * @param string $vote genre to add vote to
     *
     * @return void
     */
    public function addVote($vote)
    {
        $this->model->addVote($vote);
    }

    /**
     * Retrieve all genre votes from Vote model
     *
     * @return array votes for all genres
     */
    public function getVotes()
    {
        return $this->model->getVotes();
    }
}
