create table annonces
(
  id      int auto_increment
    primary key,
  titre   varchar(255) not null,
  contenu text         not null,
  niveau  int          not null
);

create table user
(
  id             int auto_increment
    primary key,
  username       varchar(20)  not null,
  firstname      varchar(20)  not null,
  name           varchar(20)  not null,
  email          varchar(25)  not null,
  password       char(255)    not null,
  salt           char(50)     not null,
  date_naissance date         not null,
  Avatar         varchar(50)  null,
  img_fond       varchar(50)  null,
  description    text         null,
  facebook       varchar(500) null,
  twitter        varchar(500) null,
  youtube        varchar(500) null,
  constraint user_user_uindex
  unique (username)
);

create table message
(
  id      int auto_increment
    primary key,
  user1   int          not null,
  user2   int          not null,
  message varchar(255) not null,
  constraint sender
  foreign key (user1) references user (id),
  constraint receiver
  foreign key (user2) references user (id)
);

create index receiver
  on message (user2);

create index sender
  on message (user1);


