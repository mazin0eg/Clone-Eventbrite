

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    avatar VARCHAR(50),
    username VARCHAR(50),
    email VARCHAR(55),
    phone VARCHAR(20),
    password VARCHAR(55),
    role VARCHAR(20) CHECK (role IN ('admin', 'participant', 'organisateur'))
);



CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    additional_admin_info VARCHAR(255)
) INHERITS ("user");

CREATE TABLE participant (
    id SERIAL PRIMARY KEY,
    additional_participant_info VARCHAR(255)
) INHERITS ("user");

CREATE TABLE organisateur (
    id SERIAL PRIMARY KEY,
    additional_organisateur_info VARCHAR(255)
) INHERITS ("user");





CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55),
    id_admin INT,
    CONSTRAINT fk_tag_admin FOREIGN KEY (id_admin) REFERENCES "admin"(id) ON DELETE SET NULL
);

CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55),
    id_admin INT,
    CONSTRAINT fk_category_admin FOREIGN KEY (id_admin) REFERENCES "admin"(id) ON DELETE SET NULL
);

CREATE TABLE event (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(50),
    description VARCHAR(255),
    date DATE,
    lieu VARCHAR(50),
    prix FLOAT,
    capacite INT,
    id_organisateur INT,
    id_category INT,
    CONSTRAINT fk_event_organisateur FOREIGN KEY (id_organisateur) REFERENCES "organisateur"(id) ON DELETE CASCADE,
    CONSTRAINT fk_event_category FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE SET NULL
);

CREATE TABLE eventTag (
    id SERIAL PRIMARY KEY,
    id_event INT,
    id_tag INT,
    CONSTRAINT fk_eventTag_event FOREIGN KEY (id_event) REFERENCES event(id) ON DELETE CASCADE,
    CONSTRAINT fk_eventTag_tag FOREIGN KEY (id_tag) REFERENCES tag(id) ON DELETE CASCADE
);

CREATE TABLE ticket (
    id SERIAL PRIMARY KEY,
    type VARCHAR(20) CHECK (type IN ('free', 'paid', 'vip')),
    total_quantity INT CHECK (total_quantity >= 0), 
    price FLOAT CHECK (price >= 0), -- Free tickets will have price = 0
    id_event INT,
    CONSTRAINT fk_ticket_event FOREIGN KEY (id_event) REFERENCES event(id) ON DELETE CASCADE
);

CREATE TABLE reservation (
    id SERIAL PRIMARY KEY,
    id_ticket INT,
    id_participant INT,
    reservation_date DATE DEFAULT CURRENT_DATE,
    CONSTRAINT fk_reservation_ticket FOREIGN KEY (id_ticket) REFERENCES ticket(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservation_participant FOREIGN KEY (id_participant) REFERENCES "participant"(id) ON DELETE CASCADE
);