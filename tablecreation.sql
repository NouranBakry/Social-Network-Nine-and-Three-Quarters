DROP database labfinal;
create database labfinal;
use labfinal;
create table users(
 user_id int AUTO_INCREMENT unique,
  f_name varchar(30) not null,
  l_name varchar(30) not null,
  n_name varchar(30),
  password varchar(500) not null,
  email varchar(30) unique not null,
  gender varchar(30) not null,
  birth_date varchar(50) not null,
  marital_status varchar(50) not null,
  home_town varchar(50) not null,
  About_me text ,
  profile_pic longblob not null,
  PRIMARY KEY(user_id)
);
 create table phones(
phone_numbers varchar(20),
u_id int,
FOREIGN KEY (u_id)REFERENCES users(user_id)
);
create table friends(
friend_id int,
u_id int,
FOREIGN KEY (u_id)REFERENCES users(user_id)
);
create table posts(
post_id int AUTO_INCREMENT,
state int,
caption text not null,
image varbinary(256),
post_date timestamp,
u_id int,
FOREIGN KEY (u_id)REFERENCES users(user_id),
PRIMARY KEY(post_id)
);
create table likes (
like_id int AUTO_INCREMENT unique,
p_id int,
u_id int,
date timestamp,
seen int,
FOREIGN KEY (p_id)REFERENCES posts(post_id),
FOREIGN KEY (u_id)REFERENCES users(user_id),
PRIMARY KEY(like_id)
);
create table friend_request(
notify_id int AUTO_INCREMENT unique,
recieve_id int,
send_id int,
accept int,
FOREIGN KEY (recieve_id)REFERENCES users(user_id),
FOREIGN KEY (send_id)REFERENCES users(user_id),
PRIMARY KEY(notify_id)
);