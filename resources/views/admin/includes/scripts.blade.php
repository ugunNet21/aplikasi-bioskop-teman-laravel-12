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