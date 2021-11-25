create table student
(
    id    int auto_increment
        primary key,
    nisn  varchar(10)  not null,
    name  varchar(200) not null,
    email varchar(200) not null,
    date  date         not null,
    major varchar(100) not null,
    constraint nisn
        unique (nisn)
);


