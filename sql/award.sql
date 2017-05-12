SELECT student_student.Stu_ID,Award_Rank , Award_year , Award_NO
FROM student_student , award ,contest
WHERE contest.Award_ID = award.Award_ID and contest.Stu_ID = 555555 /*input ID*/
order by award.Award_year