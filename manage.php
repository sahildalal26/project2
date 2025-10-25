<?php
session_start();
include 'settings.php';
include 'header.inc';
include 'nav.inc';

// --- Build base query ---
$query = "SELECT * FROM eoi";
$where = [];

// --- Filter by job reference ---
if (!empty($_GET['job_reference'])) {
    $jobref = mysqli_real_escape_string($conn, $_GET['job_reference']);
    $where[] = "job_reference LIKE '%$jobref%'";
}

// --- Filter by name ---
if (!empty($_GET['first_name'])) {
    $fname = mysqli_real_escape_string($conn, $_GET['first_name']);
    $where[] = "first_name LIKE '%$fname%'";
}
if (!empty($_GET['last_name'])) {
    $lname = mysqli_real_escape_string($conn, $_GET['last_name']);
    $where[] = "last_name LIKE '%$lname%'";
}

if (count($where) > 0) {
    $query .= " WHERE " . implode(" AND ", $where);
}

// --- Sorting ---
$sort_field = isset($_GET['sort']) ? $_GET['sort'] : 'EOInumber';
$allowed_sorts = ['EOInumber', 'job_reference', 'first_name', 'last_name', 'status', 'created_at'];
if (!in_array($sort_field, $allowed_sorts)) $sort_field = 'EOInumber';
$query .= " ORDER BY $sort_field ASC";

$result = mysqli_query($conn, $query);
?>

<main class="content-wrapper">
    <div class="container">
<?php
// --- Handle delete by job reference ---
if (isset($_POST['delete_jobref'])) {
    $jobref = trim($_POST['job_reference']);
    $delete_query = "DELETE FROM eoi WHERE job_reference = '$jobref'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "<div class='alert error'>All EOIs for job reference '$jobref' have been deleted.</div>";
    } else {
        echo "<div class='alert error'>Delete failed: " . mysqli_error($conn) . "</div>";
    }
}

// --- Handle update EOI status ---
if (isset($_POST['update_status'])) {
    $eoi_number = intval($_POST['eoi_number']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

    if ($eoi_number <= 0) {
        echo "<div class='alert error'>Invalid EOI number.</div>";
    } else {
        $update_query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = $eoi_number";
        $update_result = mysqli_query($conn, $update_query);

        if (!$update_result) {
            echo "<div class='alert error'>SQL Error: " . mysqli_error($conn) . "</div>";
        } elseif (mysqli_affected_rows($conn) > 0) {
            echo "<div class='alert success'>EOI #$eoi_number status updated to '$new_status'.</div>";
        } else {
            echo "<div class='alert error'>No rows updated — check EOI number or column names.</div>";
        }
    }
}
?>
    <h2>Manage EOIs</h2>

    <!-- Filter form -->
    <form method="get" action="" class="application-form">
        <div class="form-group">
            <label>Job Reference</label>
            <input type="text" name="job_reference" value="<?= htmlspecialchars($_GET['job_reference'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($_GET['first_name'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($_GET['last_name'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label>Sort By</label>
            <select name="sort">
                <option value="EOInumber">EOI Number</option>
                <option value="job_reference">Job Reference</option>
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
                <option value="status">Status</option>
                <option value="created_at">Created At</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="manage.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Delete EOIs by job reference -->
    <form method="post" action="" class="application-form">
        <div class="form-group">
            <label>Delete EOIs for Job Reference</label>
            <input type="text" name="job_reference" required>
        </div>
        <button type="submit" name="delete_jobref" class="btn btn-secondary">Delete</button>
    </form>

    <!-- Update EOI status -->
    <form method="post" action="" class="application-form">
        <div class="form-group">
            <label>EOI Number</label>
            <input type="number" name="eoi_number" min="1" required>
        </div>
        <div class="form-group">
            <label>New Status</label>
            <select name="new_status">
            <option value="New" <?= ($_POST['new_status'] ?? '') === 'New' ? 'selected' : '' ?>>New</option>
            <option value="In Progress" <?= ($_POST['new_status'] ?? '') === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="Finalised" <?= ($_POST['new_status'] ?? '') === 'Finalised' ? 'selected' : '' ?>>Finalised</option>
</select>

        </div>
        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
    </form>

    <!-- Results -->
    <table>
        <thead>
            <tr>
                <th>EOI Number</th>
                <th>Job Reference</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Street</th>
                <th>Suburb</th>
                <th>State</th>
                <th>Postcode</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skills</th>
                <th>Other Skills</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='16'>No results found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
</main>

<?php
include 'footer.inc';
mysqli_close($conn);
?>
