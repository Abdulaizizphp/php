<?php



$servername = "localhost";
$username = "Abdulaziz";
$password = "Abdulazizphp@";
$dbname = "moviesdb";





try {

  $ID = $_POST["id"];
  $title = $_POST["title"];
  $release_date = $_POST["release_date"];
  $director = $_POST["director"];
  $genre = $_POST["genre"];




    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statements
    $conn->exec("INSERT INTO movie (title, genre, director)
    VALUES ('$ID', '$title', '$release_date' , $director , $genre)");

    //$conn->exec("INSERT INTO movie.Movie (title, genre, director)
    //VALUES ('kidnapBar', 'Horror', 'Lauren southern')");

    //$conn->exec("INSERT INTO movie.Movie (title, genre, director)
    //VALUES ('the fifth nono ', 'comedy', 'the fifth nono ')");


    // commit the transaction
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>
