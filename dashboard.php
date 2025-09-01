<?php include __DIR__.'/../layout/header.php'; ?>
<h2>Admin Dashboard</h2>
<p>Total Users: <?= count($users) ?> | Total Jobs: <?= count($jobs) ?></p>
<ul>
  <li><a href="index.php?r=admin.activity">View Activity Log</a></li>
  <li><a href="index.php?r=admin.export">Export Activity CSV</a></li>
</ul>
<?php include __DIR__.'/../layout/footer.php'; ?>