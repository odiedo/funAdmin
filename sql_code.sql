CREATE TABLE residents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL UNIQUE,
    ward VARCHAR(50),
    location VARCHAR(50),
    sublocation VARCHAR(50),
    status ENUM('active', 'inactive') DEFAULT 'active'
);

CREATE TABLE recent_sms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ward VARCHAR(100),
    location VARCHAR(100),
    sublocation VARCHAR(100),
    message TEXT,
    sent_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    office ENUM('PSC', 'CDF') NOT NULL,
    employee_post VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE recent_internal_sms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    target VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    time_sent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


