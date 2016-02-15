<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for viewing and assembling bot pieces.
 */
class Assembly extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Default method.
     */
    public function index() {
        $player = $this->session->userdata('sessionUser');

        //displays a different view if no player is logged in
        if ($player == null) {
            $this->data['content'] = $this->parser->parse('assembly_anon', $this->data, true);
            $this->render();
        } else {

            //Build sub-views
            $this->data['assembly_heads'] = $this->assembly_heads($player);
            $this->data['assembly_bodies'] = $this->assembly_bodies($player);
            $this->data['assembly_legs'] = $this->assembly_legs($player);
            //$this->data['assembly_completed'] = $this->assembly_completed($player);
            //Render
            $this->data['content'] = $this->parser->parse('assembly', $this->data, true);
            $this->render();
        }
    }

    /**
     * Builds the assembly_heads subview.
     */
    private function assembly_heads($player) {
        //counts the number held by $player of each head piece
        $this->data['no11a-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11a', '0');

        $this->data['no11b-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11b', '0');

        $this->data['no11c-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11c', '0');

        $this->data['no13c-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '13c', '0');

        $this->data['no13d-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '13d', '0');

        $this->data['no26h-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '26h', '0');

        return $this->parser->parse('assembly_heads', $this->data, true);
    }

        /*
            This is the way in which I attempted to generate and populate a table iteratively. It is probably
            quite a mess but I tried following the CodeIgniter table how-to page that I found, to no avail.
            Ref: https://ellislab.com/codeigniter/user-guide/libraries/table.html
        
        private function assembly_heads($player) {
         
        $this->load->library('table');
        
        $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="2" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'table_close'         => '</table>'
              );

        $this->table->set_template($tmpl); 
        
        //put known head pieces into an array
        $this->data['pieces'] = array('11a-0', '11b-0', '11c-0', '13c-0', '13d-0', '26h-0');
        
        //check number held for each type of head piece. If it is 0, remove from the above array
          as it is not to be included in the resulting table
        $this->data['no11a-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11a', '0');
        if($this->data['no11a-0'] == 0){
            unset($this->data['pieces'][0]);
            var_dump($this->data['pieces']);
        }
        $this->data['no11b-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11b', '0');
        if($this->data['no11b-0'] == 0){
            unset($this->data['pieces'][1]);
            var_dump($this->data['pieces']);
        }
        $this->data['no11c-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '11c', '0');
        if($this->data['no11c-0'] == 0){
            unset($this->data['pieces'][2]);
            var_dump($this->data['pieces']);
        }
        $this->data['no13c-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '13c', '0');
        if($this->data['no13c-0'] == 0){
            unset($this->data['pieces'][3]);
            var_dump($this->data['pieces']);
        }
        $this->data['no13d-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '13d', '0');
        if($this->data['no13d-0'] == 0){
            unset($this->data['pieces'][4]);
            var_dump($this->data['pieces']);
        }
        $this->data['no26h-0'] = $this->Collections->getUniquePieceCountForPlayer($player, '26h', '0');
        if($this->data['no26h-0'] == 0){
            unset($this->data['pieces'][5]);
            var_dump($this->data['pieces']);
        }
        
        //iterate through pieces remaining after above process and generate the contents of their cells
          including an image and radio button with their unique ID
        foreach($this->data['pieces'] as $piece){
            
            $piece = '<img src="/data/' . $piece . 
                    '.jpeg" /><br/>' . $this->data['no' . $piece . ''] . 
                    'Held<br/><label for="' . $piece . '"><input type="radio" name="head" id="' .
                    $piece . '" value="' . $piece .'" /></label>';

        }
        
        //convert to  table with 6 columns, and generate
        $this->data['piecesTable'] = $this->table->make_columns($this->data['pieces'], 6);
        $this->table->generate($this->data['piecesTable']);

        return $this->parser->parse('assembly_heads', $this->data, true);
    } 
    */
         
        
    /**
     * Builds the assembly_bodies subview.
     */
    private function assembly_bodies($player) {
        //counts the number held by $player of each body piece
        $this->data['no11a-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '11a', '1');

        $this->data['no11b-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '11b', '1');

        $this->data['no11c-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '11c', '1');

        $this->data['no13c-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '13c', '1');

        $this->data['no13d-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '13d', '1');

        $this->data['no26h-1'] = $this->Collections->getUniquePieceCountForPlayer($player, '26h', '1');

        return $this->parser->parse('assembly_bodies', $this->data, true);
    }

    /**
     * Builds the assembly_legs subview.
     */
    private function assembly_legs($player) {
        //counts the number held by $player of each legs piece
        $this->data['no11a-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '11a', '2');

        $this->data['no11b-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '11b', '2');

        $this->data['no11c-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '11c', '2');

        $this->data['no13c-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '13c', '2');

        $this->data['no13d-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '13d', '2');

        $this->data['no26h-2'] = $this->Collections->getUniquePieceCountForPlayer($player, '26h', '2');

        return $this->parser->parse('assembly_legs', $this->data, true);
    }

    /*
      This is supposed to take in the 3 pieces of a completed bot held by the player 
      as an array to populate the "bots" psuedovariable which would then be used in the
      assembly_completed.php subview to display the assembled bot.

      private function assembly_completed($player){
      
      $rows = array();

      if($player == null){
            return;
      }

      foreach ($this->Completed->getPiecesForPlayer($player) as $record)
      {
            $rows[] = (array) $record;
      }
            $this->data['bots'] = $rows;

      return $this->parser->parse('assembly_completed', $this->data, true);
      }
     */
}
