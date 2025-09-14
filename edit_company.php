<?php require("controller.php");

if (!isset($_GET['editID'])) {
  header("Location: view_companies.php");
  exit();
}

$companyIndex = $_GET['editID'];
$company = getcompanybyindex($companyIndex);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Edit Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header bg-dark text-light">
            <h3 class="mb-0">Edit Company</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="edit_company.php">
              <input type="hidden" name="companyIndex" value="<?php echo $companyIndex; ?>">

              <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($company->name); ?>" required>
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($company->address); ?>" required>
              </div>
              <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($company->city); ?>" required>
              </div>

              <div class="form-group">
                <button name='button_editcompany' type="submit" class="btn btn-primary btn-block">Update Company</button>
                <a href="view_companies.php" class="btn btn-secondary btn-block">Cancel</a>
              </div>

              <div class="alert alert-info">
                <small><strong>Note:</strong> Changing the company name will automatically update all employees associated with this company.</small>
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