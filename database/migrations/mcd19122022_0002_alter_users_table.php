<?php

class mcd19122022_0002_alter_users_table
{
    public function up()
    {
        $db = \App\RobiMvc\Core\Application::$app->db;
        $SQL = "ALTER TABLE users MODIFY password VARCHAR(512) NOT NULL;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\RobiMvc\Core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password;";
        $db->pdo->exec($SQL);
    }
}