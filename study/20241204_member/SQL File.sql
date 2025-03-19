show databases;
use employees;
show tables;

select * from  departments;

select count(*) from employees;

select count(*) from salaries;

select 
	count(*) 
from enployees 
where gender = 'F';

select
	*
FROM departments
WHERE dept_name = 'Development';
-- d005
select
	count(*)
FROM dept_emp
WHERE dept_no = 'd005'; -- 85707 건
-- JOIN
SELECT
	concat(e.first_name, ' ',e.last_name) AS '이름'
FROM dept_emp de
LEFT JOIN employees e ON de.emp_no = e.emp_no
LEFT JOIN departments d ON de.dept_no = d.dept_no
WHERE d.dept_name = 'Development';

SELECT
--	count(*) 
		concat(e.first_name, ' ', e.last_name) AS '이름'
FROM dept_emp de
LEFT JOIN employees e ON de.emp_no = e.emp_no
WHERE de.dept_no = (
	SELECT d1.dept_no
    FROM departments d1
    WHERE d1.dept_name = 'Development');
    
    
SELECT DATE_FORMAT('1986-06-26 11:30:15', "%Y-%n-%d");
SELECT
	*
FROM employees
WHERE DATE_FORMAT(hire_date, '%Y') = '1990';


SELECT
	emp_no
    , salary
FROM salaries
WHERE salary >= 70000;


SELECT 
*
FROM titles t
WHERE t.title = 'Senior Engineer';

SELECT
	    t.title
      , e.first_name
      , e.last_name
FROM titles t
LEFT JOIN employees e ON t.emp_no = e.emp_no
WHERE t.title = 'Senior Enginner';
