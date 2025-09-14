<?php
require("controller.php");

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Company Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-white">Management System</a>
    <div class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="view_employees.php">Employees</a>
        <a class="nav-item nav-link active" href="view_companies.php">Companies <span class="sr-only">(current)</span></a>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Company Management</h2>

    <!-- Table Container -->
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Company Name</th>
              <th>Address</th>
              <th>City</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $companies = getallcompany();
            if (empty($companies)) {
              echo '<tr><td colspan="5" class="text-center">No companies found</td></tr>';
            } else {
              foreach ($companies as $indexcompany => $company) {
                echo "<tr>";
                echo "<td>" . ($indexcompany + 1) . "</td>";
                echo "<td>" . htmlspecialchars($company->name) . "</td>";
                echo "<td>" . htmlspecialchars($company->address) . "</td>";
                echo "<td>" . htmlspecialchars($company->city) . "</td>";
                echo '<td>
            <a href="edit_company.php?editID=' . $indexcompany . '">
            <button class="btn btn-sm btn-warning">Edit</button></a>
            <a href="controller.php?deleteID=' . $indexcompany . '&type=company" onclick="return confirm(\'Are you sure? This will set affected employees company to Unknown.\')">
            <button class="btn btn-sm btn-danger">Delete</button></a>
          </td>';
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="text-center mt-3">
      <a href="add_newcompany.php"><button class="btn btn-primary">Add New Company</button></a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>