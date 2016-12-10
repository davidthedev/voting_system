<?php

class Vote
{

    public $data;
    // default message
    public $message = 'Pick your favourite genre';
    public $template;

    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $dbName = 'voting_system';
    private $dbConnection;

    /**
     * Attempt to connect to database
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $this->connectToDb();
            $this->template = 'views/main.php';
        } catch (Exception $e) {
            $this->message = $e->getMessage();
            $this->template = 'views/error.php';
        }
    }

    /**
     * Create new database connection and activate reporting
     *
     * @return void
     */
    private function connectToDb()
    {
        /* activate reporting */
        $driver = new MySQLi_Driver();
        $driver->report_mode = MYSQLI_REPORT_STRICT;

        $this->dbConnection = new MySQLi(
            $this->host, $this->username, $this->password, $this->dbName
        );
    }

    /**
     * Increment vote for a particular genre
     * and record IP address to prevent from voting twice
     *
     * @param void
     */
    public function addVote($vote)
    {
        // genre name
        $genre = key($vote);

        // update vote count and get id of
        // last updated row
        $genreId = $this->updateVotes($genre);

        // insert into ips table
        $this->insertIp($genreId);

        // all votes data
        $this->getVotes();

        $this->message = 'Thank you for voting!';
    }

    /**
     * Get votes for each genre
     *
     * @return void
     */
    public function getVotes()
    {
        if ($this->dbConnection != null) {
            $sql = "SELECT * FROM genres";

            if (!$result = $this->dbConnection->query($sql)) {
                $this->message = $this->dbConnection->error;
            }

            $genres = $result->fetch_all(MYSQLI_ASSOC);

            $genresVotes = [];

            foreach ($genres as $genre) {
                $genresVotes[$genre['genre']] = $genre['votes'];
            }

            $this->data = $genresVotes;
        }
    }

    /**
     * Update vote count and get id of a particular genre and
     *
     * @param  string $genre genre name
     * @return int           genre id
     */
    private function updateVotes($genre)
    {
        $genreId = 0;

        $this->dbConnection->query("SET @update_id := 0");
        $this->dbConnection->query("UPDATE genres SET votes = votes + 1,
            genre_id = (SELECT @update_id := genre_id) WHERE genre = '$genre'");

        if ($result = $this->dbConnection->query("SELECT @update_id")) {
            $genreId = $result->fetch_array()['@update_id'];
        }

        return $genreId;
    }

    /**
     * Get genre name
     *
     * @param  string $genreId genre id
     * @return string string genre name
     */
    private function getGenre($genreId)
    {
        $sql = "SELECT genre FROM genres WHERE genre_id = $genreId";
        if (!$result = $this->dbConnection->query($sql)) {
            die($this->dbConnection->error);
        }
        return $result->fetch_assoc()['genre'];
    }

    /**
     * Store IP of voter
     *
     * @param  string $genreId genre id
     * @return void
     */
    private function insertIp($genreId)
    {
        $currentIp = mysqli_real_escape_string($this->dbConnection,
            ip2long($_SERVER['REMOTE_ADDR']));

        $sql = "INSERT INTO ips (ip, genre_id) ";
        $sql .= "VALUES ($currentIp, $genreId)";

        if (!$result = $this->dbConnection->query($sql)) {
            die($this->dbConnection->error);
        }
    }
}
