--Jack Daniel Kinne
-- 2.3.17

/* how_many : selects count of title rows */
CREATE OR REPLACE FUNCTION how_many
(p_title varchar2) return integer as
num_title_rows integer;
num_on_hand integer;

BEGIN

	SELECT count(*) INTO num_title_rows
		FROM title
		WHERE title_name = p_title;

	IF (num_title_rows = 0) THEN
		num_on_hand:= 0;
	ELSE 

		SELECT qty_on_hand INTO num_on_hand
			FROM title 
			WHERE title_name = p_title;

	END IF;

RETURN num_on_hand;

EXCEPTION

WHEN too_many_rows THEN
	
	SELECT sum(qty_on_hand) INTO num_on_hand
		FROM title
		WHERE title_name = p_title;

RETURN num_on_hand;

END;
/
show errors


spool prob1-out.txt

commit;

insert into title
values
('0070790529', 234, 'SPSS', 'Palin', 
	123.95, 22.95, 5, 70, 10, 'F');

set serveroutput on

--variable to store returns
var return_many number
var return_many2 number
var return_many3 number


exec :return_many := how_many('The C Programming Language')
print return_many

exec :return_many2 := how_many('SPSS')
print return_many2

exec :return_many3 := how_many('moo')
print return_many3


/* PL SQL of calling the function how_many 
DECLARE
a integer;
b integer;
c integer;
BEGIN 
	a := how_many('The C Programming Language');
	dbms_output.put_line('How_many of C Programming Language:' || a);

	b := how_many('SPSS');
	dbms_output.put_line('How_many of SPSs:' || b);

	c := how_many('moo');
	dbms_output.put_line('How_many of moo:' || c);	

END;
/
*/



rollback;

spool off

--end problem 1 part b
