CREATE TABLE IF NOT EXISTS user
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName  VARCHAR(255),
    isAdmin  BOOLEAN
);

CREATE TABLE IF NOT EXISTS post
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    content VARCHAR(255) NOT NULL,
    author  VARCHAR(255) NOT NULL,
    createdAt DATETIME,
    image VARCHAR(255),
    FOREIGN KEY (userId) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comment
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
    author  VARCHAR(255),
    createdAt DATETIME NOT NULL,
    userId INT,
    postId INT,
    supportId INT,
    FOREIGN KEY (postId) REFERENCES post(id) ON DELETE CASCADE,
    FOREIGN KEY (userId) REFERENCES user(id) ON DELETE CASCADE 
);

INSERT INTO user 
(
    username, 
    password, 
    email, 
    firstName, 
    lastName, 
    isAdmin
) 
    VALUES 
    (
        'USER 1', 
        '1234', 
        'user1@1.1', 
        'test', 
        'Test en majuscule', 
        0
);
