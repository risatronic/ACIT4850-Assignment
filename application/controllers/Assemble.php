<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controller for assembling a bot to sell. Functionality only accessible by 
 * logged-in players.
 */
class Assemble extends Application 
{
    function __construct()
    {
	parent::__construct();
    }
        
    public function index()
    {
        // Set content depending on player login and form submission.
            
        // If the player is logged in...
        if ($this->session->userdata('logged_in'))
        {
            // Get the current session user.
            $player = $this->session->userdata('sessionUser');
            $this->data['assemblePlayer'] = $player;
            
            // Generate the bot builder with the player's pieces.
            $this->data['assemble_builder'] = $this->assemble_builder($player);
            
            // If the assemble variables are all set, display the bot preview 
            // and clear the asssemble variables so they are not accidentally 
            // reused later.
            if ($this->input->post('assembleHead') !== null
                    && $this->input->post('assembleBody') !== null
                    && $this->input->post('assembleLegs') !== null)
            {
                $this->data['assemble_preview'] = 
                        $this->assemble_preview($this->input->post('assembleHead'), 
                                $this->input->post('assembleBody'), 
                                $this->input->post('assembleLegs'));
                
                // Clear the assemble variables.
                $_POST['assembleHead'] = null;
                $_POST['assembleBody'] = null;
                $_POST['assembleLegs'] = null;
            }
            // If the assemble variables are not all set, do not display the 
            // preview.
            else
            {
                $this->data['assemble_preview'] = '';
            }
            
            // Set the page content.
            $this->data['content'] = $this->parser->parse('assemble', 
                    $this->data, true);
        }
        // If the player is not logged in, display a message advising 
        // login.
        else
        {
            $this->data['content'] = $this->parser->parse('assemble_denied', 
                    $this->data, true);
        }
            
        // Render.
        $this->render();
    }
    
    /**
     * Builds the assemble_builder subview.
     */
    private function assemble_builder($player)
    {
        // Fill the builder drop-downs with the player's pieces.
        
        // Builder Heads
        $rows = array();
        foreach ($this->Collections->getTypePiecesForPlayer($player, 0) as 
                $record)
        {
            $rows[] = (array) $record;
        }
        $this->data['assembleHeads'] = $rows;
        
        // Builder Bodies
        $rows = array();
        foreach ($this->Collections->getTypePiecesForPlayer($player, 1) as 
                $record)
        {
            $rows[] = (array) $record;
        }
        $this->data['assembleBodies'] = $rows;
        
        // Builder Legs
        $rows = array();
        foreach ($this->Collections->getTypePiecesForPlayer($player, 2) as 
                $record)
        {
            $rows[] = (array) $record;
        }
        $this->data['assembleLegs'] = $rows;
        
        return $this->parser->parse('assemble_builder', $this->data, true);
    }
    
    private function assemble_preview($head, $body, $legs)
    {
        // Set the preview images' sources.
        $this->data['assembleHead'] = $this->Collections->get($head)->Piece;
        $this->data['assembleBody'] = $this->Collections->get($body)->Piece;
        $this->data['assembleLegs'] = $this->Collections->get($legs)->Piece;
        
        // Set the sellable piece tokens.
        $this->data['assembleHeadToken'] = 
                $this->Collections->get($head)->Token;
        $this->data['assembleBodyToken'] = 
                $this->Collections->get($body)->Token;
        $this->data['assembleLegsToken'] = 
                $this->Collections->get($legs)->Token;
        
        return $this->parser->parse('assemble_preview', $this->data, true);
    }
}