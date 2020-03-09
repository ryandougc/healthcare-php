/*CREATE DATABASE healthcare_system
USE healthcare_system
hi
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
    ClinicAddress       VarChar(30)     NOT NULL,
    ClinicPhone         VarChar(12)     NOT NULL,
    CONSTRAINT          CLINIC_PK       PRIMARY KEY(ClinicID)
    );

CREATE  TABLE ACCOUNT
    AccountID           VarChar(36)     NOT NULL,
    LoginID             VarChar(36)     NULL,
    AccountPassword     VarChar(255)    NULL,
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
                                ON UPDATE NO ACTION
    );

CREATE  TABLE STAFF (
    StaffID             VarChar(36)     NOT NULL,
    ClinicID            VarChar(36)     NOT NULL,
    CONSTRAINT          STAFF_PK        PRIMARY KEY (StaffID),
    CONSTRAINT          STAFF_CLINIC_FK FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE
    );

CREATE  TABLE PATIENT (
    PatientID           VarChar(36)     NOT NULL,
    PatientEmail        VarChar(36)     NOT NULL,
    PatientPhone        VarChar(15)     NOT NULL,
    PatientAddress      VarChar(36)     NOT NULL,
    EmailNotifications  Boolean         NOT NULL,
    CONSTRAINT          PATIENT_PK      PRIMARY KEY (PatientID)
    );

CREATE  TABLE EXAM_RESULTS (
    PatientID           VarChar(36)     NOT NULL,
    DoctorID            VarChar(36)     NOT NULL,
    ExamDate            TIMESTAMP       NOT NULL,
    ExamSubject         VarChar(100)    NOT NULL,
    ExamResults         VarChar(255)    NOT NULL,
    CONSTRAINT          PAT_DOCTOR_PK   PRIMARY KEY (PatientID, DoctorID)
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
    CONSTRAINT          VIST_PK         PRIMARY KEY (VisitID),
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
