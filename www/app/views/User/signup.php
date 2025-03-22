<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<main>
    <form method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            <?php if (isset($errors['username'])): ?>
                <span class="error"><?php echo $errors['username']; ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            <?php if (isset($errors['email'])): ?>
                <span class="error"><?php echo $errors['email']; ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            <?php if (isset($errors['password'])): ?>
                <span class="error"><?php echo $errors['password']; ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type="password" name="password2" id="password2" required><br><br>
            <?php if (isset($errors['password2'])): ?>
                <span class="error"><?php echo $errors['password2']; ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Register</button>
        <!--        <footer>Already a member? <a href="login.php">Login here</a></footer>-->
    </form>
</main>
</body>
</html>