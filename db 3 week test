INSERT INTO employees
(emp_no, birth_date,first_name, last_name, gender, hire_date)
VALUES
(1,2007, 'jeong', 'baul', 'm', 2025);

-- employees 데이터 삽입


SELECT first_name(와%)=3
FROM employees
OTHER BY first_name; 

SELECT *
FROM employees
WHERE 
first_name LIKE 'A%'
ORDER BY first_name DESC
LIMIT 3;


-- employees first_name 이 ‘와’ 로 시작하는 데이터 3개 내림차순 정렬

DELETE gender='M'
FROM employees;

DELETE FROM employees
WHERE gender='M'

-- employees gender이 ‘M’ 인 것 삭제

UPDATE employees SET
birth_date= NULL
WHERE hire_date = '2024-12-23';


-- employees hire_date가 ‘2024-12-23’ 인 것 birth_date = ‘NULL’ 로 수정

SELECT emp_no= 1
FROM empolyees;

SELECT
title
FROM titles
WHERE emp_no = 10001



-- employees emp_no가 1인 사람의 직책 조회

SELECT emp_no= 1, first_name,last_name
FROM employees;

SELECT
e.emp_no,
t.title
FROM employees e
LEFT JOIN titles t
ON e.emp_no = t.emp_no
WHERE
e.emp_no = 10001

-- Employees emp_no 가 1인 사람의 직책, 이름 조회

SELECT *
FROM employees


SELECT *
FROM titles;



SELECT DATE_FORMAT(NOW(),'%Y-%m-%d'); -- 2024-12-30
-- 9999-01-01
SELECT *
FROM dept_emp
WHERE DATE_FORMAT(NOW(),'%Y-%m-%d') < to_date;
-- 1. 각 부서별 직원 수 (퇴사자 제외)
SELECT DE.dept_no,
count(DE.dept_no) AS '총숫자',
(SELECT D.dept_name FROM departments D WHERE D.dept_no = DE.dept_no) AS '부서'
FROM dept_emp DE
WHERE '9999-01-01' = DE.to_date
GROUP BY DE.dept_no
;
