<?php
// Database connection code here

$limit = 5; // Number of records per page
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
    echo '<a href="edit_user.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">Edit</a> ';
    echo '<a href="delete_user.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
    echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo '<nav aria-label="Page navigation example">';
echo '<ul class="pagination justify-content-center">';
for ($i = 1; $i <= $total_pages; $i++) {
    echo '<li class="page-item' . ($page == $i ? ' active' : '') . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
}
echo '</ul>';
echo '</nav>';
?>

<style>
    /* Style for the table */
    .table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;

        border-color: #000;
        border-radius: 4px;
        overflow: hidden;
    }

    /* Style for the table header */
    .table thead {
        background-color: #f5f5f5;
        color: #333;
        font-weight: bold;
    }

    /* Style for table cells */
    .table td,
    .table th {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Style for table cell links */
    .table td a {
        color: #333;
        text-decoration: none;
    }

    /* Style for table cell links on hover */
    .table td a:hover {
        color: #000;
        text-decoration: underline;
    }

    /* Style for active pagination link */
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>