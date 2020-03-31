/*CREATE DATABASE healthcare_system;
USE healthcare_system;

#Use this if updating tables
DROP TABLE CLINIC
DROP TABLE ACCOUNT
DROP TABLE PATIENT
DROP TABLE DOCTOR
DROP TABLE SYSTEM_ADMIN
DROP TABLE STAFF
DROP TABLE EXAM_RESULTS
DROP TABLE VISIT */

CREATE  TABLE CLINIC(
    ClinicID            VarChar(36)     NOT NULL,
    ClinicAddress       VarChar(36)     NOT NULL,
    ClinicCity          VarChar(50)     NOT NULL,
    ClinicProvince      VarChar(36)     NOT NULL,
    ClinicPostCode      VarChar(10)     NOT NULL,
    ClinicPhone         VarChar(12)     NOT NULL,
    CONSTRAINT          CLINIC_PK       PRIMARY KEY(ClinicID)
    );

CREATE  TABLE ACCOUNT(
    AccountID           VarChar(36)     NOT NULL,
    LoginID             VarChar(36)     Not NULL,
    AccountPassword     VarChar(255)    NOT NULL,
    FirstName           VarChar(25)     NOT NULL,
    LastName            VarChar(25)     NOT NULL,
    AccountType         VarChar(36)     NOT NULL,
    CONSTRAINT          ACCOUNT_PK      PRIMARY KEY(AccountID)                      
    );

CREATE  TABLE SYSTEM_ADMIN (
    SysAdminID          VarChar(36)     NOT NULL,
    CONSTRAINT          SYSADMIN_PK     PRIMARY KEY (SysAdminID)
        );

CREATE  TABLE DOCTOR (
    DoctorID            VarChar(36)     NOT NULL,
    ClinicID            VarChar(36)     NOT NULL,
    DoctorEmail         VarChar(36)     NOT NULL,
    CONSTRAINT          DOCTOR_PK       PRIMARY KEY (DoctorID),
    CONSTRAINT          DOC_CLINIC_FK   FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE NO ACTION
    );

CREATE  TABLE STAFF (
    StaffID             VarChar(36)     NOT NULL,
    ClinicID            VarChar(36)     NOT NULL,
    CONSTRAINT          STAFF_PK        PRIMARY KEY (StaffID),
    CONSTRAINT          STAFF_CLINIC_FK FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE NO ACTION
    );

CREATE  TABLE PATIENT (
    PatientID           VarChar(36)     NOT NULL,
    PatientEmail        VarChar(36)     NOT NULL,
    PatientPhone        VarChar(15)     NOT NULL,
    PatientAddress      VarChar(36)     NOT NULL,
    PatientCity         VarChar(50)     NOT NULL,
    PatientProvince     VarChar(50)     NOT NULL,
    PatientPostCode     VarChar(10)     NOT NULL,
    EmailNotifications  Boolean         NOT NULL,
    CONSTRAINT          PATIENT_PK      PRIMARY KEY (PatientID)
    );

CREATE  TABLE EXAM (
    ExamID              VarChar(36)     NOT NULL,
    PatientID           VarChar(36)     NOT NULL,
    DoctorID            VarChar(36)     NOT NULL,
    ExamDate            TIMESTAMP       NOT NULL,
    ExamSubject         VarChar(100)    NOT NULL,
    ExamResults         VarChar(255)    NOT NULL,
    CONSTRAINT          EXAM_PK   PRIMARY KEY (ExamID),
    CONSTRAINT          EXAM_PATIENT_FK FOREIGN KEY (PatientID) 
                            REFERENCES PATIENT (PatientID)                                
                            ON UPDATE NO ACTION
                            ON DELETE NO ACTION,
    CONSTRAINT          EXAM_DOCTOR_FK FOREIGN KEY (DoctorID) 
                            REFERENCES DOCTOR (DoctorID)                                
                            ON UPDATE NO ACTION
                            ON DELETE NO ACTION
    );

CREATE  TABLE VISIT (
    VisitID             VarChar(36)     NOT NULL,
    DoctorID            VarChar(36)     NOT NULL,
    ClinicID            VarChar(36)     NOT NULL,
    PatientID           VarChar(36)     NOT NULL,
    VisitDate           TIMESTAMP       NOT NULL,
    Prescription        VarChar(255)    NOT NULL,
    DoctorNotes         VarChar(255)    NOT NULL,
    SuggestedExam       VarChar(100)    NOT NULL,
    CONSTRAINT          VISIT_PK         PRIMARY KEY (VisitID),
    CONSTRAINT          VISIT_CLINIC_FK FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE,
    CONSTRAINT          VISIT_DOC_FK    FOREIGN KEY (DoctorID)
                            REFERENCES DOCTOR (DoctorID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE,
    CONSTRAINT          VISIT_PAT_FK    FOREIGN KEY (PatientID)
                            REFERENCES PATIENT (PatientID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE
    );



-- ALTER TABLES
/*
ALTER TABLE PATIENT
ADD COLUMN  PatientCity         VarChar(50) NOT NULL, 
ADD COLUMN  PatientProvince     VarChar(50) NOT NULL,
ADD COLUMN  PatientPostCode     VarChar(10) NOT NULL;

ALTER TABLE CLINIC
ADD COLUMN ClinicCity           VarChar(50) NOT NULL, 
ADD COLUMN ClinicProvince       VarChar(50) NOT NULL,
ADD COLUMN ClinicPostCode       VarChar(10) NOT NULL;

-- Fake clinic data
INSERT INTO clinic(
    ClinicID,
    ClinicAddress,
    ClinicPhone,
    ClinicCity,
    ClinicProvince,
    ClinicPostCode
) VALUES (
    '0aa2dad2-4dc2-4577-9855-12bf43b340ae',
    '1180 Victoria Park Ave',
    '416-495-4585',
    'Toronto',
    'Ontario',
    'M2J 3T7'
), (
    '908c467d-051a-445c-bb92-f0faaeb2b3b8',
    '3449 Glover Road',
    '604-532-2845',
    'Langley',
    'British Columbia',
    'V3A 1Z3'
);
*/ 

/*-- Dummy prescription data
INSERT INTO visit(
    VisitID,
    DoctorID,
    ClinicID,
    PatientID,
    VisitDate,
    Prescription,
    DoctorNotes,
    SuggestedExam
) VALUES (
    'd185ccbd-2034-42ea-bedc-9fccba4a1c91',
    '4BB9E2BC-4CD9-428D-AA42-C42BDE17F43E',
    '0aa2dad2-4dc2-4577-9855-12bf43b340ae',
    '32504486-0AC8-4431-9792-26463104119D',
    '2020-03-30',
    'test.pdf',
    'Notes',
    'Exam'
);*/