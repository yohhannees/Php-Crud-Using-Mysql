echo '< <div class="row-count">
    <form method="get">
        <label for="limit">Number of records per page:</label>
        <input type="number" name="limit" id="row-count" id="limit" value="<?php echo $limit; ?>">
        <button type="submit">Apply</button>
    </form>
    </div>>';
    $limit = 5; // Number of records per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $result = $conn->query("SELECT COUNT(*) FROM users");
    $total_records = $result->fetch_array()[0];
    $total_pages = ceil($total_records / $limit);

    $result = $conn->query("SELECT * FROM users LIMIT $start, $limit");