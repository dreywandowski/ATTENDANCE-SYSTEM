/**create a table with primary keys**/

CREATE table branch(
   branch_id SMALLINT  AUTO_INCREMENT,
    name varchar(20),
    address varchar(30),
    city varchar(20),
    state varchar(2),
    zip varchar(12),
    CONSTRAINT id PRIMARY KEY (branch_id)
    )

    /** create table with foreign/index keys**/
    create table employee(
                         emp_id SMALLINT  AUTO_INCREMENT,
                         fname varchar(20),
                         lname varchar(20),
                         start_date date,
                         end_date date,
                         superior_emp_id smallint unsigned,
                         dept_id smallint unsigned,
                         title varchar(20),
                         assigned_branch_id smallint unsigned,
                         CONSTRAINT emp_id PRIMARY KEY (emp_id),
                         CONSTRAINT assigned_branch_id FOREIGN KEY  (assigned_branch_id)
                         REFERENCES branch (branch_id),
                         CONSTRAINT superior_emp_id FOREIGN KEY  (superior_emp_id)
                             REFERENCES ADMINS (emp_id)
)

/** to see the structure of a table**/
desc employee;

/** alter table **/
ALTER TABLE person MODIFY person_id SMALLINT UNSIGNED AUTO_INCREMENT;

/** alter table by adding primary key **/
ALTER TABLE product ADD PRIMARY KEY(product_cd)

/** spicing up select statements **/
select 50 * ID, upper(file) from courses;

==> alias
select 50 * ID, upper(file) as upper_case from courses;

/** creative WHERE clause**/
SELECT  fname, lname, reg_date, role
FROM users
WHERE (title = 'Head Teller' AND start_date > '2006-01-01')
OR (title = 'Teller' AND start_date > '2007-01-01');











