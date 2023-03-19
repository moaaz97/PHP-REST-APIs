<?php

class post
{
    //database variables
    private PDO $connection;
    private string $table = 'post';

    //post properties
    public string $id;
    public string $category_id;
    public string $title;
    public string $body;
    public string $author;
    public string $category_name;
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
          ORDER BY p.created_at DESC';

        //PREPARE STATEMENT
        $stat = $this->connection->prepare($query);
        //execute query
        $stat->execute();
        return $stat;
    }

    public function read_single()
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
          WHERE p.id = ? LIMIT 1';

        //PREPARE STATEMENT
        $stat = $this->connection->prepare($query);
        $stat->bindParam(1, $this->id);
        $stat->execute();
        $row = $stat->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];
        } else {
            die("The Post is Not Exist");
        }
    }
}