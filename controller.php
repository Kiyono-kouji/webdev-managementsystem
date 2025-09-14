<?php require("model_company.php"); ?>
<?php require("model_employees.php"); ?>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['employeelist'])) {
    $_SESSION['employeelist'] = array();
}

function createemployee()
{
    $employee = new model_employees();
    $employee->name = $_POST['name'];
    $employee->position = $_POST['position'];
    $employee->company = $_POST['company'];
    $employee->email = $_POST['email'];
    array_push($_SESSION['employeelist'], $employee);
    return $employee;
}

function getallmember()
{
    return $_SESSION['employeelist'];
}

function getemployeebyindex($index)
{
    return $_SESSION['employeelist'][$index];
}

function updateemployee($index)
{
    $_SESSION['employeelist'][$index]->name = $_POST['name'];
    $_SESSION['employeelist'][$index]->position = $_POST['position'];
    $_SESSION['employeelist'][$index]->company = $_POST['company'];
    $_SESSION['employeelist'][$index]->email = $_POST['email'];
}

function deleteemployee($indexemployee)
{
    unset($_SESSION['employeelist'][$indexemployee]);
    $_SESSION['employeelist'] = array_values($_SESSION['employeelist']);
}

function updateEmployeesOnCompanyDelete($companyName)
{
    foreach ($_SESSION['employeelist'] as &$employee) {
        if ($employee->company === $companyName) {
            $employee->company = "Unknown";
        }
    }
    unset($employee);
}


function updateEmployeesOnCompanyEdit($oldCompanyName, $newCompanyName)
{
    foreach ($_SESSION['employeelist'] as &$employee) {
        if ($employee->company === $oldCompanyName) {
            $employee->company = $newCompanyName;
        }
    }
    unset($employee);
}

if (isset($_POST['button_addnewemployee'])) {
    createemployee();
    header("Location: view_employees.php");
}

if (isset($_POST['button_editemployee'])) {
    updateemployee($_POST['employeeIndex']);
    header("Location: view_employees.php");
}

if (isset($_GET['deleteID']) && isset($_GET['type']) && $_GET['type'] == 'employee') {
    deleteemployee($_GET['deleteID']);
    header("Location: view_employees.php");
}

if (!isset($_SESSION['companylist'])) {
    $_SESSION['companylist'] = array();
}

function createcompany()
{
    $company = new model_company();
    $company->name = $_POST['name'];
    $company->address = $_POST['address'];
    $company->city = $_POST['city'];
    array_push($_SESSION['companylist'], $company);
    return $company;
}

function getallcompany()
{
    return $_SESSION['companylist'];
}

function getcompanybyindex($index)
{
    return $_SESSION['companylist'][$index];
}

function updatecompany($index)
{
    $oldCompanyName = $_SESSION['companylist'][$index]->name;
    $newCompanyName = $_POST['name'];

    $_SESSION['companylist'][$index]->name = $newCompanyName;
    $_SESSION['companylist'][$index]->address = $_POST['address'];
    $_SESSION['companylist'][$index]->city = $_POST['city'];

    updateEmployeesOnCompanyEdit($oldCompanyName, $newCompanyName);
}

function deletecompany($indexcompany)
{
    $companyName = $_SESSION['companylist'][$indexcompany]->name;

    updateEmployeesOnCompanyDelete($companyName);

    unset($_SESSION['companylist'][$indexcompany]);
    $_SESSION['companylist'] = array_values($_SESSION['companylist']);
}

if (isset($_POST['button_addnewcompany'])) {
    createcompany();
    header("Location: view_companies.php");
}

if (isset($_POST['button_editcompany'])) {
    updatecompany($_POST['companyIndex']);
    header("Location: view_companies.php");
}

if (isset($_GET['deleteID']) && isset($_GET['type']) && $_GET['type'] == 'company') {
    deletecompany($_GET['deleteID']);
    header("Location: view_companies.php");
}

?>