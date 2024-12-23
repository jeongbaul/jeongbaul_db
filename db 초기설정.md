1. mysql employee database

2. mysql Site -> 3번 Installation(설치)
   https://dev.mysql.com/doc/employee/en/employees-installation.html
   Git 들어가서 test_db10.7
   test_db107.tar.gz
   다운받고
   압축풀고
   C:\Users\Metanet\Documents\test_db-1.0.7\test_db

3. xampp 구동
4. mysql workbench 연결
	employees.sql 파일넣기
5. 데이터베이스 생성
   DROP DATABASE IF EXISTS employees; 컨트롤 엔터
   CREATE DATABASE IF NOT EXISTS employees;
   USE employees;
   알아서 하시고

6. 테이블 데이터 삽입하기
   employee ,departments 먼저 삽입하기
7. 나머지 삽입하기
8.phpmyadmin사이트에서 가져오기- 파일-employee 삽입하기(load_employees.dump)

9.검증.
--한개씩
SELECT COUNT(*) FROM departments WHERE 1;
SELECT COUNT(*) FROM dept_emp WHERE 1;
SELECT COUNT(*) FROM dept_manager WHERE 1;
SELECT COUNT(*) FROM employees WHERE 1;
SELECT COUNT(*) FROM salaries WHERE 1;
SELECT COUNT(*) FROM titles WHERE 1;

--한번에
SELECT 
  (SELECT COUNT(*) FROM salaries ) AS '급여'
, (SELECT COUNT(*) FROM titles ) AS '직책'
, (SELECT COUNT(*) FROM departments ) AS '부서'
, (SELECT COUNT(*) FROM dept_manager ) AS '부서 관리자'
, (SELECT COUNT(*) FROM employees ) AS '직원'
, (SELECT COUNT(*) FROM dept_emp ) AS '부서_임원'
FROM DUAL;

USE employees; 



테이블 구조
https://dev.mysql.com/doc/employee/en/sakila-structure.html
