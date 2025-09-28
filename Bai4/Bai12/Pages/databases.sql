-- Tạo cơ sở dữ liệu
CREATE DATABASE CNWAT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE CNWAT;

-- Bảng classes
CREATE TABLE classes(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ClassName VARCHAR(255) NOT NULL,
    ClassDescription VARCHAR(255) NOT NULL,
    NumOfStudents INT NOT NULL
);

-- Dữ liệu mẫu cho classes
INSERT INTO classes(ClassName, ClassDescription, NumOfStudents) 
VALUES 
('AT16G', 'Lớp chuyên Hóa', 65),
('AT16H', 'Lớp chuyên Toán', 43),
('AT16D', 'Lớp chuyên Lý', 42),
('AT16B', 'Lớp chuyên Anh', 55),
('AT17A', 'Lớp Tin học nâng cao', 50),
('AT17C', 'Lớp Sinh học chuyên', 40),
('AT17E', 'Lớp Văn học', 60),
('AT18F', 'Lớp Sử - Địa', 45);

-- Bảng students
CREATE TABLE students(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    StudentName VARCHAR(255) NOT NULL,
    StudentGender VARCHAR(50) NOT NULL,
    StudentAddress VARCHAR(255) NOT NULL,
    StudentEmail VARCHAR(255) NOT NULL UNIQUE,
    ClassID INT NOT NULL,
    FOREIGN KEY (ClassID) REFERENCES classes(ID) ON DELETE CASCADE
);

-- Dữ liệu mẫu cho students
INSERT INTO students(StudentName, StudentGender, StudentAddress, StudentEmail, ClassID) VALUES
('Nguyễn Trường Giang Huy', 'Nam', 'Quảng Ninh', 'huygiang@example.com', 1),
('Nguyễn Hà Nhi', 'Nữ', 'Hà Nội', 'hanhi@example.com', 1),
('Hoàng Văn An', 'Nam', 'Hải Phòng', 'hoangan@example.com', 1),
('Trần Mai Anh', 'Nữ', 'Quảng Nam', 'maianh@example.com', 3),
('Nguyễn Minh Khôi', 'Nam', 'Quảng Ninh', 'minhkhoi@example.com', 2),
('Phạm Thùy Dung', 'Nữ', 'Thái Bình', 'thuydung@example.com', 2),
('Đặng Văn Hùng', 'Nam', 'Bắc Giang', 'vanhung@example.com', 2),
('Nguyễn Quang Huy', 'Nam', 'Hà Nội', 'quanghuy@example.com', 4),
('Vũ Thị Lan', 'Nữ', 'Hà Nam', 'vuthilan@example.com', 4),
('Lê Văn Tuấn', 'Nam', 'Thanh Hóa', 'letuan@example.com', 4),
('Đỗ Thị Hoa', 'Nữ', 'Nam Định', 'dohoa@example.com', 5),
('Nguyễn Thanh Tùng', 'Nam', 'Hà Nội', 'thanhtung@example.com', 5),
('Phạm Văn Nam', 'Nam', 'Nghệ An', 'nampham@example.com', 5),
('Nguyễn Thị Ngọc', 'Nữ', 'Hà Tĩnh', 'ngocnguyen@example.com', 6),
('Lưu Quang Khải', 'Nam', 'Đà Nẵng', 'luukhai@example.com', 6),
('Trần Thị Kim Chi', 'Nữ', 'Huế', 'kimchi@example.com', 6),
('Nguyễn Hữu Phước', 'Nam', 'Cần Thơ', 'huuphuoc@example.com', 7),
('Nguyễn Thanh Hà', 'Nữ', 'Hà Nội', 'thanhha@example.com', 7),
('Phan Văn Hải', 'Nam', 'Quảng Bình', 'vanhai@example.com', 7),
('Vũ Thị Thu', 'Nữ', 'Hà Nam', 'thithu@example.com', 8),
('Nguyễn Văn Tài', 'Nam', 'TP.HCM', 'vantai@example.com', 8),
('Phạm Văn Hòa', 'Nam', 'Long An', 'vanhoa@example.com', 8);
