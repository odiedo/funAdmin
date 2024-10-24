
CREATE TABLE admin_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    id_number VARCHAR(20) NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    phone_number VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


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


CREATE TABLE wards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ward_name VARCHAR(100) NOT NULL,
    location_name VARCHAR(100) NOT NULL,
    sublocation_name VARCHAR(100) NOT NULL
);

-- data for Kaputiei North Ward
INSERT INTO wards (ward_name, location_name, sublocation_name)
VALUES 
('kaputiei_north', 'isinya', 'isinya_central'),
('kaputiei_north', 'isinya', 'ilpolosat'),
('kaputiei_north', 'kisaju', 'kisaju_central'),
('kaputiei_north', 'kisaju', 'noolturesh');

-- data for Kitengela Ward
INSERT INTO wards (ward_name, location_name, sublocation_name)
VALUES 
('kitengela', 'kitengela', 'kitengela_township'),
('kitengela', 'kitengela', 'milimani'),
('kitengela', 'noonkopir', 'noonkopir_north'),
('kitengela', 'noonkopir', 'noonkopir_south'),
('kitengela', 'athi_river', 'athi_river_north'),
('kitengela', 'athi_river', 'athi_river_south');

-- data for Sholinke/Oloosirkon Ward
INSERT INTO wards (ward_name, location_name, sublocation_name)
VALUES 
('sholinke_oloosirkon', 'oloosirkon', 'oloosirkon_east'),
('sholinke_oloosirkon', 'oloosirkon', 'oloosirkon_west'),
('sholinke_oloosirkon', 'sholinke', 'sholinke_north'),
('sholinke_oloosirkon', 'sholinke', 'sholinke_south'),
('sholinke_oloosirkon', 'muthwani', 'muthwani_central'),
('sholinke_oloosirkon', 'muthwani', 'muthwani_west');

-- data for Kenyawa-Poka Ward
INSERT INTO wards (ward_name, location_name, sublocation_name)
VALUES 
('kenyawa_poka', 'kenyawa', 'kenyawa_east'),
('kenyawa_poka', 'kenyawa', 'kenyawa_west'),
('kenyawa_poka', 'poka', 'poka_north'),
('kenyawa_poka', 'poka', 'poka_south'),
('kenyawa_poka', 'kajiado_south', 'kajiado_south_east'),
('kenyawa_poka', 'kajiado_south', 'kajiado_south_west');

-- data for Imaroro Ward
INSERT INTO wards (ward_name, location_name, sublocation_name)
VALUES 
('imaroro', 'emali', 'emali_central'),
('imaroro', 'emali', 'emali_north'),
('imaroro', 'olooitikoshi', 'olooitikoshi_central'),
('imaroro', 'olooitikoshi', 'olooitikoshi_east'),
('imaroro', 'imaroro', 'imaroro_north'),
('imaroro', 'imaroro', 'imaroro_south');

CREATE TABLE other_wards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ward_name VARCHAR(255) NOT NULL,
    location_name VARCHAR(255) NOT NULL,
    sublocation_name VARCHAR(255) NOT NULL
);



CREATE TABLE dashboard_summary_ward (
    summary_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ward VARCHAR(50) NOT NULL,
    ward_tot INT(11) DEFAULT 0,
    location VARCHAR(50) NOT NULL,
    location_tot INT(11) DEFAULT 0,
    sublocation VARCHAR(50) NOT NULL,
    sublocation_tot INT(11) DEFAULT 0
);

CREATE TABLE dashboard_summary_other_ward (
    other_summary_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ward VARCHAR(50) NOT NULL,
    ward_tot INT(11) DEFAULT 0,
    location VARCHAR(50) NOT NULL,
    location_tot INT(11) DEFAULT 0,
    sublocation VARCHAR(50) NOT NULL,
    sublocation_tot INT(11) DEFAULT 0
);

