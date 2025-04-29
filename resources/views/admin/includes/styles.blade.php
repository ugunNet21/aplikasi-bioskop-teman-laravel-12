    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS for Modern Look -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #1a1a2e;
            color: #fff;
            transition: all 0.3s;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .nav-link {
            color: #d1d1d6;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #16213e;
            color: #fff;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .content.expanded {
            margin-left: 80px;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-primary {
            background-color: #1a1a2e;
            border-color: #1a1a2e;
        }

        .btn-primary:hover {
            background-color: #16213e;
            border-color: #16213e;
        }

        .dark-mode {
            background-color: #1e1e2f;
            color: #d1d1d6;
        }

        .dark-mode .navbar,
        .dark-mode .card,
        .dark-mode .table {
            background-color: #2a2a3b;
            color: #d1d1d6;
        }

        .dark-mode .table th,
        .dark-mode .table td {
            border-color: #3a3a4b;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar.collapsed {
                width: 0;
            }

            .content {
                margin-left: 80px;
            }

            .content.expanded {
                margin-left: 0;
            }
        }
    </style>
