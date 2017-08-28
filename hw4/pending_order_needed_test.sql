/*=====
  testing script for function pending_order_needed

  by: Sharon Tuttle
  last modified: 2017-02-11
=====*/

spool pending_order_needed_test_out.txt
set serveroutput on

prompt
prompt **********************
prompt TESTING pending_order_needed
prompt **********************
prompt

commit;

update title
set qty_on_hand = qty_on_hand - 5
where isbn = '0805322272';

exec insert_order_needed('0805322272', 50)

prompt =============================================================
prompt test passes if returns true (IS a pending order_needed for
prompt     0805322272)
prompt =============================================================
prompt
var status_str varchar2(5);
exec :status_str := bool_to_string(pending_order_needed('0805322272'))
print status_str

prompt
prompt =============================================================
prompt test passes if returns false (order_needed row for
prompt     025602796X is NOT pending)
prompt =============================================================
prompt
exec :status_str := bool_to_string(pending_order_needed('025602796X'))
print status_str

prompt
prompt =============================================================
prompt test passes if returns false (0131103628 is a title,
prompt     but is not in order_needed table at all, so cannot
prompt     be pending)
prompt =============================================================
prompt
exec :status_str := bool_to_string(pending_order_needed('0131103628'))
print status_str

prompt
prompt =============================================================
prompt test passes if returns false (1111111111 is NOT a title,
prompt     so cannot be pending)
prompt =============================================================
prompt
exec :status_str := bool_to_string(pending_order_needed('1111111111'))
print status_str

prompt undoing temporary testing changes

rollback;

spool off
 
-- end of pending_order_needed_test.sql