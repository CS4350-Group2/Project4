<?php

namespace Views;


abstract class View
{
    /**
     * @var string $content
     * @access protected
     */
    protected $content;
    protected $data;

    /**
     * Function show - displays the content
     *
     * @return mixed
     *
     * @access public
     */
    public function show($data = array())
    {

        $navigation = new Navigation();
        echo $navigation->content;//Output Navigation to pages that extend View class

        echo $this->content;//Output content of pages that extend View Class



    }


}