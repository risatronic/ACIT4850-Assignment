<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller 
{
    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
	'Home' => '/', 'Player Portfolio' => '/portfolio', 
        'Bot Assembly' => '/assemble'
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
        // If the sessionUser is not null...
        if ($sessionUser !== null)
        {
            // ...then if the sessionUser exists in the database, log them in.
            if ($this->Players->exists($sessionUser))
            {
                $this->session->set_userdata('sessionUser', 
                        $this->Players->get($sessionUser)->Player);
                $this->session->set_userdata('logged_in', true);
            }
            // ...then if the sessionUser does not exist in the database, log 
            // them out.
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
        
        // If the user is logged in, display the user's name.
	if ($this->session->userdata('logged_in'))
        {
            $this->data['sessionUser'] = 
                    $this->session->userdata('sessionUser');
            $this->data['login'] = $this->parser->parse('logged_in', 
                    $this->data, true);
        }
        // If the user is logged out, display a login box.
        else
        {
            $this->data['login'] = $this->parser->parse('logged_out', 
                $this->data, true);
        }
        
        $this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['data'] = &$this->data;
	$this->parser->parse('_template', $this->data);
    }
}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */