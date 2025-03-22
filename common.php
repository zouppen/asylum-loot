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

function slack_match($db)
{
    $db->exec('UPDATE member SET slack_id=slack_id_force; UPDATE member AS m SET slack_id=s.id FROM (SELECT id, email_norm FROM slack WHERE alive) AS s WHERE m.slack_id IS NULL AND s.email_norm=m.email_norm');
}

function init_db()
{
    $db_file = __DIR__.'/members.sqlite3';
    $db = new SQLite3($db_file);
    $db->enableExceptions(true);
    return $db;
}

function die_hard($format, ...$args)
{
    fprintf(STDERR, $format."\n", ...$args);
    exit(1);
}
