-- Jack Daniel Kinne
-- CS 328

set serveroutput on

spool 328hw2-out.txt

prompt Jack Daniel Kinne

prompt problem 2
--shouts a certain number of times
create or replace procedure silly_shout 
(statement varchar2, shoutNum integer) as

BEGIN
	
	IF (shoutNum <= 0) THEN
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

-- problem 3

prompt problem 3

--gives total cost of all titles
CREATE OR REPLACE FUNCTION title_total_cost
(title_isbn varchar2) return number as
cost number;
quantity number:= 0;
total number;
no number:= -1;

BEGIN

	SELECT qty_on_hand INTO quantity
		FROM title
		WHERE isbn = title_isbn;

	SELECT title_cost INTO cost
		FROM title
		WHERE isbn = title_isbn;

	IF (quantity <= 0) THEN
		RETURN no;
	ELSE
		total:= cost * quantity;
		RETURN total;

	END IF;

END;
/
show errors


--problem 4

prompt problem 4
--returns number of titles
CREATE OR REPLACE FUNCTION num_titles
(p_pub_name varchar2) return number as
quantity number:= 0;


BEGIN

	SELECT count(*) INTO quantity
		FROM publisher, title
		WHERE title.pub_id = publisher.pub_id
		AND pub_name = p_pub_name;


RETURN quantity;

END;
/
show errors

--problem 5
prompt problem 5
--returns title, qauntity, and price of said title.  Mutliple.
CREATE OR REPLACE PROCEDURE which_titles
(qaunt_limit number, price_limit number ) as

BEGIN

		FOR NEXT_tittle IN (

			SELECT title_name, qty_on_hand, title_price 
				FROM title
				WHERE qty_on_hand <= qaunt_limit
				AND title_price <= price_limit)
		
		LOOP
			dbms_output.put_line('N - Q - $P: ' || NEXT_tittle.title_name
			|| ' - ' || NEXT_tittle.qty_on_hand || ' - ' ||  ' $' || 
			NEXT_tittle.title_price || '.');

		END LOOP;	

END;
/
show errors


--problem 6
prompt problem 6
--returns the name of the employee's manager, handled expections.
create or replace function get_manager (p_empl_name varchar2)

return varchar2 AS

out_has_mgr varchar2(100);
out_is_emp varchar2(100);

BEGIN
    
    select empl_last_name
    into out_is_emp 
    from empl
    where empl_last_name = p_empl_name;

    select empl_last_name 
    into out_has_mgr
    from empl
    where empl_num = (select mgr 
    				from empl
    				where empl_last_name = p_empl_name);

return out_has_mgr;

exception
/* if an employee name is not unqiue */

when too_many_rows then

    out_is_emp := 'Name not unqiue.';

    return out_is_emp;
--if no manager found
when NO_DATA_FOUND then 

    if (out_is_emp is null) then
        out_has_mgr := 'Not an employee.';
        return out_has_mgr;
    else 
        out_has_mgr := 'No Manager.';
        return out_has_mgr;

    end if;

end;
/
show errors		

spool off