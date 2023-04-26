<link rel="stylesheet" href="users_pagination.css">
<div class="row-count">
    <form method="get">
        <label for="limit">Number of records per page:</label>
        <input type="number" name="limit" id="row-count" id="limit" value="<?php echo $limit; ?>">
        <button type="submit">Apply</button>
    </form>
</div>

<?php

$limit = 2; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$result = $conn->query("SELECT COUNT(*) FROM users");
$total_records = $result->fetch_array()[0];
$total_pages = ceil($total_records / $limit);

$result = $conn->query("SELECT * FROM users LIMIT $start, $limit");


echo '<table class="table table-bordered mt-4">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Age</th>';
echo '<th>Action</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['age'] . '</td>';
    echo '<td>';
    echo '<a href="edit_user.php?id=' . $row['id'] . '" class="btn btn-sm btn-edit">Edit</a> ';
    echo '<a href="delete_user.php?id=' . $row['id'] . '" class="btn btn-sm btn-delete">Delete</a>';
    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo '<nav aria-label="Page navigation example">';
echo '<ul class="pagination justify-content-center">';
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<li class="page-item' . ($page == $i ? ' active' : '') . '"><a class="page-link btn btn-outline-secondary" href="index.php?page=' . $i . '">' . $i . '</a></li>';
}
echo '</ul>';
echo '</nav>';
?>