<?php

/**
 * Model for the transactions table of the botcards database.
 */
class Transactions extends MY_Model2 {

    function __construct()
    {
        parent::__construct();
        $this->_tableName = 'transactions';
        $this->_keyField = 'Player';
        $this->_keyField2 = 'DateTime';
    }
    
    //--------------------------------------------------------------------------
    //  Custom SELECTs
    //--------------------------------------------------------------------------
    
    /**
     * Gets a specified player's 10 most recent transactions.
     */
    public function getRecentTransactions($player)
    {
        $query = $this->db->query(''
                . 'SELECT '
                . 'CASE Trans '
                    . 'WHEN "sell" THEN "Sold" '
                    . 'WHEN "buy" THEN "Bought" '
                    . 'ELSE NULL '
                . 'END as Trans, '
                . 'CASE Series '
                    . 'WHEN "x" THEN "bot" '
                    . 'ELSE CONCAT("Series ", Series) '
                . 'END as Series, '
                . '`DateTime` '
                . 'FROM `transactions` '
                . 'WHERE Player = "' . $player . '" '
                . 'ORDER BY DateTime DESC '
                . 'LIMIT 10;');
                
        return $query->result();
    }
}