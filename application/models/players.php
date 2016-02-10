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
}