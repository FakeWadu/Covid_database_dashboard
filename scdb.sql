create database scdb;
use scdb;

create table `admin`(
id int auto_increment primary key,
name varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null
);


INSERT INTO admin(name, email, password) values('admin', 'admin@gmail.com', 'admin123');
select * from `admin`;
create table `staff`(
id int auto_increment primary key,
name varchar(255) not null,
email varchar(255) not null,
phoneNumber bigint(255) not null,
address TEXT NOT NULL,
addharNo bigint(255) not null,
createdAt DATETIME default current_timestamp,
password varchar(255) not null

);

select * from staff;

create table student_details(

usn varchar(40) not null primary key ,
name varchar(100) not null,
email varchar(100) not null,
sem int(20) not null,
branch varchar(20) not null,
createdAt DATETIME default current_timestamp

);



select * from student_details;

create table student_contact(
usn varchar(40) not null,
addharNo bigint(255) not null,
phoneNumber bigint(255) not null,
address TEXT NOT NULL,
foreign key(usn) references student_details(usn)  on delete cascade on update cascade

);
select * from student_contact;

create table student_covid_info(
usn varchar(40) not null,
tempr int(11) not null,
symptoms text not null,
covidPass int(5) not null,
foreign key(usn) references student_details(usn)  on delete cascade on update cascade
);

select * from student_covid_info;

SELECT * FROM `staff` WHERE email = 'pavankumarv@gmail.com';





