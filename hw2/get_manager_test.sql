
/*=====
  testing script for function get_manager

  by: Sharon Tuttle
  last modified: 2017-01-29
=====*/

prompt
prompt *************************************
prompt TESTING get_manager
prompt *************************************
prompt

spool get_manager_test_out.txt
set serveroutput on

-- test set-up: adding some additional employees

commit;

-- this employee also happens to be named Jones - but this
--    Jones does have a different manager than the
--    existing Jones

insert into empl
values
('8001', 'Jones', 'Salesman', '7698', sysdate, 1000, 0, '300');

-- this employee also happens to be named Ward - AND also
--     happens to have the same manager as the other employee
--     named Ward...

insert into empl
values
('8002', 'Ward', 'Salesman', '7698', sysdate, 1000, 0, '300');

prompt this test passes if it shows that Raimi has manager King:
prompt ==========================================================

var desired_manager varchar2(20)
exec :desired_manager := get_manager('Raimi')
print desired_manager

prompt this test passes if it shows that Ford has manager Jones:
prompt ==========================================================

exec :desired_manager := get_manager('Ford')
print desired_manager

prompt
prompt this test passes if it shows that King has manager
prompt result of 'No manager'
prompt =====================================================

exec :desired_manager := get_manager('King')
print desired_manager

prompt
prompt this test passes if it shows that Willbon has manager
prompt result of 'Not an employee'
prompt =====================================================

exec :desired_manager := get_manager('Willbon')
print desired_manager

prompt
prompt this test passes if it shows that Jones has manager
prompt result of 'Name not unique' (because 2 empls named Jones)
prompt =====================================================

exec :desired_manager := get_manager('Jones')
print desired_manager

prompt
prompt this test passes if it shows that Ward has manager
prompt result of 'Name not unique' (because 2 empls named Ward)
prompt =====================================================

exec :desired_manager := get_manager('Ward')
print desired_manager

-- and now remove the 2 employees added for testing purposes

rollback;

spool off

-- end of get_manager_test.sql
   