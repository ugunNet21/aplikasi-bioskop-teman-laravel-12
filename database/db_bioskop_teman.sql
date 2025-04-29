USE db_bioskop_teman;

-- Table: user
CREATE TABLE user (
    id CHAR(36) PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    phone_number VARCHAR(20),
    role VARCHAR(20) DEFAULT 'customer', -- e.g., 'customer', 'admin'
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME
);

-- Table: cinema
CREATE TABLE cinema (
    id CHAR(36) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME
);

-- Table: studio
CREATE TABLE studio (
    id CHAR(36) PRIMARY KEY,
    cinema_id CHAR(36),
    name VARCHAR(50) NOT NULL, -- e.g., 'Studio 1', 'IMAX'
    type VARCHAR(20) NOT NULL, -- e.g., 'regular', 'imax', 'vip'
    capacity INT NOT NULL, -- Total seats
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (cinema_id) REFERENCES cinema(id) ON DELETE CASCADE
);

-- Table: film
CREATE TABLE film (
    id CHAR(36) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    duration INT NOT NULL, -- Duration in minutes
    genre VARCHAR(50),
    release_date DATE,
    poster_url VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME
);

-- Table: schedule
CREATE TABLE schedule (
    id CHAR(36) PRIMARY KEY,
    film_id CHAR(36),
    studio_id CHAR(36),
    show_time DATETIME NOT NULL,
    price DECIMAL(10, 2) NOT NULL, -- Ticket price
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (film_id) REFERENCES film(id) ON DELETE CASCADE,
    FOREIGN KEY (studio_id) REFERENCES studio(id) ON DELETE CASCADE
);

-- Table: seat
CREATE TABLE seat (
    id CHAR(36) PRIMARY KEY,
    studio_id CHAR(36),
    seat_number VARCHAR(10) NOT NULL, -- e.g., 'A1', 'B12'
    is_active TINYINT(1) DEFAULT 1, -- 1 = TRUE, 0 = FALSE
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (studio_id) REFERENCES studio(id) ON DELETE CASCADE
);

-- Table: ticket
CREATE TABLE ticket (
    id CHAR(36) PRIMARY KEY,
    user_id CHAR(36),
    schedule_id CHAR(36),
    seat_id CHAR(36),
    price DECIMAL(10, 2) NOT NULL,
    status VARCHAR(20) NOT NULL, -- e.g., 'booked', 'paid', 'cancelled'
    qr_code_url VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE SET NULL,
    FOREIGN KEY (schedule_id) REFERENCES schedule(id) ON DELETE CASCADE,
    FOREIGN KEY (seat_id) REFERENCES seat(id) ON DELETE CASCADE
);

-- Table: payment
CREATE TABLE payment (
    id CHAR(36) PRIMARY KEY,
    ticket_id CHAR(36),
    amount DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL, -- e.g., 'credit_card', 'ewallet'
    payment_status VARCHAR(20) NOT NULL, -- e.g., 'pending', 'completed', 'failed'
    transaction_id VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (ticket_id) REFERENCES ticket(id) ON DELETE CASCADE
);

-- Table: promotion
CREATE TABLE promotion (
    id CHAR(36) PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    discount_percentage DECIMAL(5, 2), -- e.g., 10.00 for 10%
    valid_from DATETIME NOT NULL,
    valid_until DATETIME NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    deleted_at DATETIME
);

-- Table: ticket_promotion
CREATE TABLE ticket_promotion (
    id CHAR(36) PRIMARY KEY,
    ticket_id CHAR(36),
    promotion_id CHAR(36),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ticket_id) REFERENCES ticket(id) ON DELETE CASCADE,
    FOREIGN KEY (promotion_id) REFERENCES promotion(id) ON DELETE CASCADE
);

-- Indexes for performance
CREATE INDEX idx_schedule_film_id ON schedule(film_id);
CREATE INDEX idx_schedule_studio_id ON schedule(studio_id);
CREATE INDEX idx_ticket_schedule_id ON ticket(schedule_id);