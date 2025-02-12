<?php

function normalize_email($orig)
{
    $plusless = preg_replace('/\+[^@]*@/', '@', $orig);

    // OBS! E-mail addresses except the domain part are case
    // sensitive. But in practice people write them as they will and
    // most e-mail providers handle them in case-insensitive
    // manner. So, to avoid confusion, we normalize everything.
    return strtolower($plusless);
}

function init_db()
{
    $db_file = __DIR__.'/members.sqlite3';
    $db = new SQLite3($db_file);
    $db->enableExceptions(true);
    return $db;
}
