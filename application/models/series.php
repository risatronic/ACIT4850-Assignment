<?php

/**
 * Model for the series table of the botcards database.
 */
class Series extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_tableName = 'series';
        $this->_keyField = 'Series';
    }
    
    //--------------------------------------------------------------------------
    //  Custom SELECTs
    //--------------------------------------------------------------------------
    
    /**
     * Gets the game's current bots (Series), their frequency (Frequency), and 
     * the number of pieces of that bot type currently held by players (Held).
     */
    public function getStatus()
    {
        $query = $this->db->query(''
                . 'SELECT s.Series, s.Description, s.Frequency, s.Value, '
                    . 'COUNT(c.Piece) as Held '
                . 'FROM `series` s '
                . 'LEFT JOIN `collections` c '
                . 'ON c.Piece LIKE CONCAT(s.Series, "%") '
                . 'GROUP BY s.Series '
                . 'ORDER BY s.Series;');
        
        return $query->result();
    }
}