CREATE DATABASE `pruebadata`;
USE pruebadata;
create table mh_tbl_user(
	password varchar(50),
	correo varchar(100)
)

select*from mh_tbl_user
insert into mh_tbl_user(password, correo) values ('passworduser','correouser@gmail.com')