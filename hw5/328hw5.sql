--Jack Daniel Kinne
--CS 328 homework 5 problem 2
-- 3.5.17


set serveroutput on

spool 328hw5-out.txt

prompt Jack Daniel Kinne
prompt HW5 Problem 2

-- sales transaction for a book
create or replace function sell_book 
(desired_ISBN varchar2, quantity_sold number) return number AS

	--predefined exceptions
	negative_quantity EXCEPTION;
	exceeds_quantity EXCEPTION;
	--used variables
	the_title varchar2(99);
	the_quantity number;
	the_order_point number;
	the_auto_order number;
	--function returns
	on_order boolean;
	pending_o_n_exists boolean;
	--return
	return_code number;

BEGIN
	COMMIT;
	--store values
	select title_name, qty_on_hand, order_point, auto_order_qty
	into the_title, the_quantity, the_order_point, the_auto_order
	from title 
	where desired_ISBN = isbn;


	--raise exceptions
	IF quantity_sold < 0 THEN
	RAISE negative_quantity;
	END IF;

	IF quantity_sold > the_quantity THEN
	RAISE exceeds_quantity;
	END IF;
	--update quantity on hand
	update title
	set qty_on_hand = qty_on_hand - quantity_sold
	where desired_ISBN = isbn;

	--store value of is_on_order and pending_order_needed
	on_order:= is_on_order(desired_ISBN);
	pending_o_n_exists:= pending_order_needed (desired_ISBN);

	--do we need to add a row to order_needed?
	--check: order point, is_on_order, pending order_needed
	IF the_quantity <= the_order_point 
	AND on_order = false 
	AND pending_o_n_exists = false THEN

		insert_order_needed(desired_ISBN, the_auto_order);

	END IF;

COMMIT; -- testing purposes, remove for final.
return_code:= 0;
return return_code;

EXCEPTION

WHEN NO_DATA_FOUND THEN 
--nothing is found 
	return_code:= -1;
	ROLLBACK;
    return return_code;

WHEN negative_quantity THEN
--quantity is below 0
	return_code:= -2;
	ROLLBACK;
	return return_code;

WHEN exceeds_quantity THEN
--requested order is greater than stock
	return_code:= -3;
	ROLLBACK;
	return return_code;

END;
/
show errors

spool off