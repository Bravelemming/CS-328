/*=====
  testing script for procedure silly_shout

  by: Sharon Tuttle
  last modified: 2017-01-29
=====*/

prompt
prompt ************************
prompt TESTING silly_shout
prompt ************************
prompt

spool silly_shout_test_out.txt
set serveroutput on

prompt test passes if it shows 3 "shouts" of HOWDY!:
prompt ==========================================================

exec silly_shout('howdy', 3)

prompt
prompt test passes if it shows 5 "shouts" of CS 328 - RAH RAH RAH!!
prompt =============================================================

exec silly_shout('CS 328 - rah rah rah!', 5)

prompt 
prompt test passes if it complains that it cannot "shout" hi 0 times:
prompt ==========================================================

exec silly_shout('hi', 0)

prompt
prompt test passes if it complains that it cannot "shout" moo -1 times:
prompt ==========================================================

exec silly_shout('moo', -1)

spool off

-- end of silly_shout_test.sql
   