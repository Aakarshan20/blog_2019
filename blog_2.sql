create table user(
user_id int unsigned not null auto_increment primary key,
user_name varchar(50) not null default '',
user_pass varchar(255) not null default ''
)engine myisam charset utf8;


insert into user(user_name,user_pass)values('admin', 'eyJpdiI6ImRJU2pcL2E1YWp2YTZ1TURcL1wvZW9aQ1E9PSIsInZhbHVlIjoiTlREbmQyRkYrQ0xHTHArcnRvVmdDQT09IiwibWFjIjoiMjk4YmQ4ZWI4OGIyZDAxNjQ1M2VmYzNkYjJiZDY1ZGMyNmE5YzUwNjA4OGExNjYxMjkzNzI2ZjNlNjE1NDdlZiJ9=');

alter table user modify user_pass varchar(255) not null default ''

insert into blog_user(user_name,user_pass)values('admin', 'eyJpdiI6Im85ZmJKZHNKamZ4TXIza1wvTE5xTzdnPT0iLCJ2YWx1ZSI6InNzUkpVNjBBXC9jTTJOOElpb2pBbU9nPT0iLCJtYWMiOiIxMjA4M2FiMWZkNDZmOTJiYjNkMGM0NWJlOGUzMGMwZDgwN2JlYzcyNjZjMWRhN2YwZTYyY2U3ZjllOTA4OGUzIn0=');


update user set user_pass = 'eyJpdiI6ImRJU2pcL2E1YWp2YTZ1TURcL1wvZW9aQ1E9PSIsInZhbHVlIjoiTlREbmQyRkYrQ0xHTHArcnRvVmdDQT09IiwibWFjIjoiMjk4YmQ4ZWI4OGIyZDAxNjQ1M2VmYzNkYjJiZDY1ZGMyNmE5YzUwNjA4OGExNjYxMjkzNzI2ZjNlNjE1NDdlZiJ9=='
