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
                $this->data['welcome_status'] = $this->status();
                $this->data['welcome_players'] = $this->players();
                $this->data['content'] = $this->parser->parse('welcome', 
                        $this->data, true);
                $this->render();
	}
        
        /**
         * Constructs and returns the homepage's status panel.
         */
        private function status()
        {
            $this->load->model('Series');
            
            // Get the listing of current bots and their frequency.
            $rows = array();
            foreach ($this->Series->status() as $record)
            {
                $rows[] = (array) $record;
            }
            $this->data['botsummary'] = $rows;
            
            return $this->parser->parse('welcome_status', $this->data, true);
        }
        
        /**
         * Constructs and returns the homepage's players panel.
         */
        private function players()
        {
            $this->load->model('Players');
            
            // Get the listing of current bots and their frequency.
            $rows = array();
            foreach ($this->Players->currentWorth() as $record)
            {
                $rows[] = (array) $record;
            }
            $this->data['players'] = $rows;
            
            return $this->parser->parse('welcome_players', $this->data, true);
        }
}
