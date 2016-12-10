<?php

class VoteView
{
    private $model;
    private $controller;

    /**
     * Pass Vote model and Vote controller objects
     * to controller's propreties
     *
     * @param object $model      Vote model
     * @param object $controller Vote controller
     */
    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;
    }

    /**
     * Load view template and pass data and messaged from Vote model
     *
     * @return void
     */
    public function output()
    {
        $data = $this->model->data;
        $message = $this->model->message;
        require_once $this->model->template;
    }
}
