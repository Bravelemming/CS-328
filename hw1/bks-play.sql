--CS 328 - problem 3
-- Jack Daniel Kinne
-- 1.29.17

spool bks-play-out.txt

prompt Jack daniel Kinne
prompt HW1

prompt problem 3 part a

select pub_name, pub_city
from publisher
order by pub_name;  

prompt problem 3 part b 

select title_name, qty_on_hand
from title 
where pub_id = 111
order by qty_on_hand desc;

prompt problem 3 part c 

select distinct pub_name, qty_on_hand as "NUM TITLES"
from title, publisher
where title.pub_id = publisher.pub_id
order by qty_on_hand desc;

prompt problem 3 part d 

select title_name, order_qty
from order_line_item, title
where title.isbn = order_line_item.isbn
and order_num = 11010;

prompt problem 3 part e

select pub_name
from order_summary, publisher
where order_summary.pub_id = publisher.pub_id
and order_summary.date_placed = (select max(order_summary.date_placed)
					from publisher,order_summary
					where order_summary.pub_id = publisher.pub_id)
and ROWNUM <=1;


spool off