--CS 328 - Homework 3
-- Jack Daniel Kinne
-- 2.12.17

set serveroutput on

spool 328hw3-out.txt

prompt Jack Daniel Kinne

prompt problem 1

--creates a primary key for the order needed table
create or replace function next_ord_needed_id
return number AS
id_n number:= 1;

BEGIN

	select max(ord_needed_id)
    into id_n
    from order_needed;

    id_n := id_n + 1;
	
	return id_n;

exception

WHEN NO_DATA_FOUND THEN 
    
    return id_n;

END;
/
show errors


--
prompt problem 2
--takes an ISBN, returns bool true if its on order.
create or replace function is_on_order
(isbn_i varchar2) 
return boolean AS

output boolean:= false;
flag char;

BEGIN

	select on_order
	into flag
	from title
	where isbn_i = isbn;


	IF ( flag = 'T' ) THEN
	
	output:= true;

	END IF;

	return output;

exception

WHEN NO_DATA_FOUND THEN 
    
    return output;

END;
/
show errors




/*

--creates a primary key for the order needed table
create or replace function next_order_needed
(statement varchar2, shoutNum integer) as

order_point_n number:= 0;
qty_on_hand_n number;
id_n number:= 1;

BEGIN

	select order_point, qty_on_hand, ord_needed_id
    into order_point_n, qty_on_hand_n, id_n
    from title, order_needed
    where title.isbn = order_needed.isbn;
    and 

	// qty_on_hand < = order_point 
	IF ( 	 <= 0) THEN
		dbms_output.put_line('I cannot show the parameter string ' || shoutNum
			|| ' times.');
	ELSE

		FOR i in 1..shoutNum LOOP
			dbms_output.put_line( UPPER(statement) || '!');
		END LOOP;	

	END IF;

END;
/
show errors
*/







spool off