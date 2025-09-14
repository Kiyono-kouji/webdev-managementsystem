<?php require("controller.php"); ?>

<!doctype html>
<html lang="en">

<head>
  <title>Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Add New Employee</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="add_newemployee.php">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" name="position" required>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="company">Company:</label>
                <select class="form-control" id="company" name="company" required>
                  <?php
                  $companies = getallcompany();
                  if (empty($companies)) {
                    echo '<option value="">No companies available</option>';
                  } else {
                    echo '<option value="">Select Company</option>';
                    foreach ($companies as $company) {
                      echo '<option value="' . htmlspecialchars($company->name) . '">' . htmlspecialchars($company->name) . '</option>';
                    }
                  }
                  ?>
                </select>
                <?php if (empty($companies)): ?>
                  <small class="form-text text-muted">
                    <a href="add_newcompany.php">Add a company first</a> to assign employees.
                  </small>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <?php if (empty($companies)): ?>
                  <button type="button" class="btn btn-primary btn-block" disabled>Add Company First</button>
                <?php else: ?>
                  <button name='button_addnewemployee' type="submit" class="btn btn-primary btn-block">Add Employee</button>
                <?php endif; ?>
                <a href="view_employees.php" class="btn btn-secondary btn-block">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>