:sparkles: Kelompok Ambisius :sparkles:

Anggota Kelompok Ambisius:
1. Alan Pratama Rusfi
2. Arva Revanza
3. Muhammad Arif Ibrahim
4. Muhammad Zufar

program yang dibutuhkan:
* [xampp / mysql](https://www.apachefriends.org/download.html)
* [program ticket kelompok ambisius](https://www.mediafire.com/file/rbnnmdmhm71dbvm/event-hololive.exe/file)

Setup Program:


1. membuat database 'hololive' dengan mysql :
```sql
CREATE DATABASE hololive;
```
 

2. membuat tabel 'user' di database 'hololive' yang baru dibuat tadi :
 ```sql
 CREATE TABLE `hololive`.`user` 
 ( `id` INT(50) NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(255) NOT NULL ,
 `password` VARCHAR(255) NOT NULL ,
 `silver_card` INT(10) NOT NULL ,
 `golden_card` INT(10) NOT NULL ,
 PRIMARY KEY (`id`)) ENGINE = InnoDB;
 ```
 
 3. Jalankan [program ticket kelompok ambisius](https://www.mediafire.com/file/rbnnmdmhm71dbvm/event-hololive.exe/file)
 
 4. Buka [localhost:3030](http://localhost:3030/)

Note: [Program](https://www.mediafire.com/file/rbnnmdmhm71dbvm/event-hololive.exe/file) , [folder source](./source) dan [folder css](./css) harus ada di folder yg sama
