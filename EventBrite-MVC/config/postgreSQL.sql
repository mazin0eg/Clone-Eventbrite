

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    avatar VARCHAR(50),
    username VARCHAR(50),
    email VARCHAR(55),
    phone VARCHAR(20),
    password VARCHAR(55),
    role VARCHAR(20) CHECK (role IN ('admin', 'participant', 'organisateur'))
);

CREATE TABLE tag (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55),
    id_admin INT,
    CONSTRAINT fk_tag_admin FOREIGN KEY (id_admin) REFERENCES "user"(id) ON DELETE SET NULL
);

CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(55),
    id_admin INT,
    CONSTRAINT fk_category_admin FOREIGN KEY (id_admin) REFERENCES "user"(id) ON DELETE SET NULL
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
    CONSTRAINT fk_event_organisateur FOREIGN KEY (id_organisateur) REFERENCES "user"(id) ON DELETE CASCADE,
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
    dateDeReservation DATE,
    montant FLOAT,
    status VARCHAR(55),
    id_event INT,
    id_participant INT,
    CONSTRAINT fk_ticket_event FOREIGN KEY (id_event) REFERENCES event(id) ON DELETE CASCADE,
    CONSTRAINT fk_ticket_participant FOREIGN KEY (id_participant) REFERENCES "user"(id) ON DELETE CASCADE
);
