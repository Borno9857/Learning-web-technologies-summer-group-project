<?php include __DIR__.'/../layout/header.php'; ?>
<h2>Activity Log</h2>
<table class="table table-bordered"><tr><th>Time</th><th>User</th><th>Event</th></tr>
<?php foreach ($logs as $l): ?>
<tr><td><?= htmlspecialchars($l['time']) ?></td><td><?= htmlspecialchars($l['user']) ?></td><td><?= htmlspecialchars($l['event']) ?></td></tr>
<?php endforeach; ?>
</table>
<a href="index.php?r=admin.export" class="btn btn-success">Export CSV</a>
<?php include __DIR__.'/../layout/footer.php'; ?>