<?php

class mcd19122022_0001_users
{
    public function up()
    {
        $db = \App\RobiMvc\Core\Application::$app->db;
        $SQL = "
            CREATE TABLE IF NOT EXISTS users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(55) NOT NULL,
                last_name VARCHAR(55) NOT NULL,
                email VARCHAR(55) NOT NULL,
                password VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \App\RobiMvc\Core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}