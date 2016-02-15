<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {
    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
	'Home' => '/', 'Player Portfolio' => '/portfolio', 
        'Bot Assembly' => '/assembly'
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
	parent::__construct();
	$this->data = array();
	$this->data['pagetitle'] = 'BotCard Trading Centre';
        $this->data['pagesubtitle'] = 'The Cool New Place to Trade Black '
                . 'Market Bot Parts';
        $this->data['thisPage'] = '/../../../' . $this->uri->segment(1);
        
        // If the sessionUser $_POST parameter is set, then check to see if it 
        // is a real user and log the user in if so. Else, logs the user out.
        $sessionUser = $this->input->post('sessionUser');
        if ($sessionUser !== null)
        {
            if ($this->Players->exists($sessionUser))
            {
                $this->session->set_userdata('sessionUser', $sessionUser);
                $this->session->set_userdata('logged_in', true);
            }
            else
            {
                $this->session->set_userdata('sessionUser', '');
                $this->session->set_userdata('logged_in', false);
            }
        }
    }
    
    /**
     * Render this page
     */
    function render()
    {
        // Check for a user session and set the login bar appropriately.
	if (!$this->session->userdata('logged_in'))
        {
            // If there is no session (or the user is logged out), display a 
            // login box.
            $this->data['login'] = $this->parser->parse('logged_out', 
                $this->data, true);
        }
        else
        {
            // If there is a session, display the user's name.
            $this->data['sessionUser'] = 
                    $this->session->userdata('sessionUser');
            $this->data['login'] = $this->parser->parse('logged_in', 
                    $this->data, true);
        }
        
        $this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['data'] = &$this->data;
	$this->parser->parse('_template', $this->data);
    }
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */