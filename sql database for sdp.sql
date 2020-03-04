CREATE  TABLE CLINIC(
    ClinicID            VarChar(35)     NOT NULL,
    ClinicAddress       VarChar(30)     NOT NULL,
    ClinicPhone         VarChar(12)     NOT NULL,
    CONSTRAINT          CLINIC_PK   PRIMARY KEY(ClinicID)
    );

CREATE  TABLE ACCOUNT
    AccountID           VarChar(25)     NOT NULL IDENTITY (1, 1),
    LoginID             VarChar(35)     NULL,
    AccountPassword     VarChar(25)     NULL,
    FirstName           VarChar(25)     NOT NULL,
    LastName            VarChar(25)     NOT NULL,
    AccountType         VarChar(35)     NOT NULL,
    CONSTRAINT          ACCOUNT_PK      PRIMARY KEY(AccountID)                      
    );

CREATE  TABLE SYSTEM_ADMIN (
    SysAdminID          VarChar(35)     NOT NULL,
    CONSTRAINT          SYSADMIN_PK     PRIMARY KEY (SysAdminID)
        );

CREATE  TABLE DOCTOR (
    DoctorID            VarChar(35)     NOT NULL,
    ClinicID            VarChar(35)     NOT NULL,
    DoctorEmail         VarChar(35)     NOT NULL,
    CONSTRAINT          DOCTOR_PK       PRIMARY KEY (DoctorID),
    CONSTRAINT          DOC_CLINIC_FK   FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE
    );

CREATE  TABLE STAFF (
    StaffID             VarChar(35)     NOT NULL,
    ClinicID            VarChar(35)     NOT NULL,
    CONSTRAINT          STAFF_PK        PRIMARY KEY (StaffID),
    CONSTRAINT          STAFF_CLINIC_FK FOREIGN KEY (ClinicID)
                            REFERENCES CLINIC (ClinicID)
                                ON UPDATE NO ACTION
                                ON DELETE CASCADE
    );

CREATE  TABLE PATIENT (
    PatientID           VarChar(35)     NOT NULL,
    PatientEmail        VarChar(35)     NOT NULL,
    PatientPhone        VarChar(12)     NOT NULL,
    PatientAddress      VarChar(35)     NOT NULL,
    EmailNotifications  Boolean         NOT NULL,
    CONSTRAINT          PATIENT_PK      PRIMARY KEY (PatientID)
    );

CREATE  TABLE EXAM_RESULTS (
    PatientID           VarChar(35)     NOT NULL,
    DoctorID            VarChar(35)     NOT NULL,
    ExamDate            Date            NOT NULL,
    ExamSubject         VarChar(35)     NOT NULL,
    ExamResults         VarChar(35)     NOT NULL,
    CONSTRAINT          PAT_DOCTOR_PK   PRIMARY KEY (PatientID, DoctorID)
    );

CREATE  TABLE VISIT (
    VisitID             VarChar(35)     NOT NULL,
    DoctorID            VarChar(35)     NOT NULL,
    ClinicID            VarChar(35)     NOT NULL,
    PatientID           VarChar(35)     NOT NULL,
    VisitDate           Date            NOT NULL,
    Prescription        VarChar(35)     NOT NULL,
    DoctorNotes         VarChar(35)     NOT NULL,
    SuggestedExam       VarChar(35)     NOT NULL,
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
