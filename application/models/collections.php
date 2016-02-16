<?php

/**
 * Model for the collections table of the botcards database.
 */
class Collections extends MY_Model 
{

    function __construct()
    {
        parent::__construct();
        $this->_tableName = 'collections';
        $this->_keyField = 'Token';
    }
    
    //--------------------------------------------------------------------------
    //  Custom SELECTs
    //--------------------------------------------------------------------------
    
    /**
     * Gets the current count of a specified type of piece (series and body 
     * segment) for a specified player.
     */
    public function getPieceTypeCountForPlayer($player, $series, $part)
    {
        $query = $this->db->query(''
                . 'SELECT COUNT(Piece) as Count '
                . 'FROM `collections` '
                . 'WHERE Player = "' . $player . '" '
                . 'AND Piece LIKE "' . $series . '__' . $part . '"');
                
        return $query->row()->Count;
    }
    
    /**
     * Gets the current pieces of a specified body segment for a specified 
     * player.
     */
    public function getTypePiecesForPlayer($player, $part)
    {
        $query = $this->db->query(''
                . 'SELECT Token, Piece '
                . 'FROM `collections` '
                . 'WHERE Player = "' . $player . '" '
                . 'AND Piece LIKE "____' . $part . '"'
                . 'ORDER BY Piece');
        
        return $query->result();
    }
    
    /**
     * Gets the current count of a unique type of piece (series, specific bot, and body 
     * segment) for a specified player.
     */
//    public function getUniquePieceCountForPlayer($player, $series, $part)
//    {
//        $query = $this->db->query(''
//                . 'SELECT COUNT(Piece) as Count '
//                . 'FROM `collections` '
//                . 'WHERE Player = "' . $player . '" '
//                . 'AND Piece LIKE "' . $series . '_' . $part . '"');
//                
//        return $query->row()->Count;
//    }
}