<?php
// index.php - simple beautiful landing page using Bootstrap 5
$now = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));
$greetingHour = (int)$now->format('H');
if ($greetingHour < 12) $greeting = 'Good morning';
elseif ($greetingHour < 18) $greeting = 'Good afternoon';
else $greeting = 'Good evening';

$siteTitle = 'PHP & Bootstrap Lab';
$subtitle = 'Simple, clean, and responsive demo page';
$phpVer = phpversion();
$serverName = $_SERVER['SERVER_NAME'] ?? 'localhost';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($siteTitle) ?></title>

    <!-- Bootstrap 5 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
      :root{
        --accent: #6f42c1;
        --muted: #6c757d;
      }
      .hero {
        background: linear-gradient(135deg, rgba(111,66,193,0.12), rgba(99,102,241,0.06));
        border-radius: 16px;
        padding: 3rem;
      }
      .card-glow{
        box-shadow: 0 6px 20px rgba(99,102,241,0.08);
        border: none;
      }
      footer small { color: var(--muted); }
      .badge-accent { background: linear-gradient(90deg,#7b61d9,#5b8df7); color: #fff; }
    </style>
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <svg class="me-2" width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="24" height="24" rx="6" fill="#6f42c1"/>
            <path d="M7 12h10M7 8h10M7 16h10" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
          <div>
            <div style="line-height:1; font-weight:600"><?= htmlspecialchars($siteTitle) ?></div>
            <small class="text-muted"><?= htmlspecialchars($subtitle) ?></small>
          </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu" aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="vulnerable.php">🔐 Path Traversal</a></li>
            <li class="nav-item"><a class="nav-link" href="rfi.php">🔥 RFI Lab</a></li>
            <li class="nav-item"><a class="btn btn-outline-primary ms-2" href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container my-5">
      <section class="hero mb-4">
        <div class="row align-items-center">
          <div class="col-md-7">
            <h1 class="display-5 fw-bold"><?= $greeting ?> 👋</h1>
            <p class="lead text-muted mb-4">
              Welcome to <span class="fw-semibold"><?= htmlspecialchars($siteTitle) ?></span> — a simple demo page built with PHP and Bootstrap.
              This template is perfect as a starting point for labs, demos, or small projects.
            </p>

            <div class="d-flex gap-2">
              <a href="#features" class="btn btn-primary btn-lg">Explore features</a>
              <a href="#about" class="btn btn-outline-secondary btn-lg">Learn more</a>
            </div>

            <div class="mt-4">
              <span class="badge badge-accent rounded-pill py-2 px-3">Server: <?= htmlspecialchars($serverName) ?></span>
              <span class="ms-2 text-muted small">PHP <?= htmlspecialchars($phpVer) ?> · <?= $now->format('Y-m-d H:i') ?> (Europe/Amsterdam)</span>
            </div>
          </div>

          <div class="col-md-5 text-center mt-4 mt-md-0">
            <div class="card card-glow p-3">
              <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=60"
                   alt="abstract art" class="img-fluid rounded" style="max-height:220px; object-fit:cover;">
              <div class="card-body">
                <h6 class="card-title mb-1">Ready to build</h6>
                <p class="card-text text-muted small">Drop this file into your webroot and customize it.</p>
                <a class="btn btn-sm btn-outline-primary" href="#">Get started</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="features" class="mb-5">
        <div class="row g-3">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Responsive layout</h5>
                <p class="card-text text-muted">Mobile-first design with Bootstrap's grid and utilities.</p>
                <p class="mb-0"><small class="text-muted">Reflow-friendly components for any screen size.</small></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Clean markup</h5>
                <p class="card-text text-muted">Readable HTML + tiny PHP snippets — easy to extend and secure.</p>
                <p class="mb-0"><small class="text-muted">Escape output with <code>htmlspecialchars()</code>.</small></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">Accessible</h5>
                <p class="card-text text-muted">Semantic HTML, proper aria attributes and focusable controls.</p>
                <p class="mb-0"><small class="text-muted">Good baseline for inclusive sites.</small></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="mb-5">
        <div class="row">
          <div class="col-lg-7">
            <h3>About this template</h3>
            <p class="text-muted">
              This single-file template is meant to be a pleasant starting point. It includes:
            </p>
            <ul class="text-muted">
              <li>Bootstrap 5 via CDN</li>
              <li>Tiny dynamic PHP (time, server, version)</li>
              <li>Responsive hero, cards and a contact area</li>
            </ul>
            <p class="text-muted mb-0">Feel free to copy sections into your own project or customize the CSS variables above.</p>
          </div>

          <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Quick info</h6>
                <p class="mb-1"><strong>Host</strong><br><small class="text-muted"><?= htmlspecialchars($serverName) ?></small></p>
                <p class="mb-1"><strong>PHP</strong><br><small class="text-muted"><?= htmlspecialchars($phpVer) ?></small></p>
                <p class="mb-0"><strong>Time</strong><br><small class="text-muted"><?= $now->format('Y-m-d H:i:s') ?> (Europe/Amsterdam)</small></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="mb-5">
        <div class="row">
          <div class="col-md-7">
            <h4>Contact</h4>
            <p class="text-muted">This form is a static demo — hook it to your backend as needed.</p>

            <form class="row g-3" method="post" action="#">
              <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Your name">
              </div>
              <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="you@example.com">
              </div>
              <div class="col-12">
                <label for="inputMessage" class="form-label">Message</label>
                <textarea class="form-control" id="inputMessage" name="message" rows="4" placeholder="Say hi..."></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Send message</button>
                <button type="reset" class="btn btn-outline-secondary ms-2">Reset</button>
              </div>
            </form>
          </div>

          <div class="col-md-5">
            <div class="card card-glow p-3 mb-3">
              <div class="card-body">
                <h6 class="card-title">🔐 Path Traversal Lab</h6>
                <p class="small text-muted mb-2">Learn path traversal, LFI, and PHP wrappers exploitation</p>
                <a href="vulnerable.php" class="btn btn-sm btn-primary w-100 mb-2">Start Path Traversal Lab</a>
                <a href="lab_guide.php" class="btn btn-sm btn-outline-secondary w-100">View Guide</a>
              </div>
            </div>
            <div class="card card-glow p-3">
              <div class="card-body">
                <h6 class="card-title">🔥 RFI to RCE Lab</h6>
                <p class="small text-muted mb-2">Master Remote File Inclusion leading to Remote Code Execution</p>
                <a href="rfi.php" class="btn btn-sm btn-danger w-100 mb-2">Start RFI Lab</a>
                <p class="small text-danger mb-0">⚠️ Critical vulnerability - extreme caution!</p>
                <hr>
                <h6 class="card-title mt-3">Lab tips</h6>
                <ul class="small text-muted mb-0">
                  <li>Keep your lab local (bind to 127.0.0.1) while testing.</li>
                  <li>Use `htmlspecialchars()` for all output derived from user input.</li>
                  <li>Never deploy vulnerable apps publicly.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <footer class="py-4 bg-white border-top">
      <div class="container d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">© <?= date('Y') ?> <?= htmlspecialchars($siteTitle) ?> — built with Bootstrap & PHP</small>
        </div>
        <div>
          <small class="text-muted">Made for your lab • not for production</small>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>