CREATE TABLE IF NOT EXISTS user
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    first_name VARCHAR(255),
    last_name  VARCHAR(255),
    is_admin  BOOLEAN NOT NULL
);

CREATE TABLE IF NOT EXISTS post
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    content VARCHAR(255) NOT NULL,
    author  VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    image BLOB,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comment
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author  VARCHAR(255),
    created_at DATETIME NOT NULL,
    user_id INT,
    post_id INT,
    support_id INT,
    FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE 
);