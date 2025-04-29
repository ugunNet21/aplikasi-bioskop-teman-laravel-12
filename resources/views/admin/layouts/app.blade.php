<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('admin.includes.styles')
</head>
<body>
    <!-- Sidebar -->
    @include('admin.includes.sidebar')

    <!-- Main Content -->
    <div class="content" id="content">
        <!-- Navbar -->
        @include('admin.includes.navbar')

        <!-- Dashboard Section -->
        @yield('content')

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

    <!-- Scripts -->
    @include('admin.includes.scripts')
</body>
</html>