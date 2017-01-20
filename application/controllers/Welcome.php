<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'what' => $record['what'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['authors'] = $authors;

		// Displays random quote 
                $this->random();

		$this->render();
	}
        
        /**
	 * Displays a random quote from the authors
	 */
        public function random()
	{
            $this->data['pagebody'] = 'homepage';

            $source = $this->quotes->all();
            $authors = array ();
            foreach ($source as $record)
            {
		$authors[] = array ('who' => $record['who'], 'what' => $record['what'], 'mug' => $record['mug'], 'where' => $record['where'], 'what' => $record['what']);
            }
            
            echo $authors[rand(1,6)]['what'];
	}

}
