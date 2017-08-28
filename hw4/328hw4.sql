--CS 328 - homework 4
-- jack daniel kinne

set serveroutput on

spool 328hw4-out.txt



prompt jack daniel kinne
prompt problem 1


--inserts next order needed id value and creates order_needed
create or replace procedure insert_order_needed
(desired_ISBN varchar2, order_quantity_in number) AS
id_n number;

BEGIN
	
	id_n := next_ord_needed_id();

	insert into order_needed
		values(id_n, desired_ISBN, order_quantity_in, sysdate, null);
   

END;
/
show errors


prompt problem 2
-- checks for any pending orders needed based on date
create or replace function pending_order_needed
(desired_ISBN varchar2) return boolean AS

the_date date;
is_date boolean := false;

BEGIN

select date_placed
into the_date
from order_needed 
where desired_ISBN = isbn;
--if a number is returned for date...

if the_date != null then
is_date := true;
end if;
--return true
return is_date;

EXCEPTION

WHEN NO_DATA_FOUND THEN 
--when nothing is found return false    
    return is_date;


END;
/
show errors







--calling a pl stored procedure is as simple as
-- local_variable := procedure_name(parameter);




spool off

