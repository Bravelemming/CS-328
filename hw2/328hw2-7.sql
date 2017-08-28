-- Jack Daniel Kinne
-- CS 328 - homework 2 - problem 7
--2.5.17

spool 328hw2-7-out.txt

prompt Jack Daniel Kinne
prompt Problem 7

SET serveroutput ON

--function to choose the deathstars next target(s), based on affiliation.
CREATE OR REPLACE FUNCTION target_list (wanted_aff varchar2)

return varchar2 AS
BEGIN

        FOR NEXT_planet IN (

            SELECT PLANET_NAME, affiliation 
                FROM planet
                WHERE destroyed = 'n'
                and affiliation = wanted_aff)
        
        LOOP
            dbms_output.put_line('Planet - affiliation: ' 
                || NEXT_planet.PLANET_NAME || ' - ' 
                || NEXT_planet.affiliation || '.');

        END LOOP;   

exception

WHEN NO_DATA_FOUND THEN 
    
    dbms_output.put_line('All non-empire targets elminated.');
    RETURN 'end';

WHEN OTHERS THEN
    RETURN 'end';

END;
/
show errors		


var planetary_target varchar2(20)

prompt this test passes if it shows 3 results:
prompt ==========================================================

exec :planetary_target := target_list('rebel')
print planetary_target

prompt this test passes if it shows 3 results:
prompt ==========================================================

exec :planetary_target := target_list('independent')
print planetary_target





spool off