select course.Course_ID , course.Course_Name, grade.Course_Term ,grade.Course_Year, grade.Section_Number , Grade_Value
from student_student , grade ,course
where course.Course_ID = grade.Course_ID and grade.Stu_ID = 5555555 /*input ID*/  
order by grade.Course_Year , grade.Course_Term