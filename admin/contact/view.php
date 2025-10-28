<?php
require ('../../sory/users.php');
$id = $_POST['id'] ?? '';

$stmt = $conn->prepare("SELECT * FROM contact WHERE id = ? ");
$stmt->bind_param('s', $id);
$stmt->execute();
$result=$stmt->get_result();

$contact=$result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
            font-family: "Nunito", sans-serif;
        }

        /* Sidebar styling */
        .sidebar {
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            min-height: 100vh;
            color: white;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            border-radius: 10px;
            margin: 4px 8px;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .sidebar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1.25rem;
        }

        /* Top navbar */
        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e3e6f0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .topbar .nav-link {
            color: #5a5c69;
        }

        .topbar .nav-link:hover {
            color: #4e73df;
        }

        /* Page content */
        .content-wrapper {
            padding: 30px;
            background: #f9fbfd;
            min-height: 100vh;
        }

        /* Search box */
        .search-box input {
            border-radius: 25px;
            border: 1px solid #d1d3e2;
            padding: 8px 15px;
        }

        /* Sidebar toggle */
        #sidebarToggle {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
        }

        /* Logo icon */
        .sidebar-brand-icon {
            font-size: 1.6rem;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3 shadow">
        <a href="index.php" class="sidebar-brand d-flex align-items-center mb-3 text-white text-decoration-none">
            <i class="fa-solid fa-gauge-high sidebar-brand-icon"></i>
            <span>Admin Panel</span>
        </a>
        <hr class="text-white">

        <ul class="nav flex-column mb-auto">
            <li><a href="../index.php" class="nav-link active"><i class="fa-solid fa-home me-2"></i> Dashboard</a></li>
            <li><a href="../tables.php" class="nav-link"><i class="fa-solid fa-table me-2"></i> Jadval</a></li>
            <li><a href="../charts.php" class="nav-link"><i class="fa-solid fa-chart-line me-2"></i> Statistika</a></li>
            <li><a href="../contact/view.php" class="nav-link"><i class="fa-solid fa-envelope me-2"></i> Contact</a></li>
            <li><a href="../blank.php" class="nav-link"><i class="fa-solid fa-file me-2"></i> Blank</a></li>
        </ul>

        <hr class="text-white">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=Admin" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark shadow">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="content-wrapper flex-grow-1">
        <nav class="navbar topbar mb-4 shadow-sm">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <button id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>

                <form class="search-box d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Qidirish...">
                    <button class="btn btn-primary btn-sm"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
        </nav>
<div class="container-fluid mt-4">
    <?php if ($contact): ?>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-envelope"></i> Contact #<?= htmlspecialchars($contact['id']) ?></h4>
            </div>
            <div class="card-body p-4">
                <div class="mb-3">
                    <h5 class="text-muted"><i class="fas fa-user"></i> Email:</h5>
                    <p class="fs-5 fw-semibold"><?= htmlspecialchars($contact['email']) ?></p>
                </div>

                <div class="mb-3">
                    <h5 class="text-muted"><i class="fas fa-comment-dots"></i> Xabar:</h5>
                    <p class="fs-5"><?= nl2br(htmlspecialchars($contact['message'])) ?></p>
                </div>

                <a href="../contact.php" class="btn btn-secondary mt-3">
                    <i class="fas fa-arrow-left"></i> Orqaga qaytish
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-5">
            <i class="fas fa-exclamation-triangle"></i> Bunday ID bilan xabar topilmadi.
        </div>
    <?php endif; ?>
</div>

