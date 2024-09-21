<div>
    <h1 class="heading">Categories</h1>
    <?php  
    include('./common/db.php');

    // Fetch categories
    $query = "SELECT * FROM category";
    $result = $conn->query($query);

    // Loop through and display categories
    foreach($result as $row) {
        $name = htmlspecialchars(ucfirst($row['Name']));
        $id = htmlspecialchars($row['id']);
        echo "<div class='row question-list'>
                <h4><a href='?c-id=$id'>$name</a></h4>
              </div>";
    }
    ?>
</div>