-- Clerks Table
CREATE TABLE clerks (
    clerk_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    tot_entries INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active'
);
INSERT INTO clerks (fullname, email, phone, password, tot_entries, status) 
VALUES 
    ('Ezra Beech', 'ezrabeech@gmail.com', '0712345678', 'password_hashed_1', 120, 'active'),
    ('Roy Imo', 'royimo@gmail.com', '0718765432', 'password_hashed_2', 98, 'active'),
    ('Mercy Esike', 'esmeresike@gmail.com', '0712233445', 'password_hashed_3', 45, 'active'),
    ('Jude Ojaamong', 'judeojamong@gmail.com', '0712233445', 'password_hashed_3', 45, 'active');

-- Auto Vetting Issues Table
CREATE TABLE vetting_issues (
    id INT AUTO_INCREMENT PRIMARY KEY,
    issue_description VARCHAR(255) NOT NULL,
    vet_status ENUM('vetted', 'not_vetted') DEFAULT 'not_vetted',
    total_students_affected INT DEFAULT 0
);

INSERT INTO vetting_issues (issue_description, vet_status, total_students_affected) VALUES
('No birth certificate provided', 'not_vetted', 0),
('No admission number provided', 'not_vetted', 0),
('No school provided', 'not_vetted', 0),
('No father id number provided', 'not_vetted', 0),
('No mother id number provided', 'not_vetted', 0),
('No father details provided', 'not_vetted', 0),
('No mother details provided', 'not_vetted', 0),
('No parents details provided', 'not_vetted', 0);












CREATE TABLE `test_data_teso` (
  `application_id` int(11) PRIMARY KEY NOT NULL,
  `app_id` int(5) UNIQUE KEY NOT NULL,  ---generate this
  `email` varchar(26) DEFAULT NULL,     ---use clerk_id(user_id)
  `name` varchar(24) DEFAULT NULL,      ---student_name
  `gender` varchar(6) DEFAULT NULL,     ---gender
  `dob` varchar(10) DEFAULT NULL,       ---set the current date
  `birth_cert_no` bigint(10) DEFAULT NULL,   ---birth certificate no
  `phone` bigint(10) DEFAULT NULL,           --- applicant phone number
  `class` int(1) DEFAULT NULL,              ----form or class
  `school` varchar(56) DEFAULT NULL,       ----school
  `adm_no` varchar(19) DEFAULT NULL,      ---adm no
  `year_of_admission` int(4) DEFAULT NULL,   ---set the current year minus class number(e.g  2024 - 4 you get 2020)
  `course_duration` int(1) DEFAULT NULL,    -----use zero here
  `expected_completion` int(4) DEFAULT NULL,     ---use the current year as default
  `education_level` varchar(10) DEFAULT NULL,    ----education level
  `fee_balance` int(5) DEFAULT NULL,          ---fee balance
  `fname` varchar(29) DEFAULT NULL,           --- father name 
  `id_number` int(9) DEFAULT NULL,           ----father id number
  `dead_alive` varchar(5) DEFAULT NULL,      ----father_status(dead or alive)
  `occupation` varchar(15) DEFAULT NULL,     ----use peasant as default
  `mname` varchar(25) DEFAULT NULL,          ----mother name
  `m_id_number` int(9) DEFAULT NULL,          ----mother id number
  `m_phone` bigint(10) DEFAULT NULL,       -----use applicant phone number
  `m_dead_alive` varchar(5) DEFAULT NULL,     ----mother_status(dead or alive)
  `m_occupation` varchar(14) DEFAULT NULL,     ----use peasant as deafault
  `ward` varchar(19) DEFAULT NULL,             ---ward
  `location` varchar(13) DEFAULT NULL,          ----location
  `subLocation` varchar(20) DEFAULT NULL,          ----sublocation
  `disability` varchar(3) DEFAULT NULL,            ----disability(yes or no)
  `orphan` varchar(14) DEFAULT NULL,           --- orphan(if the father status is dead and mother dead, then use total orphan here, if one of the parent is dead and the other alive, set as partial, if both parents are alive, then set orphan field as  no"
  `terms` varchar(5) DEFAULT NULL,           ----set to yes
  `declaration` varchar(5) DEFAULT NULL,        ----set to yes
  `process_status` varchar(8) DEFAULT NULL,     ----set to complete
  `status` varchar(10) DEFAULT NULL             ----set to pending
);

remember to add dashboard sumary one table

