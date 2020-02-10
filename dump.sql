create database restaurante

create table produto (

    id primary key auto_increment,
    name varchar(200),
    price double(10,2),
    amount int
)