--
-- Table structure for table `student`
--

CREATE TABLE student
(
    rollno int PRIMARY KEY,
    name varchar(100),
    phno int,
    pass varchar(100),
    path varchar(100),
    marks decimal(5,3),
    usn int ,
    FOREIGN KEY (usn) REFERENCES teacher(usn)
);

--
-- Table structure for table `teacher`
--

CREATE TABLE teacher
(
    usn int PRIMARY KEY,
    tname varchar(100),
    tphno int,
    tpass varchar(100),
    tpath varchar(100)
);

--
-- INSERT Statement for table `student`
--

INSERT INTO `student`(`rollno`, `name`, `phno`, `pass`, `path`, `marks`, `usn`) VALUES (123,"VISHWA",7986456377,"qweAS12","image/avatar.jpg",8.68,1);

--
-- INSERT Statement for table `teacher`
--

INSERT INTO `teacher`(`usn`, `tname`, `tphno`, `tpass`, `tpath`) VALUES (1,"Arun",9078642865,"ERswe13","image/avatar.jpg");

--
-- UPDATE Statement for table `student`
--

UPDATE `student` SET marks= 8.9, usn=1 WHERE rollno=123 ;

--
-- UPDATE Statement for table `teacher`
--

UPDATE `teacher` SET tpass= "RThgd34" WHERE usn=1 ;

--
-- DELETE Statement for table `student`
--

DELETE FROM `student` WHERE rollno =123 ;

--
-- DELETE Statement for table `teacher`
--

DELETE FROM `teacher` WHERE usn=1 ;


	
--
--  https://vishwanathhonawad.github.io/CGPAallocation/
--

