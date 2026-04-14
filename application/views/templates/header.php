<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Perpustakaan Digital</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Modern Color Palette */
            --primary-color: #4338ca; /* Indigo 700 */
            --primary-hover: #3730a3; /* Indigo 800 */
            --primary-light: #e0e7ff; /* Indigo 100 */
            --secondary-color: #0ea5e9; /* Light Blue 500 */
            --accent-color: #8b5cf6; /* Violet 500 */
            
            --dark-color: #0f172a; /* Slate 900 */
            --text-main: #334155; /* Slate 700 */
            --text-muted: #64748b; /* Slate 500 */
            --bg-body: #f8fafc; /* Slate 50 */
            --light-color: #ffffff;
            
            --success-color: #10b981; /* Emerald 500 */
            --success-light: #d1fae5;
            --warning-color: #f59e0b; /* Amber 500 */
            --warning-light: #fef3c7;
            --danger-color: #ef4444; /* Red 500 */
            --danger-light: #fee2e2;
            --info-color: #3b82f6; /* Blue 500 */
            --info-light: #dbeafe;

            /* Shadows & Effects */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --transition-all: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Layout Structure - Floating Island */
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #e2e8f0; /* Grey slate background for contrast */
            color: var(--text-main);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
            background-color: transparent;
            padding: 24px;
        }

        .main-content {
            flex: 1;
            margin-left: 280px; /* Space for the 260px sidebar + 20px gap */
            padding: 32px 40px;
            background-color: var(--light-color);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            min-height: calc(100vh - 48px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        /* Modern Typography */
        h1, h2, h3, h4, h5, h6 {
            color: var(--dark-color);
            font-weight: 600;
            letter-spacing: -0.025em;
        }

        /* Cards Restyled */
        .card {
            border: none;
            background: var(--light-color);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(226, 232, 240, 0.8);
            transition: var(--transition-all);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            border-color: rgba(226, 232, 240, 1);
        }

        .card-header {
            background: rgba(248, 250, 252, 0.5);
            backdrop-filter: blur(8px);
            color: var(--dark-color);
            border-bottom: 1px solid #e2e8f0;
            border-radius: var(--radius-xl) var(--radius-xl) 0 0 !important;
            padding: 20px 24px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 24px;
        }

        /* Modern Buttons */
        .btn {
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius-md);
            transition: var(--transition-all);
            border: none;
            box-shadow: var(--shadow-sm);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        
        .btn:active {
            transform: translateY(0);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: white;
        }

        .btn-info {
            background-color: var(--info-color);
            color: white;
        }
        
        .btn-light {
            background-color: #f1f5f9;
            color: var(--text-main);
            box-shadow: none;
        }
        
        .btn-light:hover {
            background-color: #e2e8f0;
        }

        /* Tables Enhancements */
        .table-responsive {
            border-radius: var(--radius-md);
        }

        .table {
            color: var(--text-main);
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: #f8fafc;
            color: var(--text-muted);
            border-bottom: 2px solid #e2e8f0;
            border-top: none;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table tbody td {
            padding: 16px 24px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
            transition: var(--transition-all);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover td {
            background-color: #f8fafc;
        }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: var(--radius-md);
            padding: 0.75rem 1rem;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            color: var(--dark-color);
            transition: var(--transition-all);
            font-family: inherit;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--primary-light);
            outline: none;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        /* Badges */
        .badge {
            padding: 0.35em 0.85em;
            border-radius: 9999px;
            font-weight: 500;
            font-size: 0.8rem;
            letter-spacing: 0.025em;
        }
        
        .bg-primary { background-color: var(--primary-light) !important; color: var(--primary-color) !important; }
        .bg-success { background-color: var(--success-light) !important; color: var(--success-color) !important; }
        .bg-warning { background-color: var(--warning-light) !important; color: #b45309 !important; }
        .bg-danger { background-color: var(--danger-light) !important; color: var(--danger-color) !important; }
        .bg-info { background-color: var(--info-light) !important; color: var(--info-color) !important; }

        /* Alerts */
        .alert {
            border: none;
            border-radius: var(--radius-lg);
            padding: 1rem 1.25rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        
        .alert-success { background-color: var(--success-light); color: #065f46; }
        .alert-danger { background-color: var(--danger-light); color: #991b1b; }

        /* Page Headers */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        /* Dashboard Statistics Cards */
        .stat-card {
            background: var(--light-color);
            border-radius: var(--radius-xl);
            padding: 24px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: var(--shadow-sm);
            transition: var(--transition-all);
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: var(--primary-light);
        }

        .stat-card .icon {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            box-shadow: var(--shadow-md);
        }

        .stat-card .value {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--dark-color);
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .stat-card .label {
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 500;
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }

        /* UI Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-content > * {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        .main-content > *:nth-child(1) { animation-delay: 0.1s; }
        .main-content > *:nth-child(2) { animation-delay: 0.15s; }
        .main-content > *:nth-child(3) { animation-delay: 0.2s; }
        .main-content > *:nth-child(4) { animation-delay: 0.25s; }
        .main-content > *:nth-child(5) { animation-delay: 0.3s; }
        .main-content > *:nth-child(6) { animation-delay: 0.35s; }
        .main-content > *:nth-child(7) { animation-delay: 0.4s; }
        .main-content > *:nth-child(8) { animation-delay: 0.45s; }
    </style>
</head>
<body>
