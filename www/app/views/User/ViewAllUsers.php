<div>
    <h1>ALL USERS</h1>
    <!-- Table to display all books -->
    <table border="1">
        <thead>
        <!-- Table headers -->
        <th>ID</th>
        <th>username</th>
        <th>email</th>
        <th>password</th>
        <th colspan="3">Actions</th>
        </thead>
        <!-- Loop through each book in the data array -->
        <?php foreach ($data['users'] as $user) : ?>
            <tr>
                <!-- Display book details -->
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <!-- Action links for each book -->
                <td><a href="<?= BASE_URL ?>user/delete/<?= $user['id']; ?>">Delete</a></td>
                <td><a href="<?= BASE_URL ?>user/update/<?= $user['email']; ?>">Update</a></td>
                <td><a href="<?= BASE_URL ?>user/id/<?= $user['id']; ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!-- Link to add a new book -->
    <a href="<?= BASE_URL ?>user/AddUser">Add new user</a>
</div>