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
	'Home' => '/', 'Player Portfolio' => '/', 'Bot Assembly' => '/'
    );
    
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
	parent::__construct();
	$this->data = array();
	$this->data['pagetitle'] = 'BotCard Trading Simulator';
        $this->data['pagesubtitle'] = 'The Cool New Place to Trade Black '
                . 'Market Bot Parts';
        
        // If the user $_GET parameter is set, then check to see if it is a 
        // real user and log the user in if so.
        if (isset($_GET['user']))
        {
            if ($_GET['user'] == 'logout')
            {
                $this->session->set_userdata('user', '');
                $this->session->set_userdata('logged_in', false);
            }
            else if ($this->Players->exists($_GET['user']))
            {
                $this->session->set_userdata('user', $_GET['user']);
                $this->session->set_userdata('logged_in', true);
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
            $this->data['username'] = $this->session->userdata('user');
            $this->data['login'] = $this->parser->parse('logged_in', 
                    $this->data, true);
        }
        
        $this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], 
                $this->data, true);
	$this->data['data'] = &$this->data;
	$this->parser->parse('_template', $this->data);
    }
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */