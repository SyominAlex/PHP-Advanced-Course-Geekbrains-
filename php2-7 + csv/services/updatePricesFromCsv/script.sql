create table if not exists products
(
    id          int auto_increment
        constraint `PRIMARY`
        primary key,
    name        varchar(50)  not null,
    description varchar(255) null,
    price       float        not null,
    category_id int          not null
);


