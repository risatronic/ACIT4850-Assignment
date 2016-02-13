<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Default controller.
 */
class Welcome extends Application {

        function __construct()
	{
		parent::__construct();
	}
        
        /**
         * Default method. Loads status and players panels.
         */
	public function index()
	{
            // Build subviews.
            $this->data['welcome_status'] = $this->welcome_status();
            $this->data['welcome_players'] = $this->welcome_players();
            
            // Render.
            $this->data['content'] = $this->parser->parse('welcome', 
                $this->data, true);
            $this->render();
	}
        
        /**
         * Constructs and returns the homepage's status panel.
         */
        private function welcome_status()
        {            
            // Get the listing of current bots and their frequency.
            $rows = array();
            foreach ($this->Series->getStatus() as $record)
            {
                $rows[] = (array) $record;
            }
            $this->data['botSummary'] = $rows;
            
            return $this->parser->parse('welcome_status', $this->data, true);
        }
        
        /**
         * Constructs and returns the homepage's players panel.
         */
        private function welcome_players()
        {
            // Get the listing of current bots and their frequency.
            $rows = array();
            foreach ($this->Players->getCurrentWorths() as $record)
            {
                $rows[] = (array) $record;
            }
            $this->data['players'] = $rows;
            
            return $this->parser->parse('welcome_players', $this->data, true);
        }
}
