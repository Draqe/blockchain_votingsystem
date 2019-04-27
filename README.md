# blockchain_votingsystem
# CS89 Final Project
Submitted by Jay-Arr Catibayan Buhain and Don Richson Que

## Description

### This project is made in requirement to CS189 (Introduction to Business Computing)

### BLOCKCHAIN-BASED VOTING SYSTEM FOR CAVITE STATE UNIVERSITY FACULTY ASSOCIATIONS
The CVSU FACULTY ASSOCIATIONS, a legitimate public sector labor organization with DOLE-CSC Registration Certificate No. 1779 dated 06 September 2010 with the office address at Cavite State University, Indang, Cavite, represented by its President, JOCELYN L. REYES, hereinafter reffered to as the ASSOCIATION.
One of the key roles that holds democracy together and allow it to function are elections. Election plays an important role in a democratic society especially here in the Philippines in particular with student organizations in a Universities that is why enhancement of the existing voting systems efficiency with blockchain’s availability, immutability, security, transparency and elimination of intermediaries’ properties are needed in order to remove issues to trust and privacy.

### Features & Functions of the System. 
•	Verifiability – the system will ensure that all votes are counted correctly.
•	Accuracy-votes must be accurate where votes will be counted and can’t be removed, altered or duplicated.
•	Authentication-only people who are registered can cast a vote during the election 
•	Anonymity-voters will remain anonymous during and after the election with no link or connection to their ballots and other voter’s information.

## Minimum required machine specifications 

1. Minimum 350MB Hard Disk space for installation
2. 4GB HD space required for a typical live system with 1000-2000 events
3. Recommended minimum CPU - Pentium 4, 3.2GHz
4. Recommended 1GB RAM for a Central Server with 3 Nodes
5. Network card

## Installation and Running
1. Install XAMPP 3.2.1 (required)
Link: https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/1.8.2/?fbclid=IwAR3-8KkQeBVBqjHKqwNE1Q1Ok02q0OY3IlsxPmZ9kBlgh5v3g-NKZidTFzo
2. Run XAMPP Control Panel and start Apache and MySQL
3. Copy the “blockchain_votingsystem” folder to this path “C:\xampp\htdocs”
4. Import the “database.sql” provided inside the folder “blockchain_votingsystem”. Open your browser and go to this link “http://localhost/phpmyadmin”. Click Import to import the database.sql.
5. Start running the system in your browser using this link “http://localhost/blockchain_votingsystem/”

Note: If system does not work, try downgrading xampp to xampp-win32-1.8.2-6-VC9

## System Flow
1.	The voter or employee will create their account using the system.
  a.	Blockchain – will be provided an account (private key, public key, wallet address)
2.	The administrator will validate the account.
  a.	Blockchain – will transfer 150 XEMs to account being validated.
3.	The administrator will be able to update, delete, deactivate, activate an account.
4.	The administrator will add candidates before activating the election.
5.	After adding candidates, the election can now start by activating the election.
  a.	Blockchain – will rent a root namespace randomly generated ex: fa1234name, defined mosaic – randomly generated ex: fa2345vote and mosaic supply is based on the total count of voters in the system, mosaic transfer – each voter will be given 1 mosaic for voting.
6.	Voter will now be able to cast their vote for once only.
  a.	Blockchain – mosaic transfer – voter will send back the single mosaic to the administrator upon voting. 
7.	After the voting, the administrator can now deactivate the election and check for the results (auto-generated into graph (who voted and did not vote)) and printable report (summary of the total vote: who vote and who did note vote in general and total votes per position and candidate).
8.	The administrator will also be the one to appoint the winners using the system to be posted in the officer list.
