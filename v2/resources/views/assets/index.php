<h2>Asset List</h2>

<table>
    <?php while ($row = $assets->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>