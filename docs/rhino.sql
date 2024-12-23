create schema rhino collate utf8mb4_0900_ai_ci;

create table business
(
  ID int unsigned auto_increment
    primary key,
  Name varchar(45) not null,
  Address varchar(45) not null,
  Latitude varchar(45) not null,
  Longitude varchar(45) not null
);

create table business_category
(
  ID int unsigned auto_increment,
  Name varchar(45) not null,
  Description varchar(45) null,
  constraint ID_UNIQUE
    unique (ID)
);

alter table business_category
  add primary key (ID);

create table business_tag
(
  ID int unsigned auto_increment,
  BusinessID int unsigned not null,
  BusinessCategoryID int unsigned not null,
  constraint ID_UNIQUE
    unique (ID),
  constraint tag_business_category_fk
    foreign key (BusinessCategoryID) references business_category (id),
  constraint tag_business_fk
    foreign key (BusinessID) references business (id)
);

create index business_category_fk_idx
  on business_tag (BusinessCategoryID);

create index business_fk_idx
  on business_tag (BusinessID);

alter table business_tag
  add primary key (ID);

create table discount_type
(
  ID int unsigned auto_increment,
  Name varchar(45) not null,
  Description varchar(200) null,
  constraint ID_UNIQUE
    unique (ID),
  constraint Name_UNIQUE
    unique (Name)
);

alter table discount_type
  add primary key (ID);

create table product
(
  ID int unsigned auto_increment,
  Name varchar(45) null,
  constraint ID_UNIQUE
    unique (ID)
);

create table business_product
(
  ID int unsigned auto_increment,
  BusinessID int unsigned not null,
  ProductID int unsigned not null,
  Price double unsigned not null,
  constraint ID_UNIQUE
    unique (ID),
  constraint business_fk
    foreign key (BusinessID) references business (id),
  constraint product_fk
    foreign key (ProductID) references product (id)
);

create index business_fk_idx
  on business_product (BusinessID);

create index product_fk_idx
  on business_product (ProductID);

alter table business_product
  add primary key (ID);

create table discount
(
  ID int unsigned auto_increment,
  Name varchar(45) not null,
  DiscountTypeID int unsigned not null,
  BusinessProductID int unsigned not null,
  Value double unsigned not null,
  Description varchar(200) null,
  StartTime datetime null,
  EndTime datetime null,
  constraint ID_UNIQUE
    unique (ID),
  constraint businessproduct_fk
    foreign key (BusinessProductID) references business_product (id),
  constraint discount_type_fk
    foreign key (DiscountTypeID) references discount_type (id)
);

create index businessproduct_fk_idx
  on discount (BusinessProductID);

create index discount_type_fk_idx
  on discount (DiscountTypeID);

alter table discount
  add primary key (ID);

alter table product
  add primary key (ID);

create table user_type
(
  ID int unsigned auto_increment,
  Name varchar(45) not null,
  Description varchar(200) null,
  constraint ID_UNIQUE
    unique (ID),
  constraint Name_UNIQUE
    unique (Name)
);

create table user
(
  ID int unsigned auto_increment,
  Username varchar(45) not null,
  Password varchar(45) not null,
  Name varchar(45) not null,
  Surname varchar(45) not null,
  Phone varchar(45) null,
  Email varchar(45) null,
  UserTypeID int unsigned null,
  isActive tinyint(1) default 1 not null,
  constraint ID_UNIQUE
    unique (ID),
  constraint user_Username_uindex
    unique (Username),
  constraint user_type_fk
    foreign key (UserTypeID) references user_type (id)
);

create index user_type_fk_idx
  on user (UserTypeID);

alter table user
  add primary key (ID);

create table reservation
(
  ID int unsigned auto_increment,
  UserID int unsigned not null,
  DiscountID int unsigned not null,
  DateTime datetime not null,
  Code int null,
  constraint ID_UNIQUE
    unique (ID),
  constraint res_discount_fk
    foreign key (DiscountID) references discount (id),
  constraint res_user_fk
    foreign key (UserID) references user (id)
);

create index res_discount_fk_idx
  on reservation (DiscountID);

create index res_user_fk_idx
  on reservation (UserID);

alter table reservation
  add primary key (ID);


create table user_subscription
(
  ID int unsigned auto_increment,
  UserID int unsigned not null,
  BusinessCategoryID int unsigned not null,
  constraint ID_UNIQUE
    unique (ID),
  constraint business_category_fk
    foreign key (BusinessCategoryID) references business_category (id),
  constraint user_fk
    foreign key (UserID) references user (id)
);

create index business_category_fk_idx
  on user_subscription (BusinessCategoryID);

create index user_fk_idx
  on user_subscription (UserID);

alter table user_subscription
  add primary key (ID);

alter table user_type
  add primary key (ID);

