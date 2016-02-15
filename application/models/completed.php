<?php

/**
 * Model for the complete table of the botcards database.
 */
class Completed extends MY_Model {

    function __construct() 
    {
        parent::__construct();
        $this->_tableName = 'complete';
        $this->_keyField = 'Player';
    }

    //--------------------------------------------------------------------------
    //  Custom SELECTs
    //--------------------------------------------------------------------------
    
    /**
     * Gets the three pieces of a completed bot held by a specified player 
     */
    public function getPiecesForPlayer($player) 
    {
        $query = $this->db->query(
                'SELECT piece0 AS head, piece1 AS body, piece2 AS legs'
                . 'FROM `completed`'
                . 'WHERE player = "' . $player . '"');
        
        return $query->result();
    }

}
