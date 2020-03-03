CREATE  TABLE CLINIC(
	ClinicID    		VarChar(35)		NOT NULL,
	ClinicAddress		VarChar(30)		NOT NULL,
	ClinicPhone 		VarChar(12)		NOT NULL,
	CONSTRAINT 			CLINIC_PK 	PRIMARY KEY(ClinicID)
	);

CREATE  TABLE ACCOUNT
	AccountID   		VarChar(25)		NOT NULL IDENTITY (1, 1),
    LoginID 			VarChar(35)		NULL,
    AccountPassword		VarChar(25)		NULL,
	FirstName			VarChar(25)		NOT NULL,
	LastName			VarChar(25) 	NOT NULL,
	AccountType			VarChar(35)		NOT NULL,
	CONSTRAINT 			ACCOUNT_PK 	    PRIMARY KEY(AccountID)						
	);

CREATE  TABLE SYSTEM_ADMIN (
	SysAdminID			VarChar(35)		NOT NULL,
    CONSTRAINT 			SYSADMIN_PK 		PRIMARY KEY (SysAdminID)
    	);

CREATE  TABLE ASSIGNMENT (
   	ProjectID			Int	 			NOT NULL,
	EmployeeNumber		Int	 			NOT NULL,
    HoursWorked			Numeric(6,2)	NULL,
   	CONSTRAINT 			ASSIGNMENT_PK 	PRIMARY KEY (ProjectID, EmployeeNumber),
   	CONSTRAINT 			ASSIGN_PROJ_FK  FOREIGN KEY (ProjectID)
							REFERENCES PROJECT (ProjectID)
								ON UPDATE NO ACTION
								ON DELETE CASCADE,
    CONSTRAINT 			ASSIGN_EMP_FK   FOREIGN KEY (EmployeeNumber)
							REFERENCES EMPLOYEE (EmployeeNumber)
								ON UPDATE NO ACTION
								ON DELETE NO ACTION
 	);

/********************************************************************************/
Create	Table COMPUTER	(
	SerialNumber		Int				Not Null,
	Make				Char(12)		Not Null,
	Model				Char(24)		Not Null,
	ProcessorType		Char(24)		Null,
	ProcessorSpeed		Numeric(3,2)	Not Null,
	MainMemory			Char(15)		Not Null,
	DiskSize			Char(15)		Not Null,
	Constraint			COMPUTER_PK		Primary Key	(SerialNumber)
	);

Create	Table COMPUTER_ASSIGNMENT (
	SerialNumber		Int				Not Null,
	EmployeeNumber		Int				Not Null,
	DateAssigned		Date			Not Null,
	DateReassigned		Date			Null,
	Constraint 			COMPUTER_ASSIGNMENT_PK 	Primary Key (SerialNumber, EmployeeNumber, DateAssigned),
   	Constraint 			COMP_ASSIGN_SERIALNUM_PK  Foreign Key (SerialNumber)
							References COMPUTER (SerialNumber)
								On Update No Action
								On Delete Cascade,
    Constraint 			COMP_ASSIGN_EMP_FK   Foreign Key (EmployeeNumber)
							References EMPLOYEE (EmployeeNumber)
								On Update No Action
								On Delete No Action
	);