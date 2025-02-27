CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    avatar VARCHAR(50),
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(55) UNIQUE NOT NULL,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL, -- Increased for security
    role VARCHAR(20) CHECK (role IN ('admin', 'participant', 'organisateur')),
    active BOOLEAN DEFAULT TRUE
);

CREATE TABLE admin (
    id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    additional_admin_info VARCHAR(255)
);

CREATE TABLE participant (
    id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    additional_participant_info VARCHAR(255)
);

CREATE TABLE organisateur (
    id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
    additional_organisateur_info VARCHAR(255)
);

CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55) UNIQUE NOT NULL,
    id_admin INT,
    CONSTRAINT fk_tag_admin FOREIGN KEY (id_admin) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55) UNIQUE NOT NULL,
    id_admin INT,
    CONSTRAINT fk_category_admin FOREIGN KEY (id_admin) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE event (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    lieu VARCHAR(50),
    prix FLOAT CHECK (prix >= 0),
    capacite INT CHECK (capacite >= 0),
    id_organisateur INT NOT NULL,
    id_category INT,
    CONSTRAINT fk_event_organisateur FOREIGN KEY (id_organisateur) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_event_category FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE SET NULL
);

CREATE TABLE eventTag (
    id SERIAL PRIMARY KEY,
    id_event INT NOT NULL,
    id_tag INT NOT NULL,
    CONSTRAINT fk_eventTag_event FOREIGN KEY (id_event) REFERENCES event(id) ON DELETE CASCADE,
    CONSTRAINT fk_eventTag_tag FOREIGN KEY (id_tag) REFERENCES tag(id) ON DELETE CASCADE
);

CREATE TABLE ticket (
    id SERIAL PRIMARY KEY,
    type VARCHAR(20) CHECK (type IN ('free', 'paid', 'vip')),
    total_quantity INT CHECK (total_quantity >= 0), 
    price FLOAT CHECK (price >= 0), -- Free tickets will have price = 0
    id_event INT NOT NULL,
    CONSTRAINT fk_ticket_event FOREIGN KEY (id_event) REFERENCES event(id) ON DELETE CASCADE
);

CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    id_ticket INT NOT NULL,
    id_participant INT NOT NULL,
    reservation_date DATE DEFAULT CURRENT_DATE,
    CONSTRAINT fk_reservation_ticket FOREIGN KEY (id_ticket) REFERENCES ticket(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservation_participant FOREIGN KEY (id_participant) REFERENCES users(id) ON DELETE CASCADE
);
