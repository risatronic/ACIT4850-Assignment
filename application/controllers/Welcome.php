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
        
	public function index()
	{
                $this->data['pagebody'] = 'welcome';
                $this->render();
	}
}
