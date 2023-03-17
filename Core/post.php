<?php

class post
{
    //database variables
    private PDO $connection;
    private string $table = 'posts';

    //post properties
    public string $id;
    public string $category_id;
    public string $title;
    public string $body;
    public string $author;
    public string $created_at;

    //Initialize with database connection
    public function __construct($db)
    {
        $this->connection = $db;
    }

    //Getting posts from database
    public function read()
    {
        //create query of reading posts
        $query = 'SELECT
         c.name as category_name,
         p.id,
         p.category_id,
         p.title,
         p.body,
         p.author,
         p.created_at
         FROM ' . $this->table . '
          p LEFT JOIN categories c 
          ON p.category_id = c.id
          ORDERED BY p.created DESC';

        //PREPARE STATEMENT
        $stat = $this->connection->prepare($query);
        //execute query
        $stat->execute();
        return $stat;
    }
}