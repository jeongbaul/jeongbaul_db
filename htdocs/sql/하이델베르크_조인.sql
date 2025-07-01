SELECT
	 A.week
    ,A.title
    ,B.question
    ,B.Answer
FROM `pray` A
JOIN prayer B ON A.week = B.week
WHERE A.week= WEEK(SYSDATE()) -- '1'
ORDER BY B.no ASC

