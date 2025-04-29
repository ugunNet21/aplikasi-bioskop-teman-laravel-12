<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bioskop Teman - Admin Dashboard</title>
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
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-3 text-center">
            <h4 class="text-white mb-0"><i class="fas fa-ticket-alt"></i> <span>Bioskop Teman</span></h4>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="#dashboard" onclick="showSection('dashboard')"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            <a class="nav-link" href="#films" onclick="showSection('films')"><i class="fas fa-film"></i> <span>Films</span></a>
            <a class="nav-link" href="#cinemas" onclick="showSection('cinemas')"><i class="fas fa-building"></i> <span>Cinemas</span></a>
            <a class="nav-link" href="#schedules" onclick="showSection('schedules')"><i class="fas fa-clock"></i> <span>Schedules</span></a>
            <a class="nav-link" href="#tickets" onclick="showSection('tickets')"><i class="fas fa-ticket"></i> <span>Tickets</span></a>
            <a class="nav-link" href="#users" onclick="showSection('users')"><i class="fas fa-users"></i> <span>Users</span></a>
            <a class="nav-link" href="#settings" onclick="showSection('settings')"><i class="fas fa-cog"></i> <span>Settings</span></a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn btn-outline-secondary me-2" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="ms-auto d-flex align-items-center">
                    <button class="btn btn-outline-secondary me-2" onclick="toggleTheme()">
                        <i class="fas fa-moon"></i>
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard Section -->
        <div id="dashboard" class="section">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 mb-3">
                        <h5>Total Tickets Sold</h5>
                        <h3>1,234</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-3">
                        <h5>Active Films</h5>
                        <h3>12</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-3">
                        <h5>Revenue</h5>
                        <h3>Rp 50,000,000</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Films Section -->
        <div id="films" class="section d-none">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Manage Films</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFilmModal">Add Film</button>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Duration</th>
                                <th>Release Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="filmsTableBody">
                            <!-- Populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Other Sections (Placeholder) -->
        <div id="cinemas" class="section d-none">
            <h2>Manage Cinemas</h2>
            <p>Content for managing cinemas goes here.</p>
        </div>
        <div id="schedules" class="section d-none">
            <h2>Manage Schedules</h2>
            <p>Content for managing schedules goes here.</p>
        </div>
        <div id="tickets" class="section d-none">
            <h2>Manage Tickets</h2>
            <p>Content for managing tickets goes here.</p>
        </div>
        <div id="users" class="section d-none">
            <h2>Manage Users</h2>
            <p>Content for managing users goes here.</p>
        </div>
        <div id="settings" class="section d-none">
            <h2>Settings</h2>
            <p>Content for settings goes here.</p>
        </div>
    </div>

    <!-- Add Film Modal -->
    <div class="modal fade" id="addFilmModal" tabindex="-1" aria-labelledby="addFilmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFilmModalLabel">Add Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addFilmForm">
                        <div class="mb-3">
                            <label for="filmTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="filmTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="filmGenre" class="form-label">Genre</label>
                            <input type="text" class="form-label" id="filmGenre" required>
                        </div>
                        <div class="mb-3">
                            <label for="filmDuration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="filmDuration" required>
                        </div>
                        <div class="mb-3">
                            <label for="filmReleaseDate" class="form-label">Release Date</label>
                            <input type="date" class="form-control" id="filmReleaseDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="filmDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="filmDescription" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="filmPosterUrl" class="form-label">Poster URL</label>
                            <input type="url" class="form-control" id="filmPosterUrl">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addFilm()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Film Modal -->
    <div class="modal fade" id="editFilmModal" tabindex="-1" aria-labelledby="editFilmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFilmModalLabel">Edit Film</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFilmForm">
                        <input type="hidden" id="editFilmId">
                        <div class="mb-3">
                            <label for="editFilmTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editFilmTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFilmGenre" class="form-label">Genre</label>
                            <input type="text" class="form-label" id="editFilmGenre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFilmDuration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control" id="editFilmDuration" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFilmReleaseDate" class="form-label">Release Date</label>
                            <input type="date" class="form-control" id="editFilmReleaseDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editFilmDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editFilmDescription" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editFilmPosterUrl" class="form-label">Poster URL</label>
                            <input type="url" class="form-control" id="editFilmPosterUrl">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateFilm()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <!-- JavaScript for Interactivity -->
    <script>
        // Sample film data (replace with API fetch)
        let films = [
            { id: '550e8400-e29b-41d4-a716-446655440000', title: 'Avengers: Endgame', genre: 'Action', duration: 180, release_date: '2019-04-26', description: 'Superhero epic', poster_url: '' },
            { id: '550e8400-e29b-41d4-a716-446655440001', title: 'Inception', genre: 'Sci-Fi', duration: 148, release_date: '2010-07-16', description: 'Mind-bending thriller', poster_url: '' }
        ];

        // Initialize dashboard
        document.addEventListener('DOMContentLoaded', () => {
            loadFilms();
            // Check for saved theme
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
            }
        });

        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        }

        // Toggle theme
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
        }

        // Show section
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.add('d-none');
            });
            document.getElementById(sectionId).classList.remove('d-none');
            document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`.sidebar .nav-link[href="#${sectionId}"]`).classList.add('active');
        }

        // Load films into table
        function loadFilms() {
            const tbody = document.getElementById('filmsTableBody');
            tbody.innerHTML = '';
            films.forEach(film => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${film.title}</td>
                    <td>${film.genre}</td>
                    <td>${film.duration}</td>
                    <td>${film.release_date}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editFilm('${film.id}')"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="deleteFilm('${film.id}')"><i class="fas fa-trash"></i></button>
                    </td>
                `;
                tbody.appendChild(row);
            });
            // TODO: Replace with API call, e.g.:
            // fetch('/api/films').then(res => res.json()).then(data => films = data);
        }

        // Add film
        function addFilm() {
            const film = {
                id: generateUUID(), // Replace with proper UUID generation
                title: document.getElementById('filmTitle').value,
                genre: document.getElementById('filmGenre').value,
                duration: document.getElementById('filmDuration').value,
                release_date: document.getElementById('filmReleaseDate').value,
                description: document.getElementById('filmDescription').value,
                poster_url: document.getElementById('filmPosterUrl').value
            };
            films.push(film);
            loadFilms();
            bootstrap.Modal.getInstance(document.getElementById('addFilmModal')).hide();
            document.getElementById('addFilmForm').reset();
            // TODO: Send to API, e.g.:
            // fetch('/api/films', { method: 'POST', body: JSON.stringify(film) });
        }

        // Edit film
        function editFilm(id) {
            const film = films.find(f => f.id === id);
            document.getElementById('editFilmId').value = film.id;
            document.getElementById('editFilmTitle').value = film.title;
            document.getElementById('editFilmGenre').value = film.genre;
            document.getElementById('editFilmDuration').value = film.duration;
            document.getElementById('editFilmReleaseDate').value = film.release_date;
            document.getElementById('editFilmDescription').value = film.description;
            document.getElementById('editFilmPosterUrl').value = film.poster_url;
            new bootstrap.Modal(document.getElementById('editFilmModal')).show();
        }

        // Update film
        function updateFilm() {
            const id = document.getElementById('editFilmId').value;
            const index = films.findIndex(f => f.id === id);
            films[index] = {
                id,
                title: document.getElementById('editFilmTitle').value,
                genre: document.getElementById('editFilmGenre').value,
                duration: document.getElementById('editFilmDuration').value,
                release_date: document.getElementById('editFilmReleaseDate').value,
                description: document.getElementById('editFilmDescription').value,
                poster_url: document.getElementById('editFilmPosterUrl').value
            };
            loadFilms();
            bootstrap.Modal.getInstance(document.getElementById('editFilmModal')).hide();
            // TODO: Send to API, e.g.:
            // fetch(`/api/films/${id}`, { method: 'PUT', body: JSON.stringify(films[index]) });
        }

        // Delete film
        function deleteFilm(id) {
            if (confirm('Are you sure you want to delete this film?')) {
                films = films.filter(f => f.id !== id);
                loadFilms();
                // TODO: Send to API, e.g.:
                // fetch(`/api/films/${id}`, { method: 'DELETE' });
            }
        }

        // Generate UUID (placeholder; use proper library in production)
        function generateUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                const r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
    </script>
</body>
</html>