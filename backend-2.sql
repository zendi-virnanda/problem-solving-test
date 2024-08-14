-- 1. Tampilkan seluruh data dari tabel "employees" (5 Points)
SELECT * FROM `employees`;

-- 2. Berapa banyak karyawan yang memiliki posisi pekerjaan (job title) "Manager"? (5 Points)
SELECT count(employee_id) as employee_totals
from employees
where job_title LIKE "Manager";

--3. Tampilkan daftar nama dan gaji (salary) dari karyawan yang bekerja di departemen "Sales" atau  "Marketing" (10 Points)
SELECT name, salary
FROM `employees`
WHERE department LIKE "Sales"
OR department LIKE "Marketing";

-- 4. Hitung rata-rata gaji (salary) dari karyawan yang bergabung (joined) dalam 5 tahun terakhir (berdasarkan  kolom "joined_date")
select AVG(salary) as "rata_rata"
FROM employees
WHERE joined_date >= DATE_SUB(CURDATE(), INTERVAL 5 YEAR);

-- 5. Tampilkan 5 karyawan dengan total penjualan (sales) tertinggi dari tabel "employees" dan "sales_data"
SELECT e.name, e.job_title, e.salary, e.department, e.joined_date, SUM(sd.sales) as sales_total
FROM employees e
JOIN sales_data sd ON e.employee_id=sd.employee_id
GROUP BY e.employee_id
ORDER BY sales_total DESC
LIMIT 5;

--6. Tampilkan nama, gaji (salary), dan rata-rata gaji (salary) dari semua karyawan yang bekerja di departemen yang memiliki rata-rata gaji lebih tinggi dari gaji rata-rata di semua departemen
WITH department_avg_salary AS (
    SELECT department, AVG(salary) AS avg_salary
    FROM employees
    GROUP BY department
),
overall_avg_salary AS (
    SELECT AVG(salary) AS avg_salary
    FROM employees
)
SELECT e.name, e.salary, d.avg_salary
FROM employees e
JOIN department_avg_salary d ON e.department = d.department
JOIN overall_avg_salary o ON d.avg_salary > o.avg_salary;

-- 7. Tampilkan nama dan total penjualan (sales) dari setiap karyawan, bersama dengan peringkat (ranking)  masing-masing karyawan berdasarkan total penjualan. Peringkat 1 adalah karyawan dengan total  penjualan tertinggi (25 Points)
SELECT
	e.name,
    SUM(sd.sales) as sales_total,
    RANK()OVER (ORDER BY SUM(sd.sales) DESC) AS peringkat
FROM `employees` e
JOIN sales_data sd ON e.employee_id=sd.employee_id
GROUP BY e.employee_id

-- 8. Buat sebuah stored procedure yang menerima nama departemen sebagai input, dan mengembalikan  daftar karyawan dalam departemen tersebut bersama dengan total gaji (salary) yang mereka terima
DELIMITER $$
CREATE PROCEDURE GetEmployeesByDepartment(
    IN employee_department VARCHAR(255)
)
BEGIN
	SELECT e.name, e.salary
    FROM employees e
    WHERE e.department LIKE employee_department;
END$$

DELIMITER ;
CALL GetEmployeesByDepartment("Sales")
