<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sign in to Counter.">
  <title>Counter | Sign in</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/pages.css">
</head>
<body class="page-background">
  <main class="auth-page">
    <a class="page-brand" href="../index.php"><span class="brand-mark">C</span><span>counter</span></a>
    <section class="auth-panel" aria-labelledby="login-title">
      <p class="eyebrow">Welcome back</p>
      <h1 id="login-title">Sign in to your workspace</h1>
      <p class="auth-intro">Enter your details to continue to the register.</p>
      <form class="auth-form" action="dashboard.php" method="get">
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" placeholder="you@example.com" autocomplete="email" required>
        <div class="label-row"><label for="password">Password</label><a href="#forgot">Forgot password?</a></div>
        <input id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required>
        <button class="primary-link form-button" type="submit">Continue <span>→</span></button>
      </form>
      <p class="auth-footer">New to Counter? <a href="../index.php">Learn more</a></p>
    </section>
  </main>
</body>
</html>
