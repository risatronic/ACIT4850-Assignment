<?php

/**
 * Model for the players table of the botcards database.
 */
class Players extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_tableName = 'players';
        $this->_keyField = 'Player';
    }
    
    /**
     * Gets the game's current players (Player), their current peanuts 
     * (Peanuts), and the value of their currently held bot pieces (Equity).
     */
    function currentWorth()
    {
        $query = $this->db->query(''
                . 'SELECT p.Player, p.Peanuts, COUNT(c.Piece) as Equity '
                . 'FROM `players` p '
                . 'INNER JOIN `collections` c '
                . 'ON p.Player = c.Player '
                . 'GROUP BY p.Player '
                . 'ORDER BY p.Player ASC;');
                
        return $query->result();
    }
}