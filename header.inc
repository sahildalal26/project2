<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Meta keywords respond directly to feedback requesting clearer recruitment context -->
    <meta
      name="keywords"
      content="digital learning jobs, university recruitment, instructional design careers, research analyst roles, education technology positions"
    />
    <meta
      name="description"
      content="Digital Futures Learning Hub recruits specialists in digital learning, educational research, and instructional design for our university community."
    />
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Digital Futures Learning Hub'; ?></title>
    <link rel="stylesheet" href="styles/styles.css" />
    <?php echo isset($extraStyles) ? $extraStyles : ''; ?>
  </head>
  <?php $bodyClass = isset($bodyClass) ? $bodyClass : ''; ?>
  <body class="<?php echo htmlspecialchars($bodyClass); ?>">
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <header>
      <div>
        <img src="images/logo.png" alt="Digital Futures Learning Hub logo" width="80" />
        <h1>Digital Futures Learning Hub</h1>
        <p>Designing digital learning, supporting research impact</p>
      </div>
