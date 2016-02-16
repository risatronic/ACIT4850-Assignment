<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller for viewing player portfolio. Default method takes one optional 
 * parameter indicating the player to view. If no player is specified, shows 
 * the portfolio of the currently logged-in player. If no player is logged-in, 
 * shows the alphabetically first player.
 */
class Portfolio extends Application 
{
    function __construct()
    {
        parent::__construct();
    }
        
    public function index($player = null)
    {
        $player = $this->pickPlayer($player);
        $this->data['portfolioPlayer'] = $player;
            
        // Build subviews.
        $this->data['portfolio_select'] = $this->portfolio_select();
        $this->data['portfolio_activity'] = $this->portfolio_activity($player);
        $this->data['portfolio_holdings'] = $this->portfolio_holdings($player);
            
        // Render.
        $this->data['pagebody'] = 'portfolio';
        $this->render();
    }
        
    /**
     * Logic for selecting which player's portfolio to display. Checks the 
     * following in order until one is valid:
     *  - The player just provided by the page's drop-down
     *  - The player name passed as a URL parameter
     *  - The currently logged-in player
     *  - The first player (alphabetically) in the database
     */
    private function pickPlayer($player)
    {
        // Check for a user selection and prioritize it over other options.
        $portfolioPlayer = $this->input->post('portfolioPlayer');
        if ($portfolioPlayer !== null)
        {
            // Clear the user selection from the session and return it;
            $_POST['portfolioPlayer'] = null;
            return $portfolioPlayer;
        }
            
        // Sets the selected player to the provided value, then the  
        // logged-in user, then the alphabetically first player in the 
        // database, whichever is valid first.
            
        // If player is not null...
        if ($player !== null)
        {
            // ...then if player does not exist...
            if (!$this->Players->exists($player))
            {
                // ...then if the user is logged in, select logged-in user.
                if ($this->session->userdata('logged_in'))
                {
                    $player = $this->session->userdata('sessionUser');
                }
                // ...then if the user is not logged in, select first user.
                else
                {
                    $player = $this->Players->getFirstPlayerName();
                }
            }
        }
        // If player is null...
        else
        {
            // ...then if the user is logged in, select logged-in user.
            if ($this->session->userdata('logged_in'))
            {
                $player = $this->session->userdata('sessionUser');
            }
            // ... then if user is not logged in, select first user.
            else
            {
                $player = $this->Players->getFirstPlayerName();
            }
        }
            
        return $player;
    }
        
    /**
     * Builds the portfolio_select subview.
     */
    private function portfolio_select()
    {
        // Get the game's current players.
        $rows = array();
        foreach ($this->Players->all() as $record)
        {
            $rows[] = (array) $record;
        }
        $this->data['players'] = $rows;
            
        return $this->parser->parse('portfolio_select', $this->data, true);
    }
        
    /**
     * Builds the portfolio_activity subview.
     */
    private function portfolio_activity($player)
    {
        // Get the player's recent activity.
        $rows = array();
        foreach ($this->Transactions->getRecentTransactionsForPlayer($player) 
                as $record)
        {
            $rows[] = (array) $record;
        }
        $this->data['activities'] = $rows;
            
        return $this->parser->parse('portfolio_activity', $this->data, true);
    }
        
    /**
     * Builds the portfolio_holdings subview.
     */
    private function portfolio_holdings($player)
    {
        // Get the counts of all the piece types.
        $this->data['s11Heads'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '11', 
                        '0');
        $this->data['s11Bodies'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '11', 
                        '1');
        $this->data['s11Legs'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '11', 
                        '2');
        $this->data['s13Heads'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '13', 
                        '0');
        $this->data['s13Bodies'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '13', 
                        '1');
        $this->data['s13Legs'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '13', 
                        '2');
        $this->data['s26Heads'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '26', 
                        '0');
        $this->data['s26Bodies'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '26', 
                        '1');
        $this->data['s26Legs'] = 
                $this->Collections->getPieceTypeCountForPlayer($player, '26', 
                        '2');
            
        return $this->parser->parse('portfolio_holdings', $this->data, true);
    }
}