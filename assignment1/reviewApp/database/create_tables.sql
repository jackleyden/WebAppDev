drop table if exists item;
drop table if exists comment;
drop table if exists manufacturer;
drop table if exists user;

create table item (    
    id integer not null primary key autoincrement,    
    summary varchar(80) not null,    
    details text default '',
    image text default '/',
    manufacturer integer not null,
    foreign key(manufacturer) REFERENCES manufacturer(id)
); 

insert into item values (null, "Saxon Dual Axis Motor Drive for EQ5 Mount",  "Compatible with Saxon 2001 EQ Newtonian Reflector Telescope Dual Axis Motor Drive Hand controller clutches Cables Battery Case more at: https://www.ozscopes.com.au/saxon-dual-axis-motor-drive-for-eq5-mount.html", 'https://www.ozscopes.com.au/media/catalog/product/cache/4/image/650x/040ec09b1e35df139433887a97daa66f/s/a/saxon-dual-axis-motor-drive-for-eq5.jpg', 1);
insert into item values (null, "SkyWatcher AZ3 Mount & Tripod",  "Durable metal construction Precise controls for your scope Perfect companion for large scopes All axis controls Ideal for beginners and novices 5 Years Skywatcher Limited Warranty https://www.ozscopes.com.au/skywatcher-az3-mount.html", 'https://www.ozscopes.com.au/media/catalog/product/cache/4/image/650x/040ec09b1e35df139433887a97daa66f/s/k/skywatcher-az3-mount.jpg', 2);
insert into item values (null, "Celestron Vibration Suppression Pads",  "Come with 3 pcs Pads Stabilize your telescope or Spotting Scope Work on any surface more at: https://www.ozscopes.com.au/celestron-vibration-suppression-pads.html", 'https://www.ozscopes.com.au/media/catalog/product/cache/4/image/650x/040ec09b1e35df139433887a97daa66f/c/e/celestron-93503-vsp_vibration_suppression_pads.jpeg', 3);
insert into item values (null, "Saxon Plossl Telescope Eyepieces",  "High Quality Optics Long Eye Relief Plössl design provides larger field of view for bigger view of the night sky Great for deep sky and planetary viewing Fully Coated optics for great colour contrast more at: https://www.ozscopes.com.au/saxon-plossl-telescope-eyepieces.html", 'https://www.ozscopes.com.au/media/catalog/product/cache/4/image/650x/040ec09b1e35df139433887a97daa66f/s/a/saxon-plossl-telescope-eyepiece.jpg', 1);
insert into item values (null, "Celestron stuff",  "Come with 3 pcs Pads Stabilize your telescope. more at: https://www.ozscopes.com.au/celestron-vibration-suppression-pads.html", 'https://www.ozscopes.com.au/media/catalog/product/cache/4/image/650x/040ec09b1e35df139433887a97daa66f/c/e/celestron-93503-vsp_vibration_suppression_pads.jpeg', 3);

create table comment (    
    id integer not null primary key autoincrement,    
    name integer not null,    
    comment text default '',
    rate integer not null,
    itemid integer not null,
    foreign key(itemid) REFERENCES item(id),
    foreign key(name) REFERENCES user(id)
); 

insert into comment values (null, 1,  "Saxon Dual", 5, 1);
insert into comment values (null, 2,  "Saxon Dual2", 2, 1);
insert into comment values (null, 3,  "Saxon Dual3", 5, 1);
insert into comment values (null, 1,  "SkyWatcher AZ3", 0, 2);
insert into comment values (null, 2,  "SkyWatcher AZ3 2", 3, 2);
insert into comment values (null, 1,  "Saxon Plossl 1 ", 1, 4);
insert into comment values (null, 2,  "Saxon Plossl 2", 4, 4);
insert into comment values (null, 2,  "Saxon Plossl 2", 4, 5);


create table manufacturer (    
    id integer not null primary key autoincrement,    
    name varchar(80) not null
);
insert into manufacturer values (null, "Saxon");
insert into manufacturer values (null, "Skywatcher");
insert into manufacturer values (null, "Celestron");

create table user (    
    id integer not null primary key autoincrement,    
    name varchar(80) not null
);
insert into user values (null, "Jack");
insert into user values (null, "Peter");
insert into user values (null, "Scott");