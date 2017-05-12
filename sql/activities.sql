SELECT Act_Name , Act_Duty , Act_year , Act_NO
FROM student_student , activity , `join`
WHERE `join`.Act_ID = activity.Act_ID and `join`.Stu_ID = 555555 /*input ID*/
order by Act_year