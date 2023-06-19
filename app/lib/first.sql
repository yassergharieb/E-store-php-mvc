create database storedb;
use storedb; 
create  table users (
id int unsigned primary key auto_increment not null, 
username varchar(20) unique not null, 
Email varchar(40) unique  not null, 
Password char(60) not null, 
lastLogin datetime not null, 
subscrbtiondate date not null, 
privlige tinyint(1) not null, 
Phonenumber char(15) 
);

use storedb;



create table user_profile (
    profile_id int unsigned primary key auto_increment not null, 
    firstname varchar(10) not null, 
    lastname  varchar(10) not null, 
    address varchar(50), 
    image varchar(50), 
    DOB date ,
    userId int unsigned not null,
    foreign key (userId) references users (id)

 
);

use storedb;
create table  users_groups (
    groupId tinyint (1)  unsigned primary key not null auto_increment, 
    groupName varchar (20) not null
);

use storedb;
alter table users change privlige  groupId tinyint(1) not null;



alter  table users add foreign key (groupId) references users_groups (groupId);
use storedb;
  alter  table user_profile   FOREIGN KEY (userId)
    REFERENCES  users (id);
use storedb;
describe  user_profile;
alter table user_profile drop profile_id;







use storedb;
create  table users_groups_privlige (
    privlige_id  tinyint (3) unsigned primary key not null  auto_increment,
    groupId tinyint(1) unsigned not null , 

    privlige  varchar(20) not null, 
      foreign key  (groupId) references users_groups (groupId)

);

use storedb;
alter table  user_profile drop userId;

use storedb;
alter table user_profile add foreign  key (userId) references users (userId);
alter table user_profile add column userId int unsigned  primary key not null
 auto_increment; 
describe  user_profile;
show tables;



alter table users_groups  




use storedb;
alter table users_privliges add column privlige_title varchar(60) not null;