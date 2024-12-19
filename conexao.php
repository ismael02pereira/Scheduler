<?php

// Configurações do banco de dados
const DB_HOST = 'localhost';
const DB_NAME = 'barber_shop';
const DB_USER = 'root';
const DB_PASS = '';

class Database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createBarber($data) {
        $sql = "INSERT INTO barbers (email, password, cod) VALUES (?, ?, ?)";
        $this->db->query($sql, [$data['email'], $data['password'], $data['cod']]);

        // Integração com o Google Calendar pode ser feita aqui
    }

    public function createUser($data) {
        $sql = "INSERT INTO users (email, code) VALUES (?, ?)";
        $this->db->query($sql, [$data['email'], $data['cod']]);

        // Integração com o Google Calendar pode ser feita aqui
    }

    public function loginUser($email, $cod) {

        $barber =  $this->db->query("SELECT * FROM barbers WHERE email = ? ", [$email]);
        $verificacao = $barber->fetch(PDO::FETCH_ASSOC);

        if($verificacao){
            return false;
        };

        $data = [
            'cod' => $cod,
            'email' => $email
        ];

        $this->createUser($data);

        $stmt = $this->db->query("SELECT * FROM users WHERE email = ?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;

    }

    public function loginBarber($email, $password) {
        $stmt = $this->db->query("SELECT * FROM barbers WHERE email = ?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $password == $user['password']) {
            return $user;
        }
        return false;
    }
    public function getUserByEmail($email) {
        $stmt = $this->db->query("SELECT * FROM barbers WHERE email = ?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function recoverPassword($email) {
        // Implementar envio de email para redefinição de senha
    }
}

class Appointment {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createAppointment($data) {
        $sql = "INSERT INTO appointments (name, email, file_path, date_time) VALUES (?, ?, ?, ?)";
        $this->db->query($sql, [$data['name'], $data['email'], $data['file_path'], $data['date_time']]);

        // Integração com o Google Calendar pode ser feita aqui
    }

    public function getAppointmentsByDate($date) {
        $stmt = $this->db->query("SELECT * FROM appointments WHERE DATE(date_time) = ?", [$date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Dashboard {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getStatistics() {
        $data = [];
        $data['total_clients'] = $this->db->query("SELECT COUNT(*) as total FROM appointments")->fetch(PDO::FETCH_ASSOC)['total'];
        $data['total_haircuts'] = $this->db->query("SELECT COUNT(*) as total FROM appointments WHERE service_type = 'haircut'")->fetch(PDO::FETCH_ASSOC)['total'];
        $data['total_beards'] = $this->db->query("SELECT COUNT(*) as total FROM appointments WHERE service_type = 'beard'")->fetch(PDO::FETCH_ASSOC)['total'];
        $data['others'] = $this->db->query("SELECT COUNT(*) as total FROM appointments WHERE service_type = 'other'")->fetch(PDO::FETCH_ASSOC)['total'];

        return $data;
    }
}

// Banco de dados SQL
/*
CREATE DATABASE barber_shop;

USE barber_shop;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    code VARCHAR(50) NOT NULL
);

CREATE TABLE barbers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    file_path VARCHAR(255),
    date_time DATETIME NOT NULL,
    service_type ENUM('haircut', 'beard', 'other') NOT NULL
);
*/
