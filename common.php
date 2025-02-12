<?php

function normalize_email($orig)
{
    return preg_replace('/\+[^@]*@/', '@', $orig);
}

function init_db()
{
    $db_file = __DIR__.'/members.sqlite3';
    $db = new SQLite3($db_file);
    $db->enableExceptions(true);
    return $db;
}
