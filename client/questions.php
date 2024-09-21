<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php
            include("./common/db.php");


            $query = "SELECT * FROM questions";

            
            if (isset($_GET["c-id"])) {
                $cid = htmlspecialchars($_GET["c-id"]);
                $query .= " WHERE category_id = ?";
            } else if (isset($_GET["u-id"])) {
                $uid = htmlspecialchars($_GET["u-id"]);
                $query .= " WHERE user_id = ?";
            } else if (isset($_GET["latest"])) {
                $query .= " ORDER BY id DESC";
            } else if (isset($_GET["search"])) {
                $search = "%" . htmlspecialchars($_GET["search"]) . "%";
                $query .= " WHERE title LIKE ?";
            }

            
            $stmt = $conn->prepare($query);

            if (isset($_GET["c-id"])) {
                $stmt->bind_param("i", $cid);
            } else if (isset($_GET["u-id"])) {
                $stmt->bind_param("i", $uid);
            } else if (isset($_GET["search"])) {
                $stmt->bind_param("s", $search);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['title']);
                $id = htmlspecialchars($row['id']);
                echo "<div class='row question-list'>
                      <h4 class='my-question'><a href='?q-id=$id'>$title</a>";
                echo isset($uid) ? "<a href='./server/requests.php?delete=$id'> Delete</a>" : NULL;
                echo "</h4></div>";
            }

            $stmt->close();
            ?>
        </div>

        <div class="col-4">
            <?php include('categorylist.php'); ?>
        </div>
    </div>
</div>
