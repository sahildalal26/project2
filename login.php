<?php
session_start();
include 'settings.php';

$error = '';

$max_attempts = 5;
$lockout_time = 180; // 3 minutes

// initializing counters if not set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['last_attempt_time'])) {
    $_SESSION['last_attempt_time'] = 0;
}

$locked_out = false;

// check if user is locked out
if (
    $_SESSION['login_attempts'] >= $max_attempts &&
    (time() - $_SESSION['last_attempt_time']) < $lockout_time
) {
    $locked_out = true;
    $remaining = $lockout_time - (time() - $_SESSION['last_attempt_time']);
    $error = "Too many failed attempts. Please wait before trying again.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = 0;
        header('Location: manage.php');
        exit;
    } else {
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();

        $remaining_attempts = $max_attempts - $_SESSION['login_attempts'];
        if ($remaining_attempts <= 0) {
            $error = "Too many failed attempts. Please wait 3 minutes before trying again.";
            $locked_out = true;
            $remaining = $lockout_time;
        } else {
            $error = "Invalid username or password. You have {$remaining_attempts} attempt(s) left.";
        }
    }
}
?>

<?php include 'header.inc'; ?>
<?php include 'nav.inc'; ?>

<main class="container">
  <section class="application-form">
    <h2>Login</h2>
    <form method="POST" class="login-form">
      <label>Username:
        <input type="text" name="username" required>
      </label>
      <label>Password:
        <input type="password" name="password" required>
      </label>
      <button type="submit" class="btn btn-primary" <?php echo $locked_out ? 'disabled' : ''; ?>>Login</button>
    </form>

    <?php if ($error): ?>
      <div class="submission-error">
        <p><?php echo htmlspecialchars($error); ?></p>
      </div>
    <?php endif; ?>

    <?php if ($locked_out): ?>
      <p id="countdown" class="countdown"></p>
      <script>
        let remaining = <?php echo $remaining; ?>;
        const countdownElem = document.getElementById('countdown');
        const button = document.querySelector('button');

        function updateCountdown() {
          if (remaining > 0) {
            const minutes = Math.floor(remaining / 60);
            const seconds = remaining % 60;
            countdownElem.textContent = `Please wait ${minutes}:${seconds.toString().padStart(2, '0')} before retrying.`;
            remaining--;
            setTimeout(updateCountdown, 1000);
          } else {
            countdownElem.textContent = "You can now try logging in again.";
            button.disabled = false;
          }
        }

        updateCountdown();
      </script>
    <?php endif; ?>
  </section>
</main>

<?php include 'footer.inc'; ?>
