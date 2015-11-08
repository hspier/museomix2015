use mnbaq;
SELECT PF.PRF_FEEDBACK_ID, E.EMO_ID FROM MNBAQ_PROFILE_FEEDBACK PF, MNBAQ_EMOTION E WHERE PF.PRF_ID = 20 AND E.EMO_ID = 2;



select * from mnbaq_profile p where 'hugo72' = concat_ws(lower(p.prf_firstname), p.PRF_ID);

select * from mnbaq_profile where lower(prf_auth_id) = 'Hugo72';