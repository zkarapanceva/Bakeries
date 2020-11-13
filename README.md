## Проект по предметот Дизајн и архитектура на софтвер 2020/2021
## Bakeries

### Членови на тимот:
- Ана Богоевска      181003
- Матеа Кантурска    181105
- Јана Велјаноска    181108
- Ебру Зеќир         181145
- Зорица Карапанчева 185003

### [Опис на проектот](https://github.com/zkarapanceva/Bakeries/blob/main/1.Opis%20na%20proektot.pdf)

  Во посета на непознати градови најчесто сакаме да го почуствуваме животот на локалните луѓе, да седнеме во некоја од локалните пекари и да вкусиме различни традиционални јадења карактеристични за таа област и притоа да го одбереме совршеното место за доручек, но локациите на пекарите често не се достапни во туристичките летоци и мапи. Од друга страна пак и доколку сме во сопственото место на живеење, во родниот град, не ги познаваме голем дел од пекарите кои ни нудат убав почеток со најважниот оброк од денот. Понекогаш ќе имаме препорака да доручкуваме во новата пекара во градот со превкусни пецива, но не можеме да ја најдеме нејзината локација. 
  
  Нашата идеја за овој проект е да претставиме лесен и едноставен приказ на локациите на пекари во склоп на Р. Северна Македонија. 
  
  Веб апликацијата по своето завршување ќе ги прикажува локациите на регистрираните пекари во системот со можност за филтрирање на податоците според определен град. Апликацијата ќе нуди “Search” поле за пронаоѓање на соодветниот град. 
 
### [Software Requirements Specification](https://github.com/zkarapanceva/Bakeries/blob/main/2.SRS%20na%20proektot.pdf)

1. Апликацијата ќе овозможи користење на опциите без најава со кориснички профил.
2. Апликацијата ќе биде достапна од сите веб-прелистувачи.
3. Апликацијата ќе обезбеди поле за пребарување ,,Search".
4. Апликацијата ќе обезбеди функционалност за контролирање на авторските права во
случај на прекршок од страна на корисниците.
5. Апликацијата ќе овозможи помош при користење на опциите.
6. Апликацијата ќе овозможи список на пекари кои се наоѓаат во внесениот град во
делот ,,Search".
7. Апликацијата ќе овозможи бесплатно користење на нејзините опции.
8. Апликацијата ќе биде во согласност со прописите од областа на безбедност за заштита на
личните податоци на корисниците.
9. Апликацијата ќе биде достапна од повеќе платформи.
10. Апликацијата ќе биде достапна 24 часа на ден и 7 дена во неделата.
11. Апликацијата ќе работи исклучиво со поврзана Интернет врска.
12. Апликацијата ќе овозможи пребарување на пекари по градови во Република Северна
Македонија.
13. Апликацијата ќе прикаже информации за избраната пекара доколку ги има во системот.
14. Апликацијата ќе овозможи опција за автоматско пополнување на полето за пребарување.
15. Апликацијата ќе овозможи ,,help" копче кое ќе им помогне на корисниците да се снајдат
во околината.
16. Апликацијата ќе обезбеди контакт информации од одговорните лица во случај на
дополнителни прашање од страна на корисникот.
17. Апликацијата ќе биде достапна од било кое место кога корисникот е поврзан на Интернет.
18. Апликацијата ќе работи согласно законските регулативи.

### [Креирање на база на податоци и филтрирање](https://github.com/zkarapanceva/Bakeries/blob/main/2.SRS%20na%20proektot.pdf)

1.	echo "create database bakeries;"|mysql -uroot -p
      •	креирање на нова MySQL база на податоци

2.	osmfilter macedonia-latest.osm --keep="shop=bakery" | osmconvert - --all-to-nodes --csv="name addr:city addr:street" --csv-headline --csv-separator="," -o="bakeries.csv"
      •	филтрирање на симнатите податоци од OpenStreetMap со издвојување на пекарите од системот и притоа креирање на csv датотека со информациите за име, адреса-град и адреса-улица на записите за пекарите

3.	echo "SET GLOBAL local_infile=1;USE bakeries ;CREATE TABLE bakeries ( name VARCHAR(255), addr_city VARCHAR(255) NOT NULL, addr_street VARCHAR(255) );"|mysql -uroot -p
      •	креирање на табела со три колони (име, град и улица) која ќе ја пополниме со информациите од csv документот

4.	echo "USE bakeries ;LOAD DATA LOCAL INFILE '/Users/mac/Desktop/proekt/bakeries.csv' INTO TABLE bakeries FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS (name, addr_city, addr_street);" | mysql --local-infile=1 -u root -p
      •	пополнување на базата со информациите од csv документот при што се игнорира првиот ред и се определува знакот за одделување на податоците

5.	echo "USE bakeries; delete from bakeries where addr_city='';"|mysql -uroot -p
      •	со цел добивање на целосно пополнета база со информациите кои ни се потребни, ги одделуваме само оние редови (пекари) за кои имаме достапни информации за нивната локација – град и улица
      
### [Користени податоци]()

https://www.dropbox.com/s/t9x8wrkuy1xapnh/4.%20Podatoci.zip?dl=0

