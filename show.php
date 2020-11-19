<?php
session_start();
if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from useraccounts where id = '$_GET[id]'"))
    {
      header("location:mindex.php");
    }
  } ?>
</head>
<body style="background:url(images/bg2.jpg);background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/log2.png" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="mindex.php">User Details <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Staff Accounts</a></li>
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add User</a></li>
    </ul>
    <?php include 'msideButton.php'; ?>
  </div>
</nav><br><br><br>
<?php 
  $array = $con->query("select * from useraccounts,branch where useraccounts.id = '$_GET[id]' AND useraccounts.branch = branch.branchId");
  $row = $array->fetch_assoc();
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
   <b> Account profile of <?php echo $row['name'];?></b>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-dark">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $row['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['accountNo'] ?></th>
        </tr>
        <tr>
          <td>Branch Name</td>
          <th><?php echo $row['branchName'] ?></th>
          <td>Brach Code</td>
          <th><?php echo $row['branchNo'] ?></th>
        </tr>
        <tr>
          <td>Current Balance</td>
          <th><?php echo $row['balance'] ?></th>
          <td>Account Type</td>
          <th><?php echo $row['accountType'] ?></th>
        </tr>
        <tr>
          <td>City</td>
          <th><?php echo $row['city'] ?></th>
          <td>Contact Number</td>
          <th><?php echo $row['number'] ?></th>
        </tr>
        <tr>
          <td>Address</td>
          <th><?php echo $row['address'] ?></th>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
    <?php echo bankname; ?>
  </div>
</div>

</body>
</html>